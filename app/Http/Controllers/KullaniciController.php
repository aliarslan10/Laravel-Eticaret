<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\KullaniciBilgileri;
use App\ChatKullaniciBilgileri;
use App\FaturaBilgileri;
use App\OdemeBilgileri;
use App\Siparisler;
use App\SabitSayfalar;
use Redirect;
use Session;
use Xcrud;
use Xcrud_config;
use Mail;

include('xcrud/xcrud/xcrud.php');

class KullaniciController extends Controller
{
    public function kayitSayfasi()
    {
        $adSoyad = ""; //mail adresi yanlış girildiğinde kayitOl fonksiyonu aracılığıyla ad soyad bilgisi tutacak.
        $bilgi = null;


        $menu = SabitSayfalar::where('durum','=','1')->whereNull('ust_sayfa')->where('kategori_id','=','3')->get();

        return view('kullanici.kayit_arayuz')->with('adsoyad', $adSoyad)
                                             ->with('ssayfa_menu', $menu)
                                             ->with('bilgi', $bilgi);
    }

    
    public function xcrudKayitSayfasi()
    {
        $adSoyad = ""; //mail adresi yanlış girildiğinde kayitOl fonksiyonu aracılığıyla ad soyad bilgisi tutacak.
        $bilgi = null;

        $menu = SabitSayfalar::where('durum','=','1')->whereNull('ust_sayfa')->where('kategori_id','=','3')->get();

        Xcrud_config::$language='tr_formgenerator';
        $xcrud = Xcrud::get_instance();
        $xcrud->table('kullanici_bilgileri');

        $xcrud->label(array(
            'mail_adresi' => 'Mail Adresi',
            'sifre'=>'Şifre',
            'ad_soyad' => 'Ad Soyad'
        ));

        $xcrud->table_name('Üye Ol');

        $xcrud->change_type('id,uyelik_durumu,created_at,updated_at','hide');
		
		
		$xcrud->pass_default('created_at', date('Y-m-d'));
		$xcrud->pass_var('created_at', date('Y-m-d'));

        $xcrud->validation_required('mail_adresi, sifre, ad_soyad');
        $xcrud->validation_pattern('mail_adresi','email');
        $xcrud->change_type('sifre', 'password');
        
        $xcrud->hide_button('save_return');
        $xcrud->hide_button('return');
        $xcrud->hide_button('save_edit');
		
        $uyekontrol = $xcrud->before_insert('mail_adres_kontrolu');
		
		if($uyekontrol == null){
			
		}else{
			$xcrud->after_insert('kayit_donusu');
		}

        return view('kullanici.kayit_arayuz')->with('adsoyad', $adSoyad)
                                             ->with('ssayfa_menu', $menu)
                                            // ->with('xcrud', $xcrud) mail kontrolü yapılamadığından, İPTAL.
                                             ->with('bilgi', $bilgi);      
       
    }

    public function kayitOl(Request $req)
    {       
		$adSoyad = ""; //mail adresi yanlış girildiğinde kayitOl fonksiyonu aracılığıyla ad soyad bilgisi tutacak.
        $bilgi = null;
		
        if(!Session::has('giris_kullanici'))
        {
            $menu = SabitSayfalar::where('durum','=','1')->whereNull('ust_sayfa')->where('kategori_id','=','3')->get();
            $dataKullanici = $req->only('mail_adresi','sifre','cinsiyet','ad_soyad', 'cep_telefonu');
            
            $varmi = KullaniciBilgileri::where('mail_adresi','=', $dataKullanici["mail_adresi"])->count();
			
           if($varmi == '0')
           {
               // $salt='a60ps2eg5q9hmq80';
               // $dataKullanici['sifre']=md5(md5($dataKullanici['sifre']).$salt);
			   
                $kullanici = new KullaniciBilgileri();
                $kullanici->fill($dataKullanici);
                $kullanici->save();

                $id_bilgisi = KullaniciBilgileri::all()->last()->id;

                /*
                $salt='a60ps2eg5q9hmq80';
                $upass=md5(md5($dataKullanici['sifre']).$salt);

                # ad soyadı boşluğa göre explode et, sadece adı al, alt tire mail adresi yaz.
                $ad = explode(" ", $dataKullanici['ad_soyad']);
                $sayi = rand(10,99999);

                $chatData['usr_name'] = $ad['0'].$sayi;
                $chatData['usr_pass'] = $upass;
                $chatData['usr_mail'] = $dataKullanici['mail_adresi'];
                $chatData['usr_join_date'] = date("Y.m.d");
                $chatData['usr_status'] = 0;
                $chatData['kullanici_id'] = $id_bilgisi;

                $chat = new ChatKullaniciBilgileri();
                $chat->fill($chatData);
                $chat->save(); */

                 //  'INSERT INTO blab8_users VALUES(null'.$dataKullanici['mail_adresi'].','.$upass.','.$dataKullanici['mail_adresi'].','..',0)';
				 
				echo "<script> alert('Üyelik kaydınız başarıyla gerçekleşti. Üye giriş sayfasına yönlendiriliyorsunuz...'); 
				window.location.href = 'giris-yap';
				</script>";

				return view('kullanici.kayit_arayuz')->with('adsoyad', $adSoyad)
													 ->with('ssayfa_menu',$menu)
													 ->with('bilgi', $bilgi);    
           }

           else{
             return view('kullanici.kayit_arayuz')->with('bilgi','Bu mail adresi ile daha önceden üye olunmuş.')
                                                            ->with('adsoyad', $dataKullanici['ad_soyad'])
                                                            ->with('ssayfa_menu', $menu)
                                                            ->with('bilgi', 'Bu mail adresi ile daha önceden üye olunmuş.');
           }
        }
        
        else
        {
            return view('kullanici.kullanici_paneli');
        }
       
    }


