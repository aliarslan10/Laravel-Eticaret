$(function() {

     var veri = "";
     var onceki = "";
     var sayac = 1;

    $(".addtocartbutton").click(function() {
        var productcode = $(this).attr("productcode");
        var productname = $(this).attr("productname");


        $(".sepetBildirimi").delay(10000).show(100);
        $(".sepetBildirimi").delay(10000).hide(100);

        $.post("public/eticaret/sepeteekle", {
             '_token': $('meta[name=csrf-token]').attr('content'),
            "urun_id": productcode,
            "urun_adi": productname },

            function(data)
            {
                $("#cartcount").html(data); // O anlık güncel session item sayılarını gösteriyor.
        });


        var sepetKontrol = $(this).attr("bildirimsepeti");
        if (sepetKontrol != "") {
            $(".sepetBildirimi").css({"display":"inline-block"});
        }


        if(productcode == onceki){
            sayac++;
           veri = "<li><b>" + productname + "</b> adlı üründen " + sayac + " adet daha sepete eklendi.</li>";
        }else{
            veri = "<li><b>" + productname + "</b> adlı ürün sepete eklendi.</li>";
            onceki = productcode;
            sayac = 0;
        }
    

        $("#bildirimsepeti").html(veri);

        $(".sepetBildirimi").delay(10000).hide(1000);
    });

    $(".close").click(function(){
        $(".sepetBildirimi").css({"display":"none"});
        //$(".sepetBildirimi").hide(1000);
    });


    //////////////////////////////////////// SEPET GÜNCELLEME ////////////////////////////////////////

    $('.sepetcart').on('input', function() {

        var fiyatDizisi = [];
        var adetDizisi = [];
        var herbirUrunTotali = [];
        var brandids = [];
        var total = 0;

        $(".brandidentity").each(function(index) {

            var brandidentity = $(this).val();
            brandids.push(brandidentity);

        });
       
        $(".birimfiyat").each(function(index) {

            var valuebirimfiyat = parseFloat($(this).val());
            fiyatDizisi.push(valuebirimfiyat);

        });

        $(".adet").each(function(index) {

            var adet = $(this).val();
            if (parseInt(adet)>=0) {
                adetDizisi.push(adet);
            }else{
                adetDizisi.push(0);
            }

        });
        
        
        for (var i=0; i<fiyatDizisi.length; i++) {

            herbirUrunTotali.push(parseFloat(fiyatDizisi[i]) * parseFloat(adetDizisi[i]));
            
            total = total + (parseFloat(fiyatDizisi[i]) * parseFloat(adetDizisi[i]));
        }

        $(".adetyazdir").each(function(index) {

            $(this).html(String(adetDizisi[index]));

        });

        $(".toplamBirimFiyatYazdir").each(function(index) {

            $(this).html(String(herbirUrunTotali[index].toFixed(2)));

        });

        $("#total").html(String(total.toFixed(2)));


        var token = $('meta[name=csrf-token]').attr('content');

        $.ajax({
            url: "/eticaret/guncelle",
            type: "post",
            data : {  'adetArray': adetDizisi,
                      'idArray': brandids,
                      'fiyatArray': fiyatDizisi,
                      '_token': token // your token csrf_token()
            },

            success: function(data){ 
                $("#cartcount").html(data);
                //alert("Sepet başarıyla güncellendi. " + data + " ürün");
            },

            error: function(data){ 
                alert("hata"); 
            }

        });



    }); // textbox'a göre değişme olayı.

}); // hepsini kapsar.

