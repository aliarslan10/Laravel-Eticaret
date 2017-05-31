<?php


    function siparis_durum($value, $fieldname, $primary_key, $row, $xcrud)
    {
        $array = array('Onay Bekleniyor','Onaylandı','Kargoya Verildi','İptal Edildi','Teslim Edildi','Tedarik Sürecinde','Ödeme Bekleniyor','Hazırlanılıyor','İade Edildi');
        
        $a = '<select name="" class="sdurum form-control"  id='.$primary_key.'>';
        foreach($array as $ar){
            $a .= '<option value="'.$ar.'"';
            
            // seçimi yaptırma
            if($ar == $value){ $a .=" selected"; }
            
            $a .='>'.$ar.'</option>';
        }
        $a .= '</select>';
        return $a;
    }
    