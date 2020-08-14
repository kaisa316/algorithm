<?php
/**
 * 冒泡排序:
 * 相邻的两个元素进行比较，然后进行交换
 * https://www.runoob.com/w3cnote/bubble-sort.html
 */

 /**
  * 自己想的一种冒泡排序
  *
  * @return void
  */
 function bubble_sort() {
     $arr = [1,5,8,9,6];
     $sorted_arr = []; 
     $len = count($arr);
     for($i=0;$i<$len;$i++) {
        $arr = arr_sort($arr);
        $max_val = array_pop($arr);
        $sorted_arr[] = $max_val;
     }

     print_r($sorted_arr);
 }


 /**
  *
  * @param [type] $arr
  * @return array
  */
function arr_sort($arr) {
    if(empty($arr)) {
        return $arr;
    }
    //i ,i+1 ;为了防止最后一个元素越界,需要做特殊处理
    $last_index = count($arr)-1;
    foreach($arr as $index=>$val) {
        if($index == $last_index) {
            break;
        }
        $next = $index+1;
        if($val > $arr[$next]) {
            $temp = $arr[$next];
            $arr[$next] = $val;//大数放后面
            $arr[$index] = $temp;//swap value
        }
    }

    return $arr;
}

/**
 * 网络上常见的写法
 *
 * @return void
 */
function bubble_sort_net() {
    $arr = [1,5,8,9,6,11,19];
    $len = count($arr);
    for($i=0; $i<$len; $i++) {//一共N个元素
        for($current=0; $current<$len-$i; $current++) {//每一次能将最大数的数放在最后，下次再比较就不需要这个了。剩余的再比较
            $next = $current+1;
            if($next == $len) {
                break;//void overflow
            }
            if($arr[$current] > $arr[$next]) {//交换,将大数放在最后
                $temp = $arr[$next];
                $arr[$next] = $arr[$current];
                $arr[$current] = $temp;
            }
        }
    }
    //1.相邻的两个数比较，大的放在后面。这样一轮下来，最大的那个就放在最后面的
    //2.下一轮去掉这个最大的；将其余的再进行第一的比较;这一步通过 $current<$len-$i 控制
    //3.因为是当前的元素和下一个元素比较，所以要有边界控制，防止溢出

    print_r($arr);
}

// bubble_sort();
bubble_sort_net();
