<?php
require 'select_sort.php';

function binary_search_main() {
	$arr = [2,10,13,5,8];//无序数组
	$search_val = 13;
	$sorted_arr = select_sort_main($arr);//排序
	$result = binary_search($sorted_arr,$search_val);//二分查找
	if($result == -1) {
		echo '未找到';
	} else {
		echo '找到了'.$result;
	}
} 

//二分查找
//边界值貌似有问题，比如[2,5] 猜测2的时候
function binary_search($arr,$search_val) {
	if(empty($arr)) {
		return -1;
	}
	$cnt = count($arr);
	$min_index = 0;
	$max_index = $cnt-1;
	do {
		$mid_index = ceil(($min_index+$max_index)/2);//向上取整5.5变成6 。向上取整，向下取整不影响最终结果
		$mid_val = $arr[$mid_index];

		if($mid_val == $search_val) {
			return $mid_index;
		}

		if($min_index == $max_index) {
			return -1;//未找到
		}

		if($mid_val < $search_val) {
			//小了，右侧区域
			$min_index = $mid_index+1;
		} else {
			//大了，左侧区域
			$max_index = $mid_index-1;
		}

	} while($min_index <= $max_index);
	
} 


binary_search_main();
