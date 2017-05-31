<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| Made by Ali ARSLAN. Computer Engineer.
*/

Route::get('/master', function () {
    return view('master');
});

/*Route::get('/teslimat-bilgileri', function () {
    dd("Online ödeme sistemi için banka çalışmalarımız devam etmektedir. Kredi kartı ile online ödeme sistemimiz kısa bir süre içerisinde aktif olacaktır. Anlayışınız için teşekkür ederiz.");
});*/

Route::get('/', 'AnasayfaController@anasayfa');
Route::post('/', 'AnasayfaController@ebulten');
Route::post('/urun-arama', 'AnasayfaController@ara');
Route::get('/urun-arama', function () {
    return redirect('urunlerimiz');
});

Route::get('/404', function () {
    return view('errors.404');
});


############################ ADMİN PANELİ ##############################
Route::group(['prefix' => 'ckadmin'], function () {
	Route::get('/', 'AdminGoruntuleController@Admin');
	Route::get('/giris', 'AdminGoruntuleController@girisSayfasi');
	Route::post('/giris', 'AdminGoruntuleController@Login');
	Route::get('/cikis', 'AdminGoruntuleController@LogOut'); 

	Route::get('/kurumsal-sayfa-yonetimi', 'AdminController@kurumsal');
	Route::get('/galeri', 'AdminController@galeri');
	Route::get('/anasayfa-ayarlari', 'AdminController@anasayfaAyarlari');
	Route::get('/slider-yonetimi', 'AdminController@sliderYonetimi');
	Route::get('/iletisim-bilgileri', 'AdminController@iletisimBilgileri');
	Route::get('/insan-kaynaklari', 'AdminController@insanKaynaklari');

	Route::get('/kullanici-yonetimi', 'AdminController@kullanicilar');
	Route::post('/reset', 'AdminController@sifremiUnuttum');
	Route::get('/sms-gonderim-sistemi', 'AdminController@smsGonderim');
	Route::get('/chat-sistemi', 'AdminController@chatSistemi');

	Route::get('/blog-kategorileri', 'AdminController@blogKategori');
	Route::get('/blog-icerikleri', 'AdminController@blogICerik');
	Route::get('/hizmet-yonetimi', 'AdminController@hizmetler');
	Route::get('/urun-kategori-yonetimi', 'AdminController@urunKategorileri');
	Route::get('/urun-alt-kategori-yonetimi', 'AdminController@urunAltKategorileri');
	Route::get('/urun-yonetimi', 'AdminController@urunler');
	Route::get('/firsat-urunleri', 'AdminController@firsatUrunleri');

	Route::get('/toplu-mail-gonderimi', 'AdminController@topluMailIletisi');
	Route::post('/toplu-mail-gonderimi', 'AdminController@topluMailGonder');
	Route::get('/aa', 'AdminController@topluMailSablonu');
	Route::get('/duyuru-yonetimi', 'AdminController@duyurular');
	Route::get('/menuler', 'AdminController@menuler');
	Route::get('/siparisler', 'AdminController@siparisler');
});
###############################################################################



############################ SABİT SAYFALAR & BLOG İŞLEMLERİ ##################
Route::group(['prefix' => 'arsiv'], function () {
	Route::get('/' ,'SabitSayfalarController@arsiv');
	Route::post('/','SabitSayfalarController@arsivGoruntule');
});

Route::group(['prefix' => 'hizmetlerimiz'], function () {
	Route::get('/{hizmet_adi?}', 'SabitSayfalarController@hizmetler');
});

Route::group(['prefix' => 'urunlerimiz'], function () {
	Route::get('/{link1?}/{link2?}/{link3?}', 'SabitSayfalarController@urunler');
});

Route::group(['prefix' => 'galeri'], function () {
	Route::get('/{id?}', 'SabitSayfalarController@galeri');
});

Route::group(['prefix' => 'insan-kaynaklari'], function () {
	Route::get('/{id?}', 'SabitSayfalarController@insanKaynaklari');
});

Route::group(['prefix' => 'haberler'], function () {
	Route::get('/kategoriler/{kategori_adi}','BlogController@blogKategoriGosterimi');
	Route::get('/{yil?}/{ay?}/{icerik?}','BlogController@blog');
});

Route::group(['prefix' => 'iletisim'], function () {
	Route::get('/','SabitSayfalarController@iletisimSayfasi');
});
###############################################################################



############################ E-TİCARET #######################################
Route::group(['prefix' => 'eticaret'], function () {
	Route::post('/sepeteekle','ETicaretController@sepeteEkle');
	Route::get('/test','ETicaretController@test');
	Route::post('/guncelle', 'ETicaretController@urunSepetGuncelle');
	Route::get('/guncelle', 'ETicaretController@urunSepetGuncelle');
});

Route::get('/sepetim', 'ETicaretController@sepet');
Route::get('/kaldir/{sil}', 'ETicaretController@urunSepetSil');
Route::get('/teslimat-bilgileri', 'ETicaretController@SatinAl');

Route::post('/odeme-ekrani', 'ETicaretController@satinAlmayiTamamla');

Route::get('/siparis-basarili', 'ETicaretController@siparisBasarili');

Route::get('/siparis-basarisiz', function () {
    return view('eticaret.siparis_basarisiz');
});

Route::get('/siparislerim', 'ETicaretController@siparisler');
Route::get('/puanlarim', 'ETicaretController@puanlar');

Route::post('/test', 'ETicaretController@odemeEkrani');
###############################################################################


############################ KULLANICI İŞLEMLERİ ##############################
Route::get('/kayit-ol', 'KullaniciController@xcrudKayitSayfasi');
Route::post('/kayit-ol', 'KullaniciController@kayitOl');
Route::post('/kayit-basarili', 'KullaniciController@kayitBasarili');
Route::get('/kayit-basarili', 'KullaniciController@kayitBasarili');
Route::get('/giris-yap', 'KullaniciController@loginSayfasi');
Route::post('/giris-yap', 'KullaniciController@girisYap');
Route::get('/sifremi-unuttum', 'KullaniciController@sifremiUnuttumSayfasi');
Route::post('/sifremi-unuttum', 'KullaniciController@sifremiUnuttum');
Route::get('/kullanici-paneli', 'KullaniciController@kullaniciPaneli');
Route::get('/bilgilerim', 'KullaniciController@kullaniciBilgileri');
Route::get('/mesaj-at', 'KullaniciController@mesajAt');
Route::get('/cikis', 'KullaniciController@cikis');
###############################################################################


############################ SEPET İŞLEMLERİ ##############################
###############################################################################

# Desktop #
Route::get('/desktop','AnasayfaController@desktop');
Route::get('/{id}', 'SabitSayfalarController@goruntule');