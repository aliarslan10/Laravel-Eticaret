<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\KullaniciBilgileri;
use App\BlogIcerik;
use App\BlogMenu;
use Redirect;
use Session;
use xcrud;

include('xcrud/xcrud/xcrud.php'); //public klasöründe

class BlogController extends Controller
{
    public function blog($yil=null, $ay=null, $icerik=null)
    {
        if($yil!=null && $ay!=null && $icerik!=null)
        {
            $bloglink = $yil.'/'.$ay.'/'.$icerik;
        }
        
        else
        {
            $bloglink = null;
        }
        
        if($bloglink == null) //blog arayüz için
        {
            $blogSonIcerikler = BlogIcerik::where('durum','=','1')->orderBy('id', 'desc')->paginate(5);
            $blogSonIceriklerMenu = BlogIcerik::where('durum','=','1')->orderBy('id', 'desc')->take(10)->get();
            $blogKategoriler = BlogMenu::where('durum','=','1')->get();

            return view('blog.blog_arayuz')->with('blogSonIcerikler', $blogSonIcerikler)
                                           ->with('blogSonIceriklerMenu',$blogSonIceriklerMenu)
                                           ->with('baslik','Tüm Haberler')
                                           ->with('blogKategoriler',$blogKategoriler);
        }
        
        else // içerikler için
        {
            $blogicerik = BlogIcerik::where('durum','=','1')->where('sayfa_linki',$bloglink)->orderby('id')->get();
            $blogmenu = BlogMenu::where('durum','=','1')->orderby('id')->get();
            $blogSonIceriklerMenu = BlogIcerik::where('durum','=','1')->orderBy('id', 'desc')->take(20)->get();

           // dd($blogicerik);
            
            return view('blog.blog_icerik')->with('blogicerikleri', $blogicerik)
                                      ->with('blogmenuleri', $blogmenu)
                                      ->with('blogSonIceriklerMenu', $blogSonIceriklerMenu)
                                      ->with('bloglink',$bloglink);
        }
    }

    public function blogKategoriGosterimi($kategori_adi=null)
    {
        $blogKategoriler = BlogMenu::where('durum','=','1')->where('kategori_link',$kategori_adi)->get();

        if(!isset($blogKategoriler['0']))
        {
            return view('errors.404');

        } else {

            $blogSonIceriklerMenu = BlogIcerik::where('durum','=','1')->orderBy('id', 'desc')->take(10)->get();
            $blogKategoriler = BlogMenu::where('durum','=','1')->get();
        
            // Başlık Göster
            foreach ($blogKategoriler as $kategori) {
                if ($kategori_adi == $kategori->kategori_link) {
                    $baslik = $kategori->menu_adi;
                    $blogSonIcerikler = BlogIcerik::where('kategori_id',$kategori->id)->where('durum','=','1')->orderBy('id', 'desc')->paginate(5);


                   return view('blog.blog_kategori_arayuz')->with('blogSonIcerikler', $blogSonIcerikler)
                                                      ->with('blogSonIceriklerMenu',$blogSonIceriklerMenu)
                                                      ->with('bloglink',$kategori_adi)
                                                      ->with('baslik',$baslik)
                                                      ->with('blogKategoriler',$blogKategoriler);
                }
            }
        }
    }
}