<?php

    function nice_input($value, $field, $primary_key, $list, $xcrud)
    {
       return '<div class="input-group">
                <span style="background-color:#e5e5e5;" class="input-group-addon" id="basic-addon3">http://www.siteadi.com.tr/</span>
                <input type="text" class="form-control" name="'.$xcrud->fieldname_encode($field).'" value="'.$value.'" id="basic-url" aria-describedby="basic-addon3">
                </div>';   
    }

    function getUrunIDvSeflink($postdata,$primary_key, $xcrud)
    {	
        $string = $postdata->get('sayfa_adi'); // tablodan 'sayfa_adi' bilgisini al
        $kategori_id = $postdata->get('ust_sayfa');
        
        $db = Xcrud_db::get_instance(); /* @var $db Xcrud_db */
        $db->query("SELECT sayfa_linki FROM sabit_sayfalar WHERE id=".$kategori_id."");
        $veriler = $db->result(); 
		
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        $string = $veriler[0]['sayfa_linki'].'/'.$string.'-LRVL'.$primary_key;
        //$postdata->set('sayfa_linki', $string); //baslik bilgisini dönüstürdükten sonra 'sayfa_linki' sütununa ekle
		
        $db = Xcrud_db::get_instance(); /* @var $db Xcrud_db */
        $db->query("UPDATE sabit_sayfalar SET sayfa_linki='".$string."' WHERE id=".$primary_key."");
		
		## Özellikler tablosu
		$urun_adi = $postdata->get('sayfa_adi');
        $db = Xcrud_db::get_instance(); /* @var $db Xcrud_db */
        $db->query("INSERT INTO urun_ozellikleri(urun_id, urun_adi, fiyat, aktiflik) VALUES('$primary_key','$urun_adi','-',1)");
		
		echo "$string";
    }
	
	
    function ALTurunlerSeflinkEkleTR($postdata,$primary_key, $xcrud)
    {
        $string = $postdata->get('sayfa_adi'); // tablodan 'sayfa_adi' bilgisini al
        $kategori_id = $postdata->get('ust_sayfa');
        
        $db = Xcrud_db::get_instance(); /* @var $db Xcrud_db */
        $db->query("SELECT sayfa_linki FROM sabit_sayfalar WHERE id=".$kategori_id."");
        $veriler = $db->result(); 

        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        $string = $veriler[0]['sayfa_linki'].'/'.$string.'-LRVL'.$primary_key;
        $postdata->set('sayfa_linki', $string); //baslik bilgisini dönüstürdükten sonra 'sayfa_linki' sütununa ekle
    }	
	
    function changeBrandName($postdata,$primary_key)
    {
        $urun_adi = $postdata->get('sayfa_adi');

        $db = Xcrud_db::get_instance(); /* @var $db Xcrud_db */
        
        $db->query("UPDATE urun_ozellikleri SET `urun_adi`='$urun_adi' WHERE `urun_id`=$primary_key");
    }
	
	function kayit_donusu(){

		echo "<script> alert('Üyelik kaydınız başarıyla gerçekleşti. Üye giriş sayfasına yönlendiriliyorsunuz...'); 
		window.location.href = 'giris-yap';
		</script>";
	}
	
	function mail_adres_kontrolu($postdata){
		
		$mailadress = $postdata->get('mail_adresi');
		
		$db = Xcrud_db::get_instance(); /* @var $db Xcrud_db */
        $db->query("SELECT mail_adresi FROM kullanici_bilgileri WHERE `mail_adresi`='$mailadress'");
		$veri = $db->result();
		
		if($veri){
			echo "<script> alert('Bu mail adresi ile daha önceden üye olunmuş. Bu sizseniz, lütfen giriş yapınız. Üye giriş sayfasına yönlendiriliyorsunuz...'); 
			window.location.href = 'giris-yap';
			</script>";
			
			return null;
		}
	}
	
	
    function ikSeflinkEkleTR($postdata,$xcrud)
    {
        $string = $postdata->get('sayfa_adi'); // tablodan 'sayfa_adi' bilgisini al
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        $string = 'insan-kaynaklari/'.$string;
        $postdata->set('sayfa_linki', $string); //baslik bilgisini dönüstürdükten sonra 'sayfa_linki' sütununa ekle
    }


    function sabitSayfaSeflinkEkleTR($postdata,$xcrud)
    {
        $string = $postdata->get('sayfa_adi'); // tablodan 'sayfa_adi' bilgisini al
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        $postdata->set('sayfa_linki', $string); //baslik bilgisini dönüstürdükten sonra 'sayfa_linki' sütununa ekle
    }

	
    function kategoriSeflinkEkleTR($postdata,$xcrud)
    {
        $string = $postdata->get('kategori'); // tablodan 'sayfa_adi' bilgisini al
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        $postdata->set('link', $string); //baslik bilgisini dönüstürdükten sonra 'sayfa_linki' sütununa ekle
    }


     function galeriSeflinkEkleTR($postdata,$xcrud)
    {
        $string = $postdata->get('sayfa_adi'); // tablodan 'sayfa_adi' bilgisini al
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        $string = 'galeri/'.$string;
        $postdata->set('sayfa_linki', $string); //baslik bilgisini dönüstürdükten sonra 'sayfa_linki' sütununa ekle
    }      

    function hizmetlerSeflinkEkleTR($postdata,$xcrud)
    {
        $string = $postdata->get('sayfa_adi'); // tablodan 'sayfa_adi' bilgisini al
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        $string = 'hizmetlerimiz/'.$string;
        $postdata->set('sayfa_linki', $string); //baslik bilgisini dönüstürdükten sonra 'sayfa_linki' sütununa ekle
    }    


    function urunlerSeflinkEkleTR($postdata,$xcrud)
    {
        $string = $postdata->get('sayfa_adi'); // tablodan 'sayfa_adi' bilgisini al
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        $string = 'urunlerimiz/'.$string;
        $postdata->set('sayfa_linki', $string); //baslik bilgisini dönüstürdükten sonra 'sayfa_linki' sütununa ekle
    }

    function blogSeflinkEkle($postdata,$xcrud)
    {
        $string = $postdata->get('baslik_tr'); // tablodan 'sayfa_adi' bilgisini al
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
		$string = date('Y/m').'/'.$string;
        $postdata->set('sayfa_linki', $string); //baslik bilgisini dönüstürdükten sonra 'sayfa_linki' sütununa ekle
    }
	
	function blogSeflinkEkleKategori($postdata,$xcrud)
    {
        $string = $postdata->get('kategori'); // tablodan 'kategori' bilgisini al
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
		$string = date('Y/m').'/'.$string;
        $postdata->set('link', $string); //baslik bilgisini dönüstürdükten sonra 'link' sütununa ekle
    }

    function blogSeflinkGuncelle($postdata,$xcrud)
    {
        $string = $postdata->get('baslik'); // tablodan baslik bilgisini al
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
		$string = date('Y/m').'/'.$string;
        $postdata->set('sayfa_linki', $string); //baslik bilgisini dönüstürdükten sonra link sütununa ekle
    }

	
	function guncelleme_donusu_sms()
    {
    	echo "<script> 
    		 alert('Göndermek istediğiniz toplu mail iletisinin içeriği başarılı bir şekilde güncellendi.');
    		</script>";
    }
	
	function guncelleme_donusu()
    {
    	echo "<script> 
    		 alert('Verileriniz başarılı bir şekilde güncellendi.');
    		</script>";
    }

    function iletisimformukayit()
    {
        echo "<script> 
             alert('Mesajınız başarıyla gönderildi.');
            </script>";
    }