<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SabitSayfalar;
use App\SabitSayfaKategori;
use xcrud;
use App\BlogIcerik;
use App\Resimler;
use App\IletisimBilgileri;

include('xcrud/xcrud/xcrud.php'); //public klasöründe

class SabitSayfalarController extends Controller
{
	public function goruntule($id=null)
	{
        $kategori_kontrol = SabitSayfaKategori::where('link',$id)->get();
        $kurumsal = SabitSayfalar::where('kategori_id','=','2')->where('durum','=','1')->get();

        $sayfaicerik = SabitSayfalar::where('durum','=','1')->where('sayfa_linki',$id)->orderby('id')->get();
		return view('kurumsal.kurumsal_icerik')->with('getLink', $id)
									  ->with('sayfaicerik',$sayfaicerik)
									  ->with('kurumsal',$kurumsal);
	}

	public function hizmetler($hizmet_adi=null)
    {	
    	$hizmet = SabitSayfalar::where('kategori_id','=','3')->where('durum','=','1')->paginate(9);
    	
    	if($hizmet_adi==null){
    		return view('hizmetler.hizmetler_arayuz')->with('hizmetler',$hizmet);
    	}else{

	    	$link = 'hizmetlerimiz/'.$hizmet_adi;
			$sayfaicerik = SabitSayfalar::where('durum','=','1')->where('sayfa_linki',$link)->orderby('id')->get();

	    	return view('hizmetler.hizmet_icerik')->with('getLink',$link)
									  			  ->with('sayfaicerik',$sayfaicerik)
	    										  ->with('hizmetler',$hizmet);
	    }
    }


