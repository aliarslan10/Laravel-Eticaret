<?php

	if($_POST){
		
		mysql_connect('localhost', 'root', '123456++') or die("Bağlantı Kurulamadı");
		mysql_select_db('laravel_eticaret') or die('Veritabanı Bulunamadı');
		
		## 2. ADIM için örnek kodlar ##

		## ÖNEMLİ UYARILAR ##
		## 1) Bu sayfaya oturum (SESSION) ile veri taşıyamazsınız. Çünkü bu sayfa müşterilerin yönlendirildiği bir sayfa değildir.
		## 2) Entegrasyonun 1. ADIM'ında gönderdiğniz merchant_oid değeri bu sayfaya POST ile gelir. Bu değeri kullanarak
		## veri tabanınızdan ilgili siparişi tespit edip onaylamalı veya iptal etmelisiniz.
		## 3) Aynı sipariş için birden fazla bildirim ulaşabilir (Ağ bağlantı sorunları vb. nedeniyle). Bu nedenle öncelikle
		## siparişin durumunu veri tabanınızdan kontrol edin, eğer onaylandıysa tekrar işlem yapmayın. Örneği aşağıda bulunmaktadır.

		$post = $_POST;
		
		####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
		#
		## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
		$merchant_key 	= 'XRcje1WJuoSY2qmK';
		$merchant_salt	= 'rHSawGwS9JkQAp99';
		###########################################################################

		####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
		#
		## POST değerleri ile hash oluştur.
		$hash = base64_encode(hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true));
		#
		## Oluşturulan hash'i, paytr'dan gelen post içindeki hash ile karşılaştır (isteğin paytr'dan geldiğine ve değişmediğine emin olmak için)
		## Bu işlemi yapmazsanız maddi zarara uğramanız olasıdır.
		if( $hash != $post['hash'] ){
			die('PAYTR notification failed: bad hash');
		}
		###########################################################################
		
		## BURADA YAPILMASI GEREKENLER
		## 1) Siparişin durumunu $post['merchant_oid'] değerini kullanarak veri tabanınızdan sorgulayın.
		## 2) Eğer sipariş zaten daha önceden onaylandıysa veya iptal edildiyse  echo "OK"; exit; yaparak sonlandırın.
		
		$orderCode = $post['merchant_oid'];
		$sql = mysql_query("SELECT siparis_durumu FROM siparis_detaylari WHERE `siparis_kodu`='$orderCode'");
		
		while($durum = mysql_fetch_array($sql)){
			if($durum['siparis_durumu'] == "Onaylandi" || $durum['siparis_durumu'] == "Iptal Edildi"){
					echo "OK";
					exit;
			}else if($durum['siparis_durumu'] == "Iptal Edildi"){
				echo "Sipariş, yönetim panelinden iptal edildi.";
			}else{
				echo "Yönetici panelinden onay bekliyor.";
			}
		}


		/* Sipariş durum sorgulama örnek
		   $durum = SQL
		   if($durum == "onay" || $durum == "iptal"){
				echo "OK";
				exit;
			}
		 */
		
		if( $post['status'] == 'success' ) { ## Ödeme Onaylandı
			
			## BURADA YAPILMASI GEREKENLER
			## 1) Siparişi onaylayın.
			## 2) Eğer müşterinize mesaj / SMS / e-posta gibi bilgilendirme yapacaksanız bu aşamada yapmalısınız.
			## 3) 1. ADIM'da gönderilen payment_amount sipariş tutarı taksitli alışveriş yapılması durumunda
			## değişebilir. Güncel tutarı $post['total_amount'] değerinden alarak muhasebe işlemlerinizde kullanabilirsiniz.
			

		} else { ## Ödemeye Onay Verilmedi

			## BURADA YAPILMASI GEREKENLER
			## 1) Siparişi iptal edin.
			## 2) Eğer ödemenin onaylanmama sebebini kayıt edecekseniz aşağıdaki değerleri kullanabilirsiniz.
			## $post['failed_reason_code'] - başarısız hata kodu
			## $post['failed_reason_msg'] - başarısız hata mesajı
			
			$hata = post['failed_reason_code'] . " / " . $post['failed_reason_msg'];
			
			$sql = "INSERT INTO basarisiz_odeme_log (siparis_kodu, basarisiz_odeme_log) VALUES ($post[merchant_oid],$hata)";
			if(mysqli_query($sql)){
				echo "Ödeme hatası veritabanına kaydedildi. Ödeme hatası : " . $hata;
			}else{
				echo "Veritabanı kaydı başarısız. Ödeme hatası : ". $hata;
			}
		}
		
		## Bildirimin alındığını PayTR sistemine bildir.
	}else{}
?>