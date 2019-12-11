<?php
require 'select_sort.php';

function binary_search() {
	$sorted_arr = select_sort_main();
	print_r($sorted_arr);

	$search_val = 8;
	
	do {
		$cnt = count($sorted_arr);
		$mid_index = ceil($cnt/2);
		$low_index = 0;
		$heigh_index = $cnt-1;
	} while() 
		
} 


binary_search();
