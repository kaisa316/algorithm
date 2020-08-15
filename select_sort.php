<?php

main();

function main() {
    $arr = [100,6,29,34,2,9,35,8];
    $sorted_arr = select_sort_main($arr);
    print_r($sorted_arr);
    echo '------'.PHP_EOL;
    $sorted_arr2 = select_sort2($arr);
    print_r($sorted_arr2);
}

/**
 * 选择排序
 */
function select_sort_find_min($input_arr) {
	$min_index = null;
	$min = null;
	foreach($input_arr as $index=>$val) {
		if(is_null($min_index) ) {
			$min_index = $index;
			$min = $val;
		}
		if($val < $min) {
			$min = $val;
			$min_index = $index;
		}
	}

	return [
		"index"=>$min_index,
		"val"=>$min,
	];
}

/**
 * 选择排序 主方法
 * @param 需要排序的无序数组
 * @return 有序数组,从小到大
 */
function select_sort_main($arr) {
	//$arr = [5,3,8,10,4,7,9,88,34,23,99,2];
	$len = count($arr);
	$sorted_arr = [];
	for($i=0;$i<$len;$i++) {
		$min = select_sort_find_min($arr);	
		//1. 一遍遍历能够找出其中的最小值
		//2.将最小值放到新数组
		//3、原数组的最小值去除，不再参与新一轮的排序。
		$sorted_arr[] = $min['val']; 
		unset($arr[$min['index']]);
		//unset 之后arr数组会被改变,reference
	}

	return $sorted_arr;
}

//第二版为每次将最小的都放在最后一个
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