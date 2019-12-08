<?php

/**
 * 选择排序,一个一个进行比较
 * O(n*n)
 */
function select_sort_find_min($input_arr) {
	$min_index = null;
	$min = null;
	foreach($input_arr as $index=>$val) {
		if(!isset($min_index) ) {
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
 */
function select_sort_main() {
	$arr = [5,3,8,10,4,7,9,88,34,23,99,2];
	$len = count($arr);
	$sorted_arr = [];
	for($i=0;$i<$len;$i++) {
		$min = select_sort_find_min($arr);	
		$sorted_arr[] = $min['val']; 
		unset($arr[$min['index']]);
	}
	print_r($sorted_arr);
}

main();

