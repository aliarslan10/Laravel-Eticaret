<?php

    

    function telefonozellestirme($value, $fieldname, $priimary_key, $list, $xcrud)
    {
        
        $nesne = '
            <select name="" id="" class="pull-left form-control"  style="max-width: 80px;" >
                <option value="">+1</option>
                <option value="">+90</option>
            </select>
            <div class="pull-left">
            &nbsp;&nbsp;
            
            </div>
            <input type="text" name="'.$xcrud->fieldname_encode($fieldname).'" value="'.$value.'" class="xcrud-input form-control pull-left" data-mask= "(000) 000 00 00" style="max-width: 150px;" data-mask-selectonfocus="true"/>            
            

            <div class="clearfix"></div>
            <br />
            yada

            <!--@Mask Kullanımı-->
            <script type="text/javascript" src="global/js/qunit-1.11.0.js"></script>
            <script type="text/javascript" src="global/js/sinon-1.10.3.js"></script>
            <script type="text/javascript" src="global/js/sinon-qunit-1.0.0.js"></script>
            <script type="text/javascript" src="global/js/jquery.mask.js"></script>
            <script type="text/javascript" src="global/js/jquery.mask.test.js"></script>
            <!--@Mask Kullanımı #bitti-->';
        
        return $nesne;
    }
    
    
    
    function sifre($value, $fieldname, $priimary_key, $list, $xcrud)
    {
         $nesne = '
            <input type="password" name="'.$xcrud->fieldname_encode($fieldname).'" value="'.$value.'" class="xcrud-input form-control pull-left" style="max-width: 245px;"/>
            ';
         
         return $nesne;
    }
            
            
            
            