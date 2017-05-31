<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use Session;
use Xcrud;
use App\TopluMailSablonu;
use App\KullaniciBilgileri;

include('xcrud/xcrud/xcrud.php');

class AdminController extends Controller
{
    public function anasayfaAyarlari()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('site_ayarlari');
        $xcrud->table_name('Site SEO ve Sosyal Medya Ayarları');

        $xcrud->label(array(
            'title' => 'Title',
            'enust_bilgi' => 'Alt Açıklama Yazısı 1',
            'footer1'=>'Alt Açıklama Yazısı 2',
            'footer2'=>'Alt Açıklama Yazısı 3',
            'facebook'=>'Facebook Sayfanızın Linki',
            'twitter'=>'Twitter Sayfanızın Linki',
            'youtube'=>'Yotube Sayfanızın Linki',
            'instagram'=>'İnstagram Sayfanızın Linki',
            'google_plus'=>'Google Plus Sayfanızın Linki'
        ));

        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_remove();
        $xcrud->unset_add();

        $xcrud->hide_button('save_return');
        $xcrud->hide_button('return');

        $xcrud->change_type('sayfa_id','hidden');
       /* $xcrud->change_type('footer2','hidden');
        $xcrud->change_type('facebook','hidden');
        $xcrud->change_type('twitter','hidden');
        $xcrud->change_type('youtube','hidden'); 
        $xcrud->change_type('enust_bilgi','hidden'); */
        $xcrud->change_type('durum,youtube','hidden');
        $xcrud->no_editor('footer1, footer2,enust_bilgi');

