<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use Session;
use xcrud;

include('xcrud/xcrud/xcrud.php'); //public klasöründe

class AdminGoruntuleController extends Controller
{
    public function girisSayfasi(){
        return view('admin.admin_giris');
    }

	public function Admin()
	{
        ##################### E-BÜLTEN ########################
        $xcrud = Xcrud::get_instance();
        $xcrud->table('e_bulten');
        $xcrud->where('id >',4);
        $xcrud->order_by('id','desc');
        $xcrud->table_name('<small><i class="fa fa-info-circle"></i> E-Bülten Aracılığıyla Bildirilen Mail Adresleri </small>');
        $xcrud->order_by('id','desc');
       
        $xcrud->label(array(
            'eposta' => 'Mail Adresi',
         ));

        $xcrud->columns('eposta, created_at'); 

        $xcrud->unset_edit();
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_csv();
        $xcrud->unset_print();
        $xcrud->unset_view();

        $xcrud->change_type('id','hide');
        $xcrud->change_type('updated_at','hide');


        ###################### İŞ BAŞVURUSU ############################
        $xcrud2 = Xcrud::get_instance();
        $xcrud2->table('is_basvuru_formu');
        $xcrud2->table_name('<small><i class="fa fa-info-circle"></i> Site üzerinden iş başvurusunda bulunan kişilerin, iş başvuru bilgilerini bu alandan takip edebilirsiniz.</small>');
       // $xcrud2->unset_title();
        $xcrud2->order_by('b_id','desc');

        $xcrud2->label(array(
                'b_adsoyad' => 'Ad Soyad',
                'b_eposta' => 'E-Posta Adresi',
                'd_dyeri' => 'Doğum Yeri',
                'd_dtarih' => 'Doğum Tarihi',
                'd_ikametgah' => 'İkametgah',
                'd_evtelefon' => 'Ev Telefonu',
                'd_ctelefon' => 'Cep Telefonu',
                'd_ogrenimdurumu' => 'Eğitim Durumu',
                'd_medenidurumu' => 'Medeni Durumu',
                'd_sabıka_kaydi' => 'Sabıka Kaydı',
                'd_askerlik_durumu' => 'Askerlik Durumu',
                'd_dahaoncecalistiginizfirma' => 'Çalışılan Firmalar',
                'd_referans_kisiler' => 'Referanslar',
                'd_bilgisayarbilgisivarmi' => 'Bilgisayar Bilgisi',
                'd_kullandiginizprogramlar' => 'Bilinen Programlar',
                'd_talepettiginizucret' => 'Talep Edilen Ücret',
                'd_cv' => 'CV Dosyası'
        ));

        $xcrud2->columns('b_adsoyad, b_eposta, d_ctelefon, d_referans_kisiler, d_talepettiginizucret, d_cv');

        $xcrud2->change_type('b_id','hide');
        $xcrud2->change_type('d_cv', 'file','', array('not_rename'=>true, 'path'=>'..\..\dosyalar\cvdosyalari'));
        
        $xcrud2->unset_csv();
        $xcrud2->unset_print();
        $xcrud2->unset_search();
        $xcrud2->unset_view();
        $xcrud2->unset_remove();
        $xcrud2->unset_add();

        $xcrud2->readonly('b_adsoyad');
        $xcrud2->readonly('b_eposta');
        $xcrud2->readonly('d_dyeri');
        $xcrud2->readonly('d_dtarih');
        $xcrud2->readonly('d_ikametgah');
        $xcrud2->readonly('d_evtelefon');
        $xcrud2->readonly('d_ctelefon');
        $xcrud2->readonly('d_ogrenimdurumu');
        $xcrud2->readonly('d_medenidurumu');
        $xcrud2->readonly('d_sabıka_kaydi');
        $xcrud2->readonly('d_askerlik_durumu');
        $xcrud2->readonly('d_dahaoncecalistiginizfirma');
        $xcrud2->readonly('d_referans_kisiler');
        $xcrud2->readonly('d_bilgisayarbilgisivarmi');
        $xcrud2->readonly('d_kullandiginizprogramlar');
        $xcrud2->readonly('d_talepettiginizucret');
        $xcrud2->readonly('d_cv');

        $xcrud2->no_editor('d_ikametgah,d_dahaoncecalistiginizfirma,d_referans_kisiler,d_kullandiginizprogramlar');



        ############### İLETİŞİM FORMU MESAJLARI ######################
        $xcrud3 = Xcrud::get_instance();
        $xcrud3->table('iletisim_formu');
        $xcrud3->order_by('if_id','desc');
        $xcrud3->table_name('<small><i class="fa fa-info-circle"></i> Sitedeki iletişim formu aracılığıyla mesaj gönderen ziyaretçilerin, göndermiş oldukları mesajları buradan takip edebilirsiniz.</small>');
       
        $xcrud3->label(array(
            'if_adi' => 'Ad Soyad',
            'if_eposta' => 'Mail Adresi',
            'if_telefon' => 'Telefon Numarası',
            'if_konu' => 'Mesajın Konusu',
            'if_mesajiniz' => 'Mesaj',
            'if_tarih' => 'Tarih',
         ));

        $xcrud3->columns('if_adi, if_eposta, if_telefon, if_konu, if_mesajiniz, if_tarih'); 

        
        $xcrud3->unset_edit();
        $xcrud3->unset_remove();
        $xcrud3->unset_add();
        $xcrud3->unset_csv();
        $xcrud3->unset_print();

        $xcrud3->change_type('if_id','hide');
        $xcrud3->change_type('if_kid','hide');
        $xcrud3->change_type('if_dosya_adi','hide');


        return view('admin.index')->with('xcrudisbasvurusu',$xcrud2)
                                  ->with('xcrudiletisimformumesajlari',$xcrud3)
                                  ->with('xcrud',$xcrud);
	}

  public function Login(Request $req)
  {
      $dataKullanici = $req->only('kullanici_adi','sifre');

      $varmi = Admin::where('kullanici_adi','=', $dataKullanici["kullanici_adi"])
      ->where('sifre','=',$dataKullanici["sifre"])->count();

      if($varmi == '1')
      {   
       $id = Admin::where('kullanici_adi','=', $dataKullanici["kullanici_adi"])->pluck('id');
       Session::set('giris_admin', $id);
	   
       return redirect()->action('AdminGoruntuleController@Admin');
     }

     else
     {
      return redirect()->action('AdminGoruntuleController@girisSayfasi');
    }
  }

    public function LogOut()
    {
        Session::forget('giris_admin');
        return redirect()->action('AdminGoruntuleController@girisSayfasi');
    }
}
