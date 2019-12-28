<?php

/**
 * 贪婪算法
 * 能装下最贵的那个
 * 结束的最早那个
 * 即每次的选择都是最贪婪的那个
 */


/**
 * 贪婪算法-教室角度问题
 * 关键点：下一堂课要想上，必须等第一堂课结束。结束时间成为了关键
 * 所以每次都找结束最早的那堂课 
 * 下堂课的开始时间必须在堂课的结束时间之后的
 */
function greedy_class() {
    //所有的课程
    $all_course = [
        ['name' => '美术课', 'start_time' => 9, 'end_time' => 10],
        ['name' => '英语', 'start_time' => 9.5, 'end_time' => 10.5],
        ['name' => '数学', 'start_time' => 10, 'end_time' => 11],
        ['name' => '计算机', 'start_time' => 10.5, 'end_time' => 11.5],
        ['name' => '音乐', 'start_time' => 11, 'end_time' => 12],
        ['name' => '体育', 'start_time' => 12, 'end_time' => 13],
        ['name' => '自然', 'start_time' => 12, 'end_time' => 12.5],
        ['name' => '品德', 'start_time' => 12, 'end_time' => 12.2],
    ];
    $result = [];
    $pre_end_time = 0;//default 0
    do {
        $next = next_course($all_course,$pre_end_time);
        if(empty($next)) {
            break;
        }
        $next_val = $next["val"];
        $next_key = $next["key"];
        array_push($result,$next_val); 
        $pre_end_time = $next_val["end_time"];
        unset($all_course[$next_key]);
    } while(!empty($next));

    print_r($result);
}

/**
 * 找到接下来应该上的课程 
 * @param all_course  全部课程
 * @param pre_end_time 上一堂课的结束时间
 * @return array
 */
function next_course($all_course, $pre_end_time) {
    if (empty($all_course)) {
        return array();
    }
    $key = null;
    $next = null;
    foreach ($all_course as $index => $course) {
        //这里不能上来就拿第一个赋值，因为这个极可能是不符合上课条件的，更不要说是最早结束的
        //因为这里面有两个条件进行判断

        //开始时间需要在上一堂课的结束时间之后 
        if($course["start_time"] < $pre_end_time) {
            continue;//不符合
        }
        //符合，但不一定是最优的那个

        //最早结束的课程,这里找最优的那个
        if (is_null($next) || $course["end_time"] < $next["end_time"]) {
            //已知的比无知(null)的好
            //再从已知中比较，找到更好的
            $key = $index;
            $next = $course;
        }
    }

    if(is_null($next)) {//没有符合条件的了
        return array();
    }
    $result = [
        'key'=>$key,
        'val'=>$next,
    ];
    return $result;
}

greedy_class();