        return view('admin.site_ayar')->with('xcrud',$xcrud);
    }

   public function menuler(){

        $xcrud = Xcrud::get_instance();
        $xcrud->table('sabit_sayfa_kategori');
        $xcrud->where('developer_set','1');
        $xcrud->table_name('Menüler');
        $xcrud->order_by('sira');

        $xcrud->label(array(
            'kategori' => 'Menü Adı',
            'icerik'=>'İçerik',
            'updated_at'=>'Aktif',
            'created_at'=>'Kategori',
            'durum' => 'Ana Menüde Gösterilsin',
            'link' => 'Link',
            'description' => 'Kısa Açıklama',
            'alt_menu' => 'Tıklanınca Alt Menüler Gösterilsin'
        ));

        $xcrud->before_insert('kategoriSeflinkEkleTR'); 
        //$xcrud->before_update('kategoriSeflinkEkleTR'); 
        
        $xcrud->columns('kategori, durum, alt_menu,menudeki_yeri'); 

        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_remove();
        
        $xcrud->change_type('id','hide');
        $xcrud->change_type('icerik','hide');
        $xcrud->change_type('updated_at','hide');
        $xcrud->change_type('created_at','hide');
        $xcrud->change_type('developer_set','hide');
        $xcrud->change_type('description','hide');
        $xcrud->change_type('link','hide');

        //$xcrud->field_callback('link','nice_input');

        $xcrud->button('/{link}','Menüye Git','','',array('target'=>'_blank'));

        return view('admin.goster')->with('xcrud',$xcrud);
    }

    public function sliderYonetimi()
    {
        $slider = Xcrud::get_instance();
        $slider->table('sliders');
        $slider->table_name('Manşet Yönetimi <small> - <b>UYARI : </b> Düzgün bir görüntü elde edebilmek için ekleyeceğiniz manşetin genişliği 1366 piksel, yüksekliği 474 piksel (1366x474) olmalı. </small> ');
        $slider->order_by('siralama');
        $slider->where('tur','Manset');

        $slider->label(array(
            'slider_adi' => 'Adı',
            'slider_icerik'=>'İçerik',
            'slider_resim_url' => 'Görsel',
            'durum'=>'Aktif'
        ));

        $slider->change_type('slider_resim_url', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\slider'));
        $slider->columns('slider_resim_url, slider_adi, slider_icerik, tur, durum');

		$slider->change_type('tur,slider_icerik','hide');
		$slider->pass_var('tur',1);
		
        $slider->unset_print();
        $slider->unset_csv();
        $slider->unset_remove();

        ################################################# MANŞET ALANI YÖNETİMİ #################################################
        $banner = Xcrud::get_instance();
        $banner->table('sliders');
        $banner->table_name('Banner Yönetimi');
        $banner->order_by('siralama');
        $banner->where('tur','Banner');

        $banner->label(array(
            'slider_adi' => 'Adı',
            'slider_icerik'=>'İçerik',
            'slider_resim_url' => 'Görsel',
            'durum'=>'Aktif'
        ));

        $banner->columns('slider_resim_url, slider_adi, slider_icerik, tur, durum');
        $banner->change_type('slider_icerik', 'hidden');
		
		$banner->change_type('tur,slider_icerik','hide');
		$banner->pass_var('tur',2);

        $banner->change_type('slider_resim_url', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\banner'));
       // $banner->validation_required('slider_resim_url, link');

        $banner->unset_print();
        $banner->unset_csv();
        $banner->unset_remove();
          
        return view('admin.goster')->with('xcrud', $slider)
                                   ->with('banner', $banner);
    }
    
    public function kurumsal()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('sabit_sayfalar');
        $xcrud->where('kategori_id =','2');
        $xcrud->table_name('Kurumsal');

       $xcrud->label(array(
            'sayfa_adi' => 'Sayfa Adı / Başlık',
            'durum'=>'Aktiflik',
            'kisa_aciklama'=> 'Kısa Açıklama (max:160 krktr)',
            'sayfa_icerik'=>'Sayfa İçeriği',
            'sayfa_linki' => 'Sayfa Linki',
            'resim_linki' => 'Ana Görsel',
            'icerik' => 'İçerik',
            'kategori_id'=> 'Kategori Adı'
        ));
        
        $xcrud->before_insert('sabitSayfaSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'hizmetSeflinkEkleTR' adlı fonksiyon.
        //$xcrud->before_update('sabitSayfaSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'hizmetSeflinkEkleTR' adlı fonksiyon.

        $xcrud->columns('sayfa_adi,sayfa_icerik, durum, sayfa_linki'); 
        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_remove();

        $xcrud->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\kurumsal'));

        //bu tablodaki sutun, diğer tablo adı, diğer tablo idsi, çekilecek kolon.
        //$xcrud->relation('kategori_id','sabit_sayfa_kategori','id','kategori');

        $xcrud->field_tooltip('sayfa_linki', 'Bu kısım sayfa başlığına göre otomatik olarak oluşturulur.
        Link, Google\'da yer edindikten sonra ürün başlığının değiştirilmesi tavsiye edilmez.');

        $xcrud->field_callback('sayfa_linki','nice_input');

        $xcrud->pass_var('kategori_id', '2');
        $xcrud->change_type('kategori_id,sayfa_id,ust_sayfa,resimler_id,kisa_aciklama,kategori_id,icon,anasayfada_goster,menudeki_yeri','hide');


        $xcrud->button('/{sayfa_linki}','İçeriğe Git','','',array('target'=>'_blank'));
    
        return view('admin.goster')->with('xcrud', $xcrud);
    }

    public function insanKaynaklari()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('sabit_sayfalar');
        $xcrud->where('kategori_id =','6');
        $xcrud->table_name('İnsan Kaynakları');

       $xcrud->label(array(
            'sayfa_adi' => 'Sayfa Adı / Başlık',
            'durum'=>'Aktiflik',
            'kisa_aciklama'=> 'Kısa Açıklama (max:160 krktr)',
            'sayfa_icerik'=>'Sayfa İçeriği',
            'sayfa_linki' => 'Sayfa Linki',
            'resim_linki' => 'Ana Görsel',
            'icerik' => 'İçerik',
            'kategori_id'=> 'Kategori Adı'
        ));
        
        $xcrud->before_insert('ikSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'ikSeflinkEkleTR' adlı fonksiyon.
        //$xcrud->before_update('ikSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'ikSeflinkEkleTR' adlı fonksiyon.

        $xcrud->columns('sayfa_adi, kategori_id, kisa_aciklama, resim_linki, sayfa_icerik, durum, sayfa_linki'); 
        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_remove();

        $xcrud->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\ik'));

        //bu tablodaki sutun, diğer tablo adı, diğer tablo idsi, çekilecek kolon.
        //$xcrud->relation('kategori_id','sabit_sayfa_kategori','id','kategori');

        $xcrud->field_tooltip('sayfa_linki', 'Bu kısım sayfa başlığına göre otomatik olarak oluşturulur.
        Link, Google\'da yer edindikten sonra ürün başlığının değiştirilmesi tavsiye edilmez.');

        $xcrud->field_callback('sayfa_linki','nice_input');

        $xcrud->pass_var('kategori_id', '6');
        $xcrud->change_type('sayfa_id','hidden');
        $xcrud->change_type('kategori_id','hidden');
        $xcrud->change_type('kisa_aciklama','hidden');
        $xcrud->change_type('resimler_id','hidden');


        $xcrud->button('/{sayfa_linki}','İçeriğe Git','','',array('target'=>'_blank'));
    
        return view('admin.goster')->with('xcrud', $xcrud);
    }


    public function galeri()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('sabit_sayfalar');
        $xcrud->where('kategori_id =','5');
        $xcrud->table_name('Galeri Albümleri');

        $xcrud->label(array(
            'sayfa_adi' => 'Albüm Adı',
            'durum'=>'Menüde Göster',
            'sayfa_icerik'=>'Sayfa İçeriği',
            'sayfa_linki' => 'Sayfa Linki',
            'resim_linki' => 'Albüm Kapak Resmi',
            'icerik' => 'İçerik',
            'kategori_id'=> 'Kategori Adı'
        ));
        
        $xcrud->before_insert('galeriSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'hizmetSeflinkEkleTR' adlı fonksiyon.
       // $xcrud->before_update('galeriSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'hizmetSeflinkEkleTR' adlı fonksiyon.

        $xcrud->columns('sayfa_adi, kategori_id, kisa_aciklama, resim_linki, sayfa_icerik, durum'); 
        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_remove();

        $xcrud->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\galeri'));

        ################LİNK:
        $xcrud->field_tooltip('sayfa_linki', 'Bu kısım sayfa başlığına göre otomatik olarak oluşturulur.
        Link, Google\'da yer edindikten sonra ürün başlığının değiştirilmesi tavsiye edilmez.');

        $xcrud->field_callback('sayfa_linki','nice_input');

        ####################################
        //bu tablodaki sutun, diğer tablo adı, diğer tablo idsi, çekilecek kolon.
        //$xcrud->relation('kategori_id','sabit_sayfa_kategori','id','kategori');
        $xcrud->pass_var('kategori_id', '5');
        $xcrud->change_type('sayfa_id','hidden');
        $xcrud->change_type('kategori_id','hidden');
        $xcrud->change_type('resimler_id','hidden');
        $xcrud->change_type('kisa_aciklama','hidden');
        $xcrud->change_type('sayfa_icerik','hidden');
    
        $xcrud->button('/{sayfa_linki}','İçeriğe Git','','',array('target'=>'_blank'));

        //sabit sayfalar'dan : id ;;;;;; resimler tablosundan: r_kategori_id
        $resimler = $xcrud->nested_table('Galeri Resimleri', 'id', 'resimler', 'r_kategori_id');

        $xcrud->default_tab('Galeri Adı');
        
        $resimler->label(array(
            'r_resim' => 'Fotoğraf',
            'r_aciklama' => 'Fotoğraf Adı',
        ));
        
        $resimler->change_type('r_id','hidden');
        $resimler->change_type('r_kategori_id','hidden');


        $resimler->unset_title();
        $resimler->unset_remove();
        $resimler->unset_csv();
        $resimler->unset_search();
        $resimler->unset_print();
        $resimler->start_minimized();
        $resimler->unset_print();

        $resimler->change_type('r_resim', 'image','', array('path'=>'..\..\img\galeri', 'not_rename'=>true));

        //$xcrud->fields('sayfa_adi,icerik,sayfa_icerik,durum,sayfa_linki,resim_linki,description', 'Kategori Adı');
        //$resimler->fields('r_resim', 'Resimler');
       


        return view('admin.goster')->with('xcrud', $xcrud);   
    }

    public function hizmetler()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('sabit_sayfalar');
        $xcrud->table_name('Hizmetler');
        $xcrud->where('kategori_id = ', 3);

        $xcrud->label(array(
            'sayfa_adi' => 'Ürün Adı',
            'sayfa_icerik'=>'Açıklama',
            'durum'=>'Aktif',
            'sayfa_linki' => 'Sayfa Linki'
        ));
                
        #Zorulu alanlar:
        #$xcrud->validation_required('baslik');
        #$xcrud->validation_required('icerik');
        #$xcrud->validation_required('tarih');
        #$xcrud->validation_required('resim_linki');
        #---------------------------------------------#

        $xcrud->before_insert('hizmetlerSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'hizmetSeflinkEkleTR' adlı fonksiyon.
       // $xcrud->before_update('hizmetlerSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'hizmetSeflinkEkleTR' adlı fonksiyon.

        $xcrud->columns('sayfa_adi, sayfa_icerik, resim_linki, durum');

        $xcrud->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\hizmetler'));

        $xcrud->change_type('kategori_id','hide');
        $xcrud->change_type('kisa_aciklama','hide');
        $xcrud->change_type('icon','hide');
        $xcrud->change_type('resimler_id','hide');

        $xcrud->field_tooltip('sayfa_linki', 'Bu kısım sayfa başlığına göre otomatik olarak oluşturulur.
        Link, Google\'da yer edindikten sonra ürün başlığının değiştirilmesi tavsiye edilmez.');

        $xcrud->column_pattern('sayfa_linki','<div class="input-group">
                                <span style="background-color:#e5e5e5;" class="input-group-addon" id="basic-addon3">#</span>
                                <input type="text" class="form-control" value="{sayfa_linki}" id="basic-url" aria-describedby="basic-addon3">
                                </div>');

        $xcrud->field_callback('sayfa_linki','nice_input');

        $xcrud->pass_var('kategori_id',3);
    
        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_remove();

        # eğer her içeriğin ayrı bir menüde olması istenirse.
        //$xcrud->relation('kategori_id','alt_menu','id','menu_adi','','','','',array('primary_key'=>'id','parent_key'=>'menu_id'));
        
        $xcrud->button('/{sayfa_linki}','İçeriğe Git','','',array('target'=>'_blank'));

        return view('admin.goster')->with('xcrud', $xcrud);
    }

    public function urunKategorileri()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('sabit_sayfalar');
        $xcrud->table_name('Ürün Kategorileri <small> - Buradan siteye yeni ürün kategorisi eklenebilir. </small>');
        $xcrud->where('kategori_id = ', 3)->where('ust_sayfa IS NULL')->where('ust_sayfa_iki IS NULL');
		
        $xcrud->label(array(
            'sayfa_adi' => 'Kategori Adı',
            'sayfa_icerik'=>'Açıklama',
            'durum'=>'Aktif',
            'sayfa_linki' => 'Sayfa Linki',
            'resim_linki' => 'Resim',
            'description' => 'Arama Motoru Açıklaması',
        ));
                
        #Zorulu alanlar:
        #$xcrud->validation_required('baslik');
        #$xcrud->validation_required('icerik');
        #$xcrud->validation_required('tarih');
        #$xcrud->validation_required('resim_linki');
        #---------------------------------------------#
		

        $xcrud->column_cut(250,'description');
        $xcrud->column_width('description','55%');

        $xcrud->before_insert('urunlerSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'urunlerSeflinkEkleTR' adlı fonksiyon.
        $xcrud->before_update('urunlerSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'urunlerSeflinkEkleTR' adlı fonksiyon.

        $xcrud->columns('sayfa_adi,anasayfada_goster, durum');

        //$xcrud->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\urunler'));

        $xcrud->change_type('ust_sayfa, ust_sayfa_iki,kategori_id,kisa_aciklama,icon,resimler_id,icon, menudeki_yeri,description,resim_linki','hide');

        $xcrud->field_tooltip('sayfa_linki', 'Bu kısım sayfa başlığına göre otomatik olarak oluşturulur.
        Link, Google\'da yer edindikten sonra ürün başlığının değiştirilmesi tavsiye edilmez.');

        $xcrud->field_tooltip('description', 'Bu kısma yazacağınız içerik arama motorlarında kullanıcıya gösterilecektir.');

        $xcrud->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\urunler'));

         $xcrud->field_callback('sayfa_linki','nice_input');

        $xcrud->pass_var('kategori_id',3);
    
        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_add();
        $xcrud->unset_remove();
        $xcrud->unset_pagination();
        $xcrud->unset_limitlist();
        $xcrud->unset_search();
        $xcrud->limit('all');


        $xcrud->button('/{sayfa_linki}','İçeriğe Git','','',array('target'=>'_blank'));
		
		## Fonksiyonel İşlemler
        $xcrud->before_insert('urunlerSeflinkEkleTR');
        $xcrud->before_update('urunlerSeflinkEkleTR');
       // $xcrud->after_insert('dilSecenekleriniOtomatikOlustur'); # İlk LinkRecords kaydı da burada oluyor.
       // $xcrud->after_update('changePicture'); //anadil için foto eklenince translate tablosuna da eklensin.
        
        ######################################################################################
        #################################### DİĞER DİLLER ####################################
        ######################################################################################
        /*$xcrud->default_tab('Türkçe');
        $translate = $xcrud->nested_table('Translate','id','sabit_sayfalar_translate','sabit_sayfalar_id');
        $translate->columns('sayfa_adi,sayfa_icerik,dil');
        $translate->fields('dil, sayfa_adi, sayfa_icerik, sayfa_linki');
        $translate->readonly('dil');
        $translate->field_callback('sayfa_linki','nice_input');
        $translate->default_tab('Translate');
        $translate->table_name('Translate');
        $translate->unset_add();
        $translate->unset_remove();
        $translate->before_update('urunlerSeflinkTranslate');
        //$translate->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\products')); */
        ######################################################################################
        ######################################################################################

        return view('admin.goster')->with('xcrud', $xcrud);

    }


    public function urunler()
    {
        ########################## ALT ÜRÜN ########################################
        $xcrud_alt_urun = Xcrud::get_instance();
        $xcrud_alt_urun->table('sabit_sayfalar');
        $xcrud_alt_urun->table_name('Sitede Yer Alan Tüm Ürünler - <small>Bu alandan ürün bilgilerini düzenleyebilir veya siteye yeni ürün ekleyebilirsiniz.</small>');
        $xcrud_alt_urun->where('kategori_id = ', 3)->where('ust_sayfa IS NOT NULL')->where('ust_sayfa_iki IS NOT NULL');

        $xcrud_alt_urun->label(array(
            'sayfa_adi' => 'Ürün Adı',
            'kisa_aciklama' => 'Ürün Özellikleri',
            'sayfa_icerik'=>'Detaylı Bilgi',
            'durum'=>'Aktif',
            'sayfa_linki' => 'Sayfa Linki',
            'anasayfada_goster' => 'Taviye Edilen Ürün',
            'resim_linki' => 'Resim',
            'ust_sayfa' => 'Ana Kategori',
            'ust_sayfa_iki' => 'Ana Kategorinin Alt Kategorisi'
        ));
        
        #Zorulu alanlar:
        #$xcrud->validation_required('baslik');
        #$xcrud->validation_required('icerik');
        #$xcrud->validation_required('tarih');
        #$xcrud->validation_required('resim_linki');
        #---------------------------------------------#

        $xcrud_alt_urun->columns('resim_linki, sayfa_adi, ust_sayfa, durum');

        $xcrud_alt_urun->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\urunler'));

        $xcrud_alt_urun->change_type('anasayfada_goster,kategori_id,icon,resimler_id,menudeki_yeri','hide');
        //$xcrud_alt_urun->no_editor('kisa_aciklama');

        $xcrud_alt_urun->field_tooltip('sayfa_linki', 'Bu kısım sayfa başlığına göre otomatik olarak oluşturulur.
        Link, Google\'da yer edindikten sonra ürün başlığının değiştirilmesi tavsiye edilmez.');      

        $xcrud_alt_urun->field_tooltip('anasayfada_goster', 'Tik işareti atılması durumunda bu ürün, site anasayfasındaki tavsiye edilen ürünler arasında görüntülenir.');

        $xcrud_alt_urun->field_callback('sayfa_linki','nice_input');

        $xcrud_alt_urun->pass_var('kategori_id',3);
        $xcrud_alt_urun->pass_var('menudeki_yeri','');

		## BİRBİRİ İLE İLİŞKİLİ COMBOBOX ##
        $xcrud_alt_urun->relation('ust_sayfa','sabit_sayfalar','id','sayfa_adi', 'sabit_sayfalar.kategori_id=3 AND sabit_sayfalar.ust_sayfa IS NULL
								   AND sabit_sayfalar.ust_sayfa_iki IS NULL');
		
		#getirilmek istenen sutun, tablo adı, tablo id, comboda gösterilecek isim, bağlanacak olan bilgilerde olması gereken ait sql koşulu, bağlanacak yerin id değeri
		$xcrud_alt_urun->relation('ust_sayfa_iki','sabit_sayfalar','id',array('sayfa_adi'),'sabit_sayfalar.kategori_id=3 AND sabit_sayfalar.ust_sayfa IS NOT NULL AND sabit_sayfalar.ust_sayfa_iki IS NULL','','',' ','','ust_sayfa','ust_sayfa');
		#################################################################################################################
	
		
        $xcrud_alt_urun->field_tooltip('description', 'Bu kısma yazacağınız içerik arama motorlarında kullanıcıya gösterilecektir.');

        $xcrud_alt_urun->unset_print();
        $xcrud_alt_urun->unset_csv();
        $xcrud_alt_urun->unset_remove();

        $xcrud_alt_urun->validation_required('ust_sayfa');
        // $xcrud_alt_urun->validation_required('ust_sayfa_iki'); 

        # eğer her içeriğin ayrı bir menüde olması istenirse.
        //$xcrud->relation('kategori_id','alt_menu','id','menu_adi','','','','',array('primary_key'=>'id','parent_key'=>'menu_id'));
        
        $xcrud_alt_urun->button('/{sayfa_linki}','İçeriğe Git','','',array('target'=>'_blank'));

        $xcrud_alt_urun->default_tab('Ürün Bilgileri');

        #####################################################################################################################
        $resimler = $xcrud_alt_urun->nested_table('Ürün Resimleri', 'id', 'resimler', 'r_kategori_id');

        $resimler->label(array(
            'r_resim' => 'Fotoğraf',
            'r_aciklama' => 'Fotoğraf Adı',
        ));
        
        $resimler->change_type('r_id','hidden');
        $resimler->change_type('r_kategori_id','hidden');
		
        $resimler->unset_title();
        $resimler->unset_remove();
        $resimler->unset_csv();
        $resimler->unset_search();
        $resimler->unset_print();
        $resimler->start_minimized();
        $resimler->unset_print();

        $resimler->change_type('r_resim', 'image','', array('path'=>'..\..\img\urunler\urun', 'not_rename'=>true));

        #####################################################################################################################

        ## Fonksiyonel İşlemler
        $xcrud_alt_urun->after_insert('getUrunIDvSeflink'); //E-Ticaret siteleri için.
        $xcrud_alt_urun->before_update('ALTurunlerSeflinkEkleTR');
        $xcrud_alt_urun->after_update('changeBrandName');
        //$xcrud_alt_urun->after_insert('dilSecenekleriniOtomatikOlustur'); // İki dilli siteler için.
        // $xcrud_alt_urun->after_update('changePicture'); //anadil için foto eklenince translate tablosuna da eklensin. İki dilli siteler için.

        ######################################################################################
        #################################### DİĞER DİLLER ####################################
        ###################################################################################### 
		/*
        $xcrud_alt_urun->default_tab('Türkçe');
        $translate = $xcrud_alt_urun->nested_table('Translate','id','sabit_sayfalar_translate','sabit_sayfalar_id');
        $translate->columns('sayfa_adi,sayfa_icerik,dil');
        $translate->fields('dil, sayfa_adi, sayfa_icerik, sayfa_linki');
        $translate->readonly('dil');
        $translate->field_callback('sayfa_linki','nice_input');
        $translate->default_tab('Translate');
        $translate->table_name('Translate');
        $translate->unset_add();
        $translate->unset_remove();
        $translate->before_update('altSayfalarTranslateSeflinkEkle'); */
        //$translate->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\products'));
        ######################################################################################
        ######################################################################################

        return view('admin.goster')->with('xcrud', $xcrud_alt_urun);

    }
	
	
    public function urunAltKategorileri()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('sabit_sayfalar');
        $xcrud->table_name('Alt Ürün Kategorileri <small> - Buradan siteye yeni ürün kategorisi eklenebilir. Bu sayfanın altında başka bir alt sayfa yok ise, bu sayfa görüntülenir. </small>');
        $xcrud->where('kategori_id = ', 3)->where('ust_sayfa IS NOT NULL')->where('ust_sayfa_iki IS NULL');

        $xcrud->label(array(
            'sayfa_adi' => 'Kategori / Sayfa Adı',
            'sayfa_icerik'=>'Ürünle İlgili Detaylı Bilgi',
            'durum'=>'Aktif',
            'sayfa_linki' => 'Sayfa Linki',
            'resim_linki' => 'Resim',
            'description' => 'Arama Motoru Açıklaması',
            'kisa_aciklama' => 'Ürün Özellikleri ve Fiyat',
            'ust_sayfa' => 'Kategori / Üst Sayfası'
        ));
                
        #Zorulu alanlar:
        #$xcrud->validation_required('baslik');
        #$xcrud->validation_required('icerik');
        #$xcrud->validation_required('tarih');
        #$xcrud->validation_required('resim_linki');
        #---------------------------------------------#
		
		$xcrud->relation('ust_sayfa','sabit_sayfalar','id','sayfa_adi', 'sabit_sayfalar.kategori_id=3 AND sabit_sayfalar.ust_sayfa IS NULL 
						AND sabit_sayfalar.ust_sayfa_iki IS NULL');

        $xcrud->column_cut(250,'description');
        $xcrud->column_width('description','55%');

		$xcrud->validation_required('ust_sayfa');
        $xcrud->before_insert('urunlerSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'urunlerSeflinkEkleTR' adlı fonksiyon.
        $xcrud->before_update('urunlerSeflinkEkleTR'); //xcrud dosyasındaki functions.php sayfasındaki 'urunlerSeflinkEkleTR' adlı fonksiyon.

        $xcrud->columns('resim_linki, sayfa_adi, ust_sayfa, durum');

        //$xcrud->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\urunler'));

        $xcrud->change_type('anasayfada_goster, ust_sayfa_iki,kategori_id,icon,resimler_id,icon, menudeki_yeri','hide');

        $xcrud->field_tooltip('sayfa_linki', 'Bu kısım sayfa başlığına göre otomatik olarak oluşturulur.
        Link, Google\'da yer edindikten sonra ürün başlığının değiştirilmesi tavsiye edilmez.');
		

        $xcrud->field_tooltip('description', 'Bu kısma yazacağınız içerik arama motorlarında kullanıcıya gösterilecektir.');

        $xcrud->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\urunler'));

         $xcrud->field_callback('sayfa_linki','nice_input');

        $xcrud->pass_var('kategori_id',3);
    
        $xcrud->unset_print();
        $xcrud->unset_csv();
        //$xcrud->unset_add();
        $xcrud->unset_remove();

        $xcrud->button('/{sayfa_linki}','İçeriğe Git','','',array('target'=>'_blank'));
		
		
		############################################## RESİMLER ####################################################################
		$xcrud->default_tab('Ürün/Kategori Bilgileri');
        $resimler = $xcrud->nested_table('Ürün Resimleri', 'id', 'resimler', 'r_kategori_id');

        $resimler->label(array(
            'r_resim' => 'Fotoğraf',
            'r_aciklama' => 'Fotoğraf Adı',
        ));
        
        $resimler->change_type('r_id','hidden');
        $resimler->change_type('r_kategori_id','hidden');

        $resimler->unset_title();
        $resimler->unset_remove();
        $resimler->unset_csv();
        $resimler->unset_search();
        $resimler->unset_print();
        $resimler->start_minimized();
        $resimler->unset_print();

        $resimler->change_type('r_resim', 'image','', array('path'=>'..\..\img\urunler\urun', 'not_rename'=>true));

        #####################################################################################################################

		## Fonksiyonel İşlemler --- urunler fonksiyonunun fonksiyonel işlemleri buraya eklenebilir.. denenebilir...
        $xcrud->after_insert('getUrunIDvSeflink'); //E-Ticaret siteleri için.
        $xcrud->before_update('ALTurunlerSeflinkEkleTR');
        $xcrud->after_update('changeBrandName');
        //$xcrud_alt_urun->after_insert('dilSecenekleriniOtomatikOlustur'); // İlk LinkRecords kaydı da burada oluyor. İki dilli siteler için. 
        // $xcrud_alt_urun->after_update('changePicture'); //anadil için foto eklenince translate tablosuna da eklensin. İki dilli siteler için.		

        ######################################################################################
        #################################### DİĞER DİLLER ####################################
        ###################################################################################### 
		/*
        $xcrud_alt_urun->default_tab('Türkçe');
        $translate = $xcrud_alt_urun->nested_table('Translate','id','sabit_sayfalar_translate','sabit_sayfalar_id');
        $translate->columns('sayfa_adi,sayfa_icerik,dil');
        $translate->fields('dil, sayfa_adi, sayfa_icerik, sayfa_linki');
        $translate->readonly('dil');
        $translate->field_callback('sayfa_linki','nice_input');
        $translate->default_tab('Translate');
        $translate->table_name('Translate');
        $translate->unset_add();
        $translate->unset_remove();
        $translate->before_update('altSayfalarTranslateSeflinkEkle'); */
        //$translate->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\products'));
        ######################################################################################
        ######################################################################################

        return view('admin.goster')->with('xcrud', $xcrud);
    }

    public function firsatUrunleri()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('urun_ozellikleri');
        $xcrud->table_name('Fırsat Ürünleri Listesi - <small>Bu alandan sadece fırsat ürünlerini görebilir ve fiyatları güncelleyebilirsiniz. Ürünlerler ilgili daha fazla detay 
        güncellemek için <a href="/admin/urun-yonetimi"> buraya tıklayarak </a> ürünler listesine gidebilirsiniz.</small>');
        $xcrud->where('firsat_urunu = ', 1);

        $xcrud->change_type('urun_id, marka, aktiflik','hidden');
        $xcrud->field_tooltip('firsat_urunu','Bu tiki kaldırıp, kaydet yaptığınız takdirde ürün, fırsat ürünleri listesinden kalkar.');
    
        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_add();
        $xcrud->unset_remove();
        $xcrud->unset_pagination();
        $xcrud->unset_limitlist();
        $xcrud->unset_search();
        $xcrud->limit('all');

        # eğer her içeriğin ayrı bir menüde olması istenirse.
        //$xcrud->relation('kategori_id','alt_menu','id','menu_adi','','','','',array('primary_key'=>'id','parent_key'=>'menu_id'));

        return view('admin.goster')->with('xcrud', $xcrud);

    }

	public function blogICerik()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('blog_icerik');
        $xcrud->table_name('Haber İçerikleri');
        $xcrud->order_by('id','desc');

        $xcrud->label(array(
            'baslik' => 'Başlık',
            'icerik'=>'İçerik',
            'durum'=>'Aktif',
            'kategori_id'=>'Kategori',
            'sayfa_linki' => 'Sayfa Linki',
            'resim_linki' => 'Ana Görsel',
			'tarih' => 'Tarih'
        ));
				
		#Zorulu alanlar:
		$xcrud->validation_required('baslik');
		$xcrud->validation_required('icerik');
		$xcrud->validation_required('tarih');
        $xcrud->validation_required('resim_linki');
		$xcrud->validation_required('kategori_id');
		#---------------------------------------------#

        $xcrud->before_insert('seflinkEkle'); //xcrud dosyasındaki functions.php sayfasındaki 'seflinkEkle' adlı fonksiyon.
        //$xcrud->before_update('seflinkGuncelle'); //xcrud dosyasındaki function.php sayfasındaki 'seflinkGuncelle' adlı fonksiyon.
		
        $xcrud->columns('baslik, icerik, tarih, resim_linki, kategori_id, durum'); 
        $xcrud->change_type('sayfa_linki','hide');
		
		$xcrud->change_type('resim_linki', 'image', '', array('not_rename'=>true, 'path'=>'..\..\img\blog'));
			
        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_remove();

        //$xcrud->relation('kategori_id','blog_menu','id','menu_adi','','','','',array('primary_key'=>'id','parent_key'=>'menu_id'));
        //üstteki ile alttaki aynı şey.
        $xcrud->relation('kategori_id','blog_menu','id','menu_adi');
        
        return view('admin.goster')->with('xcrud', $xcrud);
    }

    public function blogKategori()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('blog_menu');
        $xcrud->table_name('Haber Kategorileri');

        $xcrud->label(array(
            'menu_adi' => 'Kategori',
            'kategori_link'=>'Kategori Linki',
            'durum'=>'Aktif'
        ));
                
        #Zorulu alanlar:
        $xcrud->validation_required('baslik');
        $xcrud->validation_required('icerik');
        $xcrud->validation_required('tarih');
        $xcrud->validation_required('resim_linki');
        #---------------------------------------------#

        $xcrud->before_insert('seflinkEkle'); //xcrud dosyasındaki functions.php sayfasındaki 'seflinkEkle' adlı fonksiyon.
        //$xcrud->before_update('seflinkGuncelle'); //xcrud dosyasındaki function.php sayfasındaki 'seflinkGuncelle' adlı fonksiyon.
        
        $xcrud->columns('menu_adi, kategori_link, durum'); 
        $xcrud->change_type('menu_id','hide');

        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_remove();

        return view('admin.goster')->with('xcrud', $xcrud);
    }
	
    public function topluMailIletisi()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('toplu_mail');

        $xcrud->label(array(
                'konu' => 'Mail Konusu',
                'mesaj' => 'Mesajınız'
        ));

        $xcrud->columns('konu, mesaj');
        $xcrud->unset_list(); //geri dönmesin
        $xcrud->unset_add();  // yeni kayıt eklemesin
        $xcrud->change_type('mesaj', 'textarea');

        $xcrud->after_update('guncelleme_donusu'); //functions.php sitesindeki guncelleme_donusu() adlı fonk.dan geliyor alert uyarısı.

        return view('admin.toplu-mail-gonderimi')->with('xcrud',$xcrud);
    }

    public function iletisimBilgileri()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('iletisim_bilgileri');
        $xcrud->table_name('İletişim Bilgileri', 'Birden çok şubeye ait iletişim bilgileri eklenebilir.');

        $xcrud->label(array(
                'sube' => 'Şube / Kurum Adı',
                'telefon1' => 'Telefon Numarası',
                'telefon2' => 'Alternatif Tel. No.',
                'fax' => 'Fax',
                'mail1' => 'Mail Adresi',
                'mail2' => 'Alternatif Mail Adresi',
                'adres' => 'Adres',
                'konum' => 'Konum'
        ));

        $xcrud->columns('sube, telefon1, telefon2, fax, mail1, mail2'); 

        $xcrud->change_type('id','hide');
        $xcrud->no_editor('adres');
        $xcrud->change_type('konum','point','',array('text'=>'Buradasınız'));
        
        $xcrud->unset_csv();
        $xcrud->unset_print();
        $xcrud->unset_search();
        $xcrud->unset_view();
        $xcrud->unset_remove();
        $xcrud->unset_add();

        return view('admin.goster')->with('xcrud',$xcrud);
    }


    public function siparisler()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('siparis_detaylari');
        $xcrud->table_name('Siparişler');
        $xcrud->order_by('id','DESC');

        $xcrud->label(array(
            'created_at' => 'Sipariş Tarihi',
            'sifre'=>'Şifre',
            'toplam_odenen'=>'Ödenen Tutar',
            'ad_soyad' => 'Ad Soyad'
        ));
        
        $xcrud->columns('ad_soyad,mail_adresi, toplam_odenen, created_at, siparis_kodu, siparis_durumu');
        $xcrud->change_type('tckimlik,kullanici_id,updated_at,','hidden');
		
		/*
		$orderCode = '{id} * 472';

        $xcrud->subselect('Sipariş Kodu',$orderCode);
        $xcrud->change_type('Sipariş Kodu','price','3', array('prefix'=>'ADRSCNTR','separator'=>'', 'decimals'=>'0')); */
		
		//$xcrud->after_update('siparisOnayi'); # SERVER SIDE çalıştığı için SESSION işlemez. AJAX POST da olmaz o zaman da BASH failede sorunu.
		// laravel içinden post alınmıyor, TOKEN istiyor. 
		
		$xcrud->no_editor('adres');
		$xcrud->readonly('ad_soyad,mail_adresi, odeme_turu, toplam_odenen, created_at, Sipariş Kodu, ulke, sehir, adres, cep_telefonu, siparis_kodu');

        $xcrud->unset_add();
        $xcrud->unset_pagination();
        $xcrud->unset_remove();
        //$xcrud->unset_edit();
        $xcrud->unset_view();
        $xcrud->unset_search();
        $xcrud->unset_csv();

        $xcrud->default_tab('Sipariş Detayları');
        $siparisler = $xcrud->nested_table('Siparişler','id','siparisler','siparis_detay_id');
        $siparisler->columns('urun_adi, adet, birim_fiyat');
        $siparisler->unset_view(); 
        $siparisler->unset_edit(); 
        $siparisler->unset_add(); 
        $siparisler->unset_csv();
        $siparisler->unset_remove();
        $siparisler->unset_pagination();
        $siparisler->unset_search();


        return view('admin.goster')->with('xcrud',$xcrud);
    }
	
	public function kullanicilar()
    {
        $xcrud = Xcrud::get_instance();
        $xcrud->table('kullanici_bilgileri');
        $xcrud->where('mail_adresi !=','');
		
		$xcrud->label(array(
            'created_at'=>'Üyelik Tarihi'
        ));
		
		$xcrud->change_type('sifre, updated_at, uyelik_durumu, yetki','hidden');

        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_edit();
        $xcrud->unset_view();
        $xcrud->hide_button('save_edit');
          
        return view('admin.goster')->with('xcrud', $xcrud);
    }
}