    public function kayitBasarili(Request $req)
    {
        $dataKullanici = $req->only('sifre','kullanici_id');

        $kullanici = KullaniciBilgileri::findOrFail($dataKullanici['kullanici_id']);
        $kullanici->sifre = $dataKullanici['sifre'];
        $kullanici->save();

        return view('kayit_basarili');
    }


    public function loginSayfasi(Request $req)
    {
        $menu = SabitSayfalar::where('durum','=','1')->whereNull('ust_sayfa')->where('kategori_id','=','3')->get();
                                                   
        return view('kullanici.login_arayuz')->with('eposta', "")
                                             ->with('ssayfa_menu', $menu)
                                             ->with('bilgi_login_error', "");
    }


    public function girisYap(Request $req)
    {
        $dataKullanici = $req->only('mail_adresi','sifre');

        $menu = SabitSayfalar::where('durum','=','1')->whereNull('ust_sayfa')->where('kategori_id','=','3')->get();

        $varmi = KullaniciBilgileri::where('mail_adresi','=', $dataKullanici["mail_adresi"])
                                    ->where('sifre','=',$dataKullanici["sifre"])->count();

       if($varmi == '1')
       {
            $data = KullaniciBilgileri::where('mail_adresi','=', $dataKullanici["mail_adresi"])->where('uyelik_durumu','1')->get();
            Session::set('giris_kullanici', $data);
 
            if (Session::has('sessionSepet'))
                return redirect()->route('sepetim');
            else
                return redirect()->action('KullaniciController@kullaniciPaneli');
       }

       else
       {
		   return redirect('giris-yap')->with('eposta', $dataKullanici["mail_adresi"])
                                       ->with('bilgi_login_error', "Uyarı : E-Posta adresi veya şifre yanlış.");
       }
    }


    public function kullaniciPaneli()
    {
        if (Session::has('sepet'))
            return redirect()->action('ETicaretController@sepet');
        else
            return view('kullanici.kullanici_paneli_arayuz');
    }

    public function kullaniciBilgileri()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('kullanici_bilgileri');

        $xcrud->label(array(
                'mail_adresi' => 'Mail Adresiniz : ',
                'sifre'=>'Şifreniz : ',
                'ad_soyad'=>'Ad Soyad : ',
                'created_at'=>'Üyelik Tarihi : ',
                'updated_at'=>'Bilgileri Güncelleme Tarihi : ',
                'uyelik_durumu' => 'Üyelik Durumu : ',
                'kurum' => 'Çalıştığınız Kurum : ',
                'telefon_no' => 'Telefon Numaranız : ',
                'yetki' => '(Sadece yönetici değiştirebilir) Üyelik Tipiniz : '
        ));


        $user_data = Session::get('giris_kullanici');

        $xcrud->change_type('updated_at','hidden');
        $xcrud->change_type('uyelik_durumu','hidden');
        $xcrud->change_type('sifre','password');