    # DENENEBİLİR : $_SERVER['REQUEST_URI']
	public function urunler($link1=null, $link2=null, $link3=null) # Max.:3 alt ürüne kadar eklenebilir.
    {
		$firsat = "";
    	$urunler_menu = SabitSayfalar::select('sayfa_adi','sayfa_linki')->where('kategori_id','=','3')->where('durum','=','1')->where('ust_sayfa',null)->get();
		
		if($link1 == "firsat-urunleri"){
			
			$firsat = "var";
			$urunler = SabitSayfalar::where('durum','=','1')->where('kategori_id','=','3')->whereNotNull('ust_sayfa')->orderby('sabit_sayfalar.id','desc')
                                                           ->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')->get();
			return view('urunler.eticaret_arayuzV1')->with('urunler_menu',$urunler_menu)
												  ->with('urunler',$urunler)
    											  ->with('sayfalama','')
												  ->with('firsat',$firsat);
		
		}else{
			
			if($link1==null && $link2==null && $link3==null){

    		// $urunler = SabitSayfalar::where('kategori_id','=','3')->where('durum','=','1')->where('ust_sayfa',null)->paginate(9); # Kategorileri getiriyor.
    		$urunler = SabitSayfalar::where('kategori_id','=','3')->where('durum','=','1')->whereNotNull('ust_sayfa')->whereNotNull('ust_sayfa_iki')
    															  ->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')->where('urun_ozellikleri.aktiflik','=','1')->paginate(24);
    		
    		return view('urunler.eticaret_arayuzV1')->with('urunler',$urunler)
    											  ->with('sayfalama','olsun')
    											  ->with('firsat',$firsat)
	    									  	  ->with('urunler_menu',$urunler_menu);
    	
    	}

    	else if($link1!=null && $link2==null && $link3==null){

	    	$link = 'urunlerimiz/'.$link1; # >> $_SERVER['REQUEST_URI']
			$sayfaicerik = SabitSayfalar::where('durum','=','1')->where('sayfa_linki',$link)->orderby('sabit_sayfalar.id')->get(); # Kahvaltılık bir ürün değil, kategori. JOIN yapılamaz.
			
			if(isset($sayfaicerik[0])){
				
				$gorseller = Resimler::where('aktiflik','=','1')->where('r_kategori_id',$sayfaicerik[0]['urun_id'])->get();
				
				// bu sadece alt sayfaları var mı yok mu, varsa listeleme işine yarıyor.
				$altsayfa = SabitSayfalar::where('durum','=','1')->where('ust_sayfa',$sayfaicerik[0]['id'])->whereNull('ust_sayfa_iki')
							->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')
							->where('urun_ozellikleri.aktiflik','=','1')->get();
				
				if(isset($altsayfa[0])){ #alt sayfa varsa göster abi.
					return view('urunler.eticaret_arayuzV1')->with('urunler',$altsayfa)
														  ->with('sayfalama','olmasin')
														  ->with('urunler_menu',$urunler_menu)
													  ->with('firsat',$firsat)
														  ->with('sayfaicerik',$sayfaicerik);
				}else{
					
				return view('urunler.eticaret_icerik')->with('getLink',$link)
													->with('sayfaicerik',$sayfaicerik)
													->with('gorseller',$gorseller)
													->with('urunler_menu',$urunler_menu)
													->with('firsat',$firsat)
													->with('sayfaicerik',$sayfaicerik);
				}
				
			}else{
				return view('errors.404');
			}
    	}

    	else if($link1!=null && $link2!=null && $link3==null){ ## Sayfa içeriği
			
			//dd(\Request::path());
			$link = explode('/',\Request::path());
			$link = explode('-',$link[count($link)-1]);
			$link = preg_replace("/[^0-9]+/", "", $link[count($link)-1]);
				
			$sayfaicerik = SabitSayfalar::where('durum','=','1')->where('sabit_sayfalar.id','=',$link)->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')->where('urun_ozellikleri.aktiflik','=','1')->get();
			
			//dd($sayfaicerik);
			
			if(isset($sayfaicerik[0])){
				
				if(\Request::path() == $sayfaicerik[0]['sayfa_linki']){
					
					$gorseller = Resimler::where('aktiflik','=','1')->where('r_kategori_id',$sayfaicerik[0]['urun_id'])->get();

					// bu sadece alt sayfaları var mı yok mu, varsa listeleme işine yarıyor.
					$altsayfa = SabitSayfalar::where('durum','=','1')->where('ust_sayfa',$sayfaicerik[0]['urun_id'])->whereNull('ust_sayfa_iki')
								->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')
								->where('urun_ozellikleri.aktiflik','=','1')->get();
					
					if(!isset($altsayfa[0])){ #ana kategoriye tıklanmadıysa, alt kategorinin içindekileri getir.
						$altsayfa = SabitSayfalar::where('durum','=','1')->where('ust_sayfa_iki',$sayfaicerik[0]['urun_id'])
									->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')
									->where('urun_ozellikleri.aktiflik','=','1')->get();
					}
					
					if(isset($altsayfa[0])){ #alt sayfa varsa göster abi.
						return view('urunler.eticaret_arayuzV1')->with('urunler',$altsayfa)
															  ->with('sayfalama','olmasin')
															  ->with('sayfaicerik',$sayfaicerik)
															  ->with('gorseller',$gorseller)
															  ->with('firsat',$firsat)
															  ->with('urunler_menu',$urunler_menu);
					}else{  #içerik.
					
					return view('urunler.eticaret_icerik')->with('sayfaicerik',$sayfaicerik)
														  ->with('gorseller',$gorseller)
														  ->with('firsat',$firsat)
														  ->with('urunler_menu',$urunler_menu);
					}
					
				}else{
					return redirect($sayfaicerik[0]['sayfa_linki']);
				}
			}
			else{ ## ID Falan Yoksa, gelen link uzantısı ne tür karakterler içeriyorsa ona göre bir link getir.
				
				$link = explode('/',\Request::path());
				$link = explode('-',$link[count($link)-1]);
				
				$sayfaicerik = SabitSayfalar::where('durum','=','1')
				->where('sayfa_linki','LIKE','%'.$link[rand(0,count($link)-2)].'%')
				->where('sayfa_linki','LIKE','%'.$link[rand(0,count($link)-2)].'%')
				->where('sayfa_linki','LIKE','%'.$link[rand(0,count($link)-2)].'%')
				->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')->where('urun_ozellikleri.aktiflik','=','1')->get();
				
				//dd($sayfaicerik);
				
				return redirect($sayfaicerik[0]['sayfa_linki']);
				
				return view('errors.404');
			}
			
    	}else{

	    	$link = 'urunlerimiz/'.$link1.'/'.$link2.'/'.$link3;
			$sayfaicerik = SabitSayfalar::where('durum','=','1')->where('sayfa_linki',$link)->orderby('sabit_sayfalar.id')
																->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')->where('urun_ozellikleri.aktiflik','=','1')->get();

			$gorseller = Resimler::where('aktiflik','=','1')->where('r_kategori_id',$sayfaicerik[0]['id'])->get();

	    	return view('urunler.eticaret_icerik')->with('getLink',$link)
    											  ->with('firsat',$firsat)
												  ->with('sayfaicerik',$sayfaicerik);
			}			
			
		}
    }


    public function galeri($galeri_adi=null)
    {
 		$belge = SabitSayfalar::where('kategori_id','=','5')->where('durum','=','1')->get();
    	$resim = Resimler::paginate(12);
    	
    	if($galeri_adi==null){
    		return view('galeri.galeri_arayuz1')->with('galeri',$belge)
		    							 ->with('resimler',$resim);
    	}else{
		    $link = 'galeri/'.$galeri_adi;
			$sayfaicerik = SabitSayfalar::where('durum','=','1')->where('sayfa_linki',$link)->orderby('id')->get();
    		
		    return view('galeri.galeri_icerik')->with('getLink',$link)
		    							->with('sayfaicerik',$sayfaicerik)
		    							->with('resimler',$resim)
		    							->with('galeri',$belge);
	    }
    }

