<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\KullaniciBilgileri;
use App\Siparisler;
use App\SabitSayfalar;
use App\SiparisDetaylari;
use Mail;
use Redirect;
use Session;
use xcrud;

include('xcrud/xcrud/xcrud.php'); //public klasöründe

class ETicaretController extends Controller
{
    public function sepeteEkle(Request $request){

        $sepeteEklenenUrun = $request->only('urun_id');

        Session::push('sepet', $sepeteEklenenUrun);

        return sizeof(Session::get('sepet'));
    }

    public function sepet(){

        $data = Session::get('sepet');
        //dd($data);
        $tumurunler = SabitSayfalar::where('kategori_id','=','3')->whereNotNull('ust_sayfa')
                                                                 ->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')->get();
        $total = 0;
        if(isset($data))
        {
            # SEPETTEKI AYNI URUNLERİN ADETLERİNİ BELİRLEYELİM #
            foreach ($data as $key=>$gezdir) {
                $sayac = 0;

                foreach ($data as $kontrol) {
                    if($gezdir['urun_id'] == $kontrol['urun_id']){
                        $sayac++;
                    }        
                }

                $data[$key]['adet'] = $sayac;
            }

            $data = array_unique($data, SORT_REGULAR); # aynı olanları sil
            
            $urunler = array(); $indis = 0;

            foreach ($data as $sepet) { // dd($sepet['urun_id']);
                foreach ($tumurunler as $urun) {
        
                    if ((string)$sepet['urun_id']==(string)$urun->urun_id) { # urun_ozellikleri tablosuna göre çekiyor bilgileri. çünkü mevz-u bahis, tablo birleştirme. karşılığı olanı alıyor.

                        $brand = array();

                        $brand['urun_id'] = $urun->urun_id;
                        $brand['urun_adi'] = $urun->sayfa_adi;
                        $brand['adet'] = $sepet['adet'];
                    

                        if ($urun->indirimli_fiyat) {
                            $brand['birim_fiyat'] = $urun->indirimli_fiyat;
                            $brand['toplam_fiyat'] = $urun->indirimli_fiyat * $brand['adet'];
                        }else{
                            $brand['birim_fiyat'] = $urun->fiyat;
                            $brand['toplam_fiyat'] = $urun->fiyat * $brand['adet'];
                        }

                        $total += $brand['toplam_fiyat'];
                        $urunler[$indis++] = $brand;
                    }
                }
            }

            $data = $urunler;
            Session::set('sepet_odeme', $data);
            //dd($data);
        }

        return view('eticaret.sepet')->with('carts',$data)
                                            ->with('total',$total);
    }



    public function _urunSepetGuncelle(Request $request) # id bazlı. düzgün çalışmıyor. her bir item güncellemesinde tüm ITEM'ları tekrardan diziye ekliyor.
    {

        $updateArray = array();

        if($request->ajax()) {

            ##sadece mevcut idler alınıp tekrar sessiona ekleniyor. aynı olanlar adet olarak kayıt altına alınıyor zaten.
          $ids = Input::get('idArray');

          $guncelAdet = array();

          foreach ($ids as $value) {

              $guncelAdet['urun_id'] = $value; // sepet fonksiyonunu her üründen kaç tane olduğunu sayabilmesi için, sepete ekleme sırasında hangi formatta diziye kayıt yapılıyorsa,
              Session::push('sepet',$guncelAdet); // burada da aynı şekilde olmalı. 
          }

        }else{

            dd(Session::get('sepet'));
        }
        
    }



    public function urunSepetGuncelle(Request $request)
    {

        $updateArray = array();
        $sepetSESSIONicinURUNidBilgisiEKLE = array();

        if($request->ajax()) {

          //$data = Input::all();
          $adett = Input::get('adetArray');
          $idd = Input::get('idArray');
          //$fiyatt = preg_replace('/[^0-9]/','',Input::get('fiyatArray'));
          $fiyatt = Input::get('fiyatArray');


          for ($i=0; $i<sizeof($idd); $i++) {

              $guncelle = array();
              $guncelle['adet'] = $adett[$i];
              $guncelle['urun_id'] = $idd[$i];
              $guncelle['toplam_fiyat'] = $adett[$i] * $fiyatt[$i];
              
              $updateArray[$i] = $guncelle;
          }

          foreach ($updateArray as $guncelveri) {
              foreach (Session::get('sepet_odeme') as $key => $sepet) {
                  if (($sepet['urun_id']) == $guncelveri['urun_id']) {
                     
                    $al =  Session::get('sepet_odeme');
                    $al[$key]['adet'] = $guncelveri['adet'];
                    $al[$key]['toplam_fiyat'] = $guncelveri['toplam_fiyat'];                    

                     Session::set('sepet_odeme',$al);
                  }
              }
          }


            ################ İlk SESSION olan SESSION SEPET işlemleri ################
             $ilksession = Session::get('sepet');
             $sepetSESSIONicinURUNidBilgisiEKLE = array();

             foreach ($ilksession as $key => $value) {
                unset($ilksession[$key]); //Hepsini Sil.
             }
             
             Session::set('sepet', $ilksession);

             $ikincisession = Session::get('sepet_odeme');
             foreach ($ikincisession as $deger) {
                 
                 for ($i=0; $i<$deger['adet']; $i++) {

                    $sepetSESSIONicinURUNidBilgisiEKLE['urun_id'] = $deger['urun_id']; # Session::push('sepet') hepsi aynı formatta olsun.
                    Session::push('sepet',$sepetSESSIONicinURUNidBilgisiEKLE);
                 }
             }
            ################################################################################

             print_r(sizeof(Session::get('sepet'))); # Ajax kodu success olunca data kısmına bu bilgi atanıyor.

        }else{

            return redirect()->back();
            dd(Session::get('sepet'));
            $dizi =  Session::get('sepet_odeme');
            foreach ($dizi as $key => $value) {

                dd($dizi[$key]['adet']);
            }
        }
        
    }



