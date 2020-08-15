<?php
/**
 * 算法复习
 * 2020年8月15日
 */

main();

function main() {
    $arr = [100,6,29,34,2,9,35,8];
    $sorted_arr = select_sort($arr);
    print_r($sorted_arr);
    echo '------'.PHP_EOL;
    $sorted_arr2 = select_sort2($arr);
    print_r($sorted_arr2);
}

function select_sort($arr) {
    //找到最大/小值
    //剔除它，并重复第一步
    $sorted_arr = [];
    $len = count($arr);
    for($i = 0; $i < $len; $i++) {
        $min = select_sort_find_min($arr);
        $sorted_arr[] = $min['val'] ;
        unset($arr[$min['key']]);
    }
    
    return $sorted_arr;
}

function select_sort_find_min($arr) {
    $min_key = null;
    $min_val = null;
    foreach($arr as $key => $val) {
        if(is_null($min_key)) {
            $min_key = $key;
            $min_val = $val;
        }

        if($val < $min_val) {
            $min_key = $key;
            $min_val = $val;
        }
    }
    $min = [
        'key'=>$min_key,
        'val'=>$min_val,
    ];
    return $min; 
}

//第二版为每次都放在最后一个
function select_sort_find_min2($arr) {
    $min_key = null;
    $min_val = null;
    foreach($arr as $key => $val) {
        if(is_null($min_key)) {
            $min_key = $key;
            $min_val = $val;
        }

        if($val < $min_val) {
            $min_key = $key;
            $min_val = $val;
        }
    }

    $last_key = count($arr)-1;
    $temp = $arr[$last_key];
    $arr[$last_key] = $min_val;
    $arr[$min_key] = $temp;
    return $arr; 
}
function select_sort2($arr) {
    //找到最大/小值
    //剔除它，并重复第一步
    $sorted_arr = [];
    $len = count($arr);
    for($i = 0; $i < $len; $i++) {
        $arr = select_sort_find_min2($arr);
        $sorted_arr[] = array_pop($arr);
    }
    
    return $sorted_arr;
}