<?php
/**
 * 快速排序是分而治之思想的一个实际应用。
 * 由简入繁，从最简单的情况做起。
 * 一种处理方法，如果一个的情况能够处理，那就试试俩个是否也行。如果俩个也能那就试试三个是否也可行,三个也行那就试试四个是否。以此类推... 从一个到多个，就是由简入繁，分而治之。把一个复杂问题从简单情况着手。以此类推就代表可以使用递归来实现它。
 * 
 */


/**
 * 快速排序
 * 有小到大顺序
 */
function quick_sort($arr) {
	//边界处理。空或者只有一个元素，直接返回。
	//基准条件: 就是边界处理的情况。
	//三个呢？既然两个可以排序，想办法变成两个的处理情况。办法如下
	//  从中找个基准值，比他小的放在left左边；比他大的放在后边right。三个排序：left array+基准值+right array
	//四个呢？四个也像三个一样。从中找个基准值。左边的比他小；右边的比他大。
	//基准值就从数组的中间找，类似二分
	$cnt = count($arr);
	if($cnt < 2) {
		return $arr;
	}	
	$min_index = 0;
	$max_index = $cnt - 1;	
	$mid_index = ceil(($min_index+$max_index)/2);
	$mid_val = $arr[$mid_index];
	$left_arr = [];
	$right_arr = [];

	foreach($arr as $index=> $val) {
		if($index == $mid_index) {//关键点，没有这行将导致死循环。mid-val不能包含在left_arr或者righ_arr中 
			continue;//自己，跳过
		}
		if($val < $mid_val) {
			$left_arr[] = $val;
		} else  {
			$right_arr[] = $val;
		}
	} 

	//当左右数组各自都有很多元素时,左右的数组怎样再进行递归呢？
	//左边的数组一次递归；右边的数组一次递归？
	//是的，对于这个问题的答案就是对于子数组继续这样的处理，递归。	
	$left_arr = 	quick_sort($left_arr);
	$right_arr = 	quick_sort($right_arr);
	$result = array_merge($left_arr,array($mid_val),$right_arr);
	return $result;
}

function quick_sort_main() {
	$arr = [2,10,13,5,8,45,12,300,23,56,89];
	$sorted_arr = quick_sort($arr);
	print_r($sorted_arr);
}

quick_sort_main();