    public function urunSepetSil($sil=null)
    {
        $data = Session::get('sepet');

        foreach ($data as $key => $value) {
            if($sil == $value['urun_id']){
                unset($data[$key]);
            }
        }
        
        Session::set('sepet', $data);

        if(count(Session::get('sepet')) == 0)
        {
            Session::forget('sepet');
        }

        return redirect()->action('ETicaretController@sepet');
    }


    public function satinAl(){
      
      if(Session::has('giris_kullanici')){

        foreach (Session::get('giris_kullanici') as $key => $value) {
          $dizi['id'] = $value->id;
          $dizi['mail_adresi'] = $value->mail_adresi;
          $dizi['ad_soyad'] = $value->ad_soyad;
          $dizi['cep_telefonu'] = $value->cep_telefonu;
        }

        return view('eticaret.teslimat_bilgileri')->with('dizi', $dizi);

      }else{

        return view('eticaret.teslimat_bilgileri');
      }

    }

    
    public function odemeEkrani(){
      
    }

    
    public function satinAlmayiTamamla(Request $request){

      $userdata = Session::get('giris_kullanici');
      $postEdilenBilgiler = $request->only('ad_soyad',
                                      'mail_adresi',
                                      'tckimlik',
                                      'ulke',
                                      'sehir',
                                      'adres',
                                      'cep_telefonu',
                                      'odeme_turu',
                                      'toplam_odenen'
                                  );
								  
								  
      if ($userdata && isset($userdata) && $userdata != null) { // Login ise...

        $siparisKodu = $this->satinAlmaFonksiyonu($userdata, $postEdilenBilgiler);
		
		Session::set('orderCode',$siparisKodu);
		Session::set('mailadress',"");
		

        return view('eticaret.paytr_odeme')->with('orderCode',$siparisKodu)
                                           ->with('kisibilgileri',$postEdilenBilgiler);

      }else{ // Eğer login değilse...


        #1 : Mail adresi kontrolü yapılacak. Kullanıcı daha önceden sisteme üye ise, üye girişi yapması istenecek.
        $varmi = KullaniciBilgileri::where('mail_adresi','=', $postEdilenBilgiler["mail_adresi"])->count();

       if($varmi == '1')
       {
           return redirect('giris-yap')->with('bilgi_eposta_kayitli','Devam Etmek İçin Lütfen Giriş Yapınız')
                                       ->with('bilgi_eposta',$postEdilenBilgiler["mail_adresi"]);
       }

       #2 : Kullanıcının belirttiği mail adresi sisteme kayıtlı değil ise, otomatik üye yapılacak. Şifresi, belirttiği mail adresine mail atılacak.
       else{

          // Üyelik şifresini belirle.
          $postEdilenBilgiler['sifre'] = rand(100000,999999);
		  
		  ############################################################
		  ##########   ÜYE DEĞİLSE ÜYELİK VE SİSTEME GİRİŞ  ##########
		  ############################################################
		  $yeniUye = new KullaniciBilgileri();
		  $yeniUye->fill($postEdilenBilgiler);
		  $yeniUye->save();

		  // Giriş Yaptır.
		  $data = KullaniciBilgileri::where('mail_adresi','=', $postEdilenBilgiler["mail_adresi"])->where('uyelik_durumu','1')->get();
		  Session::set('giris_kullanici', $data);
		  $userdata = Session::get('giris_kullanici');

          $siparisKodu = $this->satinAlmaFonksiyonu($userdata, $postEdilenBilgiler);

          $mail_adresi =  $postEdilenBilgiler['mail_adresi'];
          $ad_soyad =  $postEdilenBilgiler['ad_soyad'];
          $sifre =  $postEdilenBilgiler['sifre'];
          $konu =  "Hatay Çarşım Sipariş Bilgilendirme";
		  /*
          Mail::send([], [], function($message) use ($mail_adresi, $konu, $ad_soyad, $sifre)
          {
             $message->from('maviforex@gmail.com', 'HATAYCARSIM.COM');
             $message->to($mail_adresi,$ad_soyad)->subject($konu)->setBody("
              Merhaba ". $ad_soyad.",
              Siparişinizi takip etmek için gerekli olan sisteme giriş bilgileriniz aşağıdaki gibidir.
              Mail Adresiniz: ". $mail_adresi ." Şifreniz : ". $sifre ."
              Sisteme giriş yaptıktan sonra, 'Siparişlerim' sayfasından tüm siparişinizi takip edebilirsiniz. ");
          });
		  */
		  Session::set('orderCode',$siparisKodu);
		  Session::set('mailadress',$mail_adresi);
		  
          return view('eticaret.paytr_odeme')->with('orderCode',$siparisKodu)
                                             ->with('kisibilgileri',$postEdilenBilgiler);

        }
		
      }
    }


