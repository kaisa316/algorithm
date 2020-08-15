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
    // $sorted_arr2 = select_sort2($arr);
    // print_r($sorted_arr2);
    $quick_sort = quick_sort($arr);
    print_r($quick_sort);
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

function quick_sort($arr) {
    //分而治之。一个能做；两个能做；三个变成两个；四个变成三个
    //递归
    //left array+基准+right array
    $len = count($arr);
    if($len < 2) {
        return $arr;//递归的终止条件
    }

    //基准值,中分
    $middle = ceil($len/2); 
    $left_arr = [];
    $right_arr = [];
    foreach($arr as $key=>$val) {
        if($key == $middle) {
            //排除基准值本身
            continue;
        }
        if($val < $arr[$middle]) {
            $left_arr[] = $val;
        } else {
            $right_arr[] = $val;
        }
    }

    $left = quick_sort($left_arr);
    $right = quick_sort($right_arr);
    
    return array_merge($left,[$arr[$middle]],$right);

}