    public function insanKaynaklari($ik_adi=null)
    {
    	$ik = SabitSayfalar::where('kategori_id','=','6')->where('durum','=','1')->paginate(9);

    	if($ik_adi == ''){
    		$link = 'insan-kaynaklari';
    	}else{
    		$link = 'insan-kaynaklari/'.$ik_adi;
    	}

		$sayfaicerik = SabitSayfalar::where('durum','=','1')->where('sayfa_linki',$link)->get();

    	return view('ik.ik_icerik')->with('getLink',$link)
										  ->with('sayfaicerik',$sayfaicerik)
    									  ->with('ik',$ik);
    }
	
	public function goruntule_desktop($id=null, $desktop=null)
	{
		$menu_kontrol = SabitSayfalar::where('sayfa_linki',$id)->get();
        $kategori_kontrol = SabitSayfaKategori::where('link',$id)->get();

        if(sizeof($menu_kontrol) == 0 && sizeof($kategori_kontrol) == 0)
		{
			return view('errors.404'); //Sayfa yoksa anasayfaya git.
		}

		else
		{
			$desktop = "";
			//AppServiceProvider'dan geliyor diğer bilgiler.
			return view('sabit_sayfa_icerik')->with('getLink', $id)
									  		 ->with('sayfaicerik',$sayfaicerik)
											 ->with('desktop', $desktop);
		}
	}
	

	public function arsiv()
	{	
		$blogSonIceriklerMenu = BlogIcerik::where('durum','=','1')->orderBy('id', 'desc')->take(20)->get();
		return view("arsiv")->with('arsiv', null)
							->with('blogSonIceriklerMenu',$blogSonIceriklerMenu)
							->with('arsivDurum', null);
	}

		
	public function arsivGoruntule(Request $req)
	{
		$range = $req->only("baslangic","bitis");
		$blogSonIceriklerMenu = BlogIcerik::where('durum','=','1')->orderBy('id', 'desc')->take(20)->get();
		
		if($range["baslangic"] <= $range["bitis"] && $range["baslangic"] != null && $range["bitis"] !=null)
		{
			$arsiv = BlogIcerik::where("durum","1")->where("kategori_id","1")->where("tarih",">=",$range["baslangic"])->where("tarih","<=",$range["bitis"])->get();
		
		
			return view("arsiv")->with('arsiv',$arsiv)
								->with('blogSonIceriklerMenu',$blogSonIceriklerMenu)
								->with('arsivDurum',"goster");
		}
		
		else
		{
			return view("arsiv")->with("arsiv",null)
							    ->with('blogSonIceriklerMenu',$blogSonIceriklerMenu)
								->with('arsivDurum',"hata");
		}
	}

	public function iletisimSayfasi(){

		$bilgiler = IletisimBilgileri::where('durum','1')->get();

        $konum = array();
        foreach ($bilgiler as $key => $value) {
          $koor = explode(',', $value->konum);
          $konum[$key] =  [$value->sube, $koor[0], $koor[1], $key];
        }

        //dd($konum);

        $xcrud = Xcrud::get_instance();
        $xcrud->table('iletisim_formu');
        $xcrud->language('tr_formgenerator');
        $xcrud->theme('scercevesiz');
        
        $xcrud->label(array(
            'if_adi' => 'Ad Soyad',
            'if_eposta' => "E-Posta",
            'if_telefon' => "Telefon",
            'if_mesajiniz' => "Mesajınız",
            'if_konu' => "Konu",
            'if_dosya_adi' => "Dosya"
         ));
        
        $xcrud->unset_list();
        $xcrud->unset_edit();
        $xcrud->unset_remove();
		$xcrud->unset_title();

        $xcrud->change_type('if_kid','hide');
        $xcrud->change_type('if_tarih','hide');
        $xcrud->change_type('if_dosya_adi','hide');
        $xcrud->change_type('if_id','hide');

        $xcrud->no_editor('if_mesajiniz');

        #Zorulu alanlar:
        $xcrud->validation_required('if_adi');
        $xcrud->validation_required('if_eposta');
        $xcrud->validation_required('if_telefon');
        $xcrud->validation_required('if_mesajiniz');
        $xcrud->validation_required('if_konu');

        $xcrud->after_insert('iletisimformukayit');

		return view('iletisim.iletisim_arayuz1')->with('xcrud',$xcrud)
                                                ->with('koordinatlar',$konum)
        									    ->with('bilgiler',$bilgiler);
	}

}