        $xcrud->unset_add();
        $xcrud->unset_list();

        $xcrud->readonly('mail_adresi,created_at,updated_at');
        
        $xcrud->after_update('guncelleme_donusu');


        // $xcrud->unset_list();
        //$deger = $xcrud->render('view', 30);

        return view('kullanici.kullanici_bilgileri')->with('xcrud',$xcrud)
                                                    ->with('id',$user_data[0]['id']);
    }


    public function mesajAt()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('kp_iletisim');

        $xcrud->label(array(
                'mail_adresi' => 'Mail Adresiniz',
                'ad_soyad'=>'Ad Soyad',
                'mesaj'=>'Mesajınız',
                'cevap'=>'Yönetici Cevabı',
                'created_at'=>'Tarih',
                'konu' => 'Konu'
        ));

        $kullanici_id = Session::get('giris_kullanici');
        
        //dd($kullanici_id['0']);
        
        
        $kbilgileri = KullaniciBilgileri::findOrFail($kullanici_id['0']);

        $xcrud->columns('konu, mail_adresi, ad_soyad, mesaj, cevap, created_at'); 

        $xcrud->table_name('Site Yöneticisine Mesaj At');


        #varsayılanlar : 
        $xcrud->pass_default('created_at',date('Y-m-d'));
        $xcrud->pass_var('created_at',date('Y-m-d'));

        $xcrud->pass_default('mail_adresi',$kbilgileri['mail_adresi']);
        $xcrud->pass_var('mail_adresi',$kbilgileri['mail_adresi']);     

        $xcrud->pass_default('ad_soyad',$kbilgileri['ad_soyad']);
        $xcrud->pass_var('ad_soyad',$kbilgileri['ad_soyad']);

        $xcrud->pass_default('cevap','Bekleniyor...');
        $xcrud->pass_var('cevap','Bekleniyor...');
        #----------------------------------------------------------

        $xcrud->change_type('mail_adresi','hidden');
        $xcrud->change_type('ad_soyad','hidden');
        $xcrud->change_type('uyelik_durumu','hidden');
        $xcrud->change_type('created_at','label');
        $xcrud->change_type('mesaj', 'textarea');
        $xcrud->readonly('cevap');
        $xcrud->no_editor('cevap');

        $xcrud->unset_remove();
        $xcrud->unset_edit();

        //çalıştır:
        $xcrud->where('mail_adresi', $kbilgileri['mail_adresi']);

        //$xcrud->unset_list();
        
        return view('kullanici.mesaj-at')->with('xcrud',$xcrud);
    }
    
    public function sifremiUnuttumSayfasi()
    {
        $adSoyad = ""; //mail adresi yanlış girildiğinde kayitOl fonksiyonu aracılığıyla ad soyad bilgisi tutacak.
        $bilgi = null;

        return view('kullanici.sifremi_unuttum')->with('bilgi', $bilgi);
    }
    
    public function sifremiUnuttum(Request $req)
    {
        $req['mail_adresi'];
        $sorgula = KullaniciBilgileri::where('mail_adresi',$req['mail_adresi'])->where('uyelik_durumu','1')->count();
        
        if($sorgula == '1')
        {   
            $sifre = KullaniciBilgileri::where('mail_adresi',$req['mail_adresi'])->where('uyelik_durumu','1')->pluck('sifre');
            //dd($sifre[0]);
            
            $mailadresi = $req['mail_adresi'];
            $konu = "Şifremi Unuttumm";
            //dd($mailadresi);
            Mail::send('kullanici.sifremi_unuttum_mail_sablonu', ['sifre'=>$sifre[0], 'mail'=>$mailadresi], function($message) use($mailadresi)
            {
               $message->to("$mailadresi")->subject("MaviForex Şifre Hatırlatma E-Postası");
            });

            $bilgi = "Şifreniz  $req[mail_adresi] adlı mail adresinize başarıyla gönderildi.";
        
        }else{
            $bilgi = "Sistemimizde $req[mail_adresi] mail adresine sahip bir kullanıcı yok.";
        }
        
        return view('kullanici.sifremi_unuttum')->with('bilgi', $bilgi);
    }
    
    
    public function cikis()
    {
        if(Session::has('giris_kullanici'))
        {
            Session::forget('giris_kullanici');
        }

        Session::forget('giris_kullanici');
        return view('kullanici.cikis');
    }
}