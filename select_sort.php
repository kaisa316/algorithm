<?php

/**
 * 选择排序
 * 找出数组中的最小值
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
 */
function select_sort_main() {
	$arr = [5,3,8,10,4,7,9,88,34,23,99,2];
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

