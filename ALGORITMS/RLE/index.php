<?php 
function rle($str){
    if(is_null($str)){
        return '';
    }

    if(empty($str)){
        return '';
    }

    if(strlen($str) == 1){
        return $str;
    }

    $arrs = str_split($str);//array
    
    $i = 0;
    $respons = '';
    foreach($arrs as $item){
        $arResp = str_split($respons);
        if(end($arResp) != $item){
            if($i >= 2){
                $respons .= $i; 
            }

            $i = 0;
            $respons .= $item;
        }

        $i++;
    }

    return $respons;

   // ААВBBCCCCCC => A2B6C

}

// ААВBBCCCCCC => A2B6C
echo rle('aarrrrrrrrrrrrrrrrrrrrrrrrrrttttttttttttttttttttggggggggggggggggggggzzzzzzzzzzzzzzzzzzzzzuuuuuuuuuuuuuuuuuuuuuuuoutrrrrrrrrrrrrrrrrrrrffddssaxxcfrdddddddddddddddddddddddyuuuuuuuuuuuuuuuuuuhbvcxsdfghyttttttttttttttttttttabbbdddrrrseeeetttrtttqqr');
?>