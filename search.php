<?php
require 'select_sort.php';

function binary_search_main() {
	$sorted_arr = select_sort_main();
	print_r($sorted_arr);

	$search_val = 8;
	
	$cnt = count($sorted_arr);
	$low_index = 0;
	$heigh_index = $cnt-1;
	$mid_index = ceil($cnt/2);
		
} 

function binary_search($arr,$search_val,$low_index,$heigh_index) {
	$mid_index = ceil(($low_index+$heigh_index)/2);

	if($arr[$mid_index] == $search_val) {
		return $mid_index;
	}

	if($arr[$mid_index] < $search_val) {
		//右侧区域
		$low_index = $mid_index;
	} else {
		//左侧区域
		$heigh_index = $mid_index;
	}

} 


binary_search();