    public function satinAlmaFonksiyonu($userdata, $postEdilenBilgiler){

          ############################################################
          ##########  SİPARİŞ KODU ÜRETEN ORTAK FONKSİYON   ##########
          ############################################################
          $sepet = Session::get('sepet_odeme');  $toplam = "";
          foreach ($sepet as $deger) {
            
            $toplam += $deger['toplam_fiyat'];
          }

          $postEdilenBilgiler['toplam_odenen'] = "$toplam";

		  $postEdilenBilgiler['kullanici_id'] = "";
          foreach ($userdata as $user) {
              $postEdilenBilgiler['kullanici_id'] = $user->id;
          }
			
		  $siparisKodu = "ADRSCNTR" . $postEdilenBilgiler['kullanici_id'] . rand(1000,9999);
		  $postEdilenBilgiler['siparis_kodu'] = $siparisKodu;
		  Session::set('siparis_detaylari',$postEdilenBilgiler);
		  
		  //dd(Session::get('siparis_detaylari'));
		  
          return $siparisKodu;
    }
	
	public function siparisBasarili(){
		
		############################################################
		########## SİPARİŞ DETAYLARI TABLOSU DOLDURULUYOR ##########
		############################################################
		
		$getSiparisDetay = Session::get('siparis_detaylari');
		$getSepetIcerigi = Session::get('sepet_odeme');
		
		if(isset($getSiparisDetay) && isset($getSepetIcerigi)){
			$siparisDetay = new SiparisDetaylari();
			$siparisDetay->fill($getSiparisDetay);
			$siparisDetay->save();
			
			$siparis_detay_id = $siparisDetay->id;
			
			foreach($getSepetIcerigi as $key=>$sepet){
				$getSepetIcerigi[$key]['siparis_detay_id'] = $siparis_detay_id;
			}
			
			Siparisler::insert($getSepetIcerigi);
			
			Session::forget('siparis_detaylari');
		}
		
		return view('eticaret.siparis_basarili');
	}


	## Kullanıcı Panelinde Yapılan Siparişleri Görüntüler
    public function siparisler(){

      $userdata = Session::get('giris_kullanici');

      if ($userdata) {
      
        foreach ($userdata as $kullanici) {
         
            $xcrud = Xcrud::get_instance();
            $xcrud->table('siparis_detaylari');
            $xcrud->table_name('Siparişlerim');
            $xcrud->where('kullanici_id =', $kullanici->id);
            $xcrud->order_by('id ', 'DESC');

            $xcrud->label(array(
                'created_at' => 'Sipariş Tarihi',
                'sifre'=>'Şifre',
                'toplam_odenen'=>'Ödenen Tutar',
                'ad_soyad' => 'Ad Soyad'
            ));
			
            $xcrud->columns('ad_soyad, toplam_odenen, created_at, siparis_kodu, siparis_durumu');
            $xcrud->change_type('tckimlik,kullanici_id,odeme_turu,updated_at','hidden');
			
			/* Eski Sipariş Kodu
            $xcrud->subselect('Sipariş Kodu','{id}*472');
            $xcrud->change_type('Sipariş Kodu','price','3', array('prefix'=>'ADRSCNTR','separator'=>'', 'decimals'=>'0')); */
			
            $xcrud->unset_add();
            $xcrud->unset_pagination();
            $xcrud->unset_remove();
            $xcrud->unset_edit();
            $xcrud->unset_search();
			
            $xcrud->default_tab('Sipariş Detayları');
            $siparisler = $xcrud->nested_table('Siparişler','id','siparisler','siparis_detay_id');
            $siparisler->columns('urun_adi, adet, birim_fiyat');
            $siparisler->unset_view();
            $siparisler->unset_search();
			
			
            return view('eticaret.siparisler')->with('xcrud',$xcrud);
        }

      }else{

          return redirect()->action('KullaniciController@loginSayfasi');
      }
    }

    public function puanlar(){

        if (Session::get('giris_kullanici')){
			
			$user = Session::get('giris_kullanici');
			$userid = $user[0]['id'];
			
			$satinAlma = SiparisDetaylari::where('kullanici_id','=',$userid)->get();
			
			$toplam = 0;
			foreach($satinAlma as $bilgi){
				
				$toplam = $toplam + $bilgi->toplam_odenen;
			}
			
			$puan = floor($toplam / 50);
			
			
          return view('eticaret.puanlar')->with('puan',$puan);
        }else{
          return redirect()->action('KullaniciController@loginSayfasi');
      }
		
    }
}