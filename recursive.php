<?php
/**
 * 【递归】
 * 自己调用自己
 * 不断的缩小范围，靠近基线条件
 * 基线条件，即停止条件，应该非常简单才行
 *
 *
 * 由简入繁
 * 从0或者1开始，找出其中的规律，从最简单的情况入手，从第一元素入手
 * 程序中，有call stack
 */


/**
 * 计算 f(5)=5*4*3*2*1 
 */
function fn($n) {
	//debug_print_backtrace();
	if($n == 1) {
		return 1;
	}
	return  $n*fn($n-1);
}

/**
 * 用方块平均分割一块土地。找出最大的方块
 */
function max_squre($long_side,$short_side) {
	if($long_side%$short_side == 0) {
		return $short_side;
	}	

	$dupli = intval($long_side/$short_side);
	$diff = $long_side - $dupli*$short_side;

	return max_squre($short_side,$diff);
}

function main() {
	//echo fn(5);
	echo "平均分割一块土地的最大方块==". max_squre(1680,640);
}

main();
