<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\SabitSayfalar; //ana menü
use App\SabitSayfaKategori; //ana menü
use App\SiteAyarlari;
use App\ChatOdalari;
use App\BlogIcerik;
use App\TopluMailSablonu;
use App\UrunOzellikleri;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Actually, You will take all content from database. After that, you will make your array what options you want.

        $ayar = SiteAyarlari::findorfail(1);
        $menu = SabitSayfalar::where('durum','=','1')->get();
        // $menu = SabitSayfalar::where('durum','=','1')->whereNull('ust_sayfa')->where('kategori_id','=','3')->get();

        $tumurunler = SabitSayfalar::where('durum','=','1')->where('kategori_id','=','3')->whereNotNull('ust_sayfa')->orderby('sabit_sayfalar.id','desc')
                                                           ->join('urun_ozellikleri', 'urun_ozellikleri.urun_id','=','sabit_sayfalar.id')->get();
    
       // $firsaturunleri = UrunOzellikleri::where('aktiflik','=','1')->where('firsat_urunu','=','1')->join('sabit_sayfalar', 'sabit_sayfalar.id','=','urun_ozellikleri.urun_id')->get();

        //$kategori = SabitSayfaKategori::where('durum','=','1')->orderBy('sira')->get();
        //$blogSlider = BlogIcerik::where('durum','=','1')->orderBy('id','desc')->take(2)->get();
        //$haberler = BlogIcerik::where('kategori_id','=','2')->where('durum','=','1')->orderBy('id','desc')->take(2)->get();
       
        //$duyurular = BlogIcerik::where('kategori_id','=','2')->where('durum','=','1')->orderBy('id','desc')->take(1)->get();
       

       // $vitrin = Vitrin::where('durum','=','1')->orderby('id')->get();
		//$mailSablonu = TopluMailSablonu::all();

        //view()->share('blogs', $blogSlider);
        //view()->share('haberler', $haberler);
        view()->share('ayarlar', $ayar);
        view()->share('menuler', $menu); //dd($menu);
        view()->share('tumurunler', $tumurunler);
       // view()->share('firsaturunleri', $firsaturunleri);
        //view()->share('kategoriler', $kategori);
       // view()->share('vitrinler', $vitrin);
        //view()->share('mailSablonu', $mailSablonu);
		//view()->share('desktop',"<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>");
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
