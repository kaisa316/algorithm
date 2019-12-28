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
function greedy_classroom() {
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

/**
 * 贪婪算法--集合覆盖问题
 * 希望用最少的电台覆盖最多的州
 * 而电台之间覆盖的州可能会重复
 * 解题思路：每次找覆盖最多[未覆盖州】的电台
 */
function greedy_collection() {
    //电台与城市的映射
    $radio_city_map = [
        'A'=>[
            '北京','上海',
        ],
        'B'=>[
            '深圳','上海','广东',
        ],
        'C'=>[
            '北京','内蒙','河北',
        ],
        'D'=>[
            '河北','山东','山西','陕西','宁夏',
        ],
        'E'=>[
            '深圳','上海'
        ],
    ]; 
    //所有的城市
    $all_citys = [
        '北京','上海','深圳','广东','内蒙','河北','山东','山西','陕西','宁夏',
    ];
    //未覆盖的城市
    $uncover_citys = $all_citys;//初始值都未覆盖
    $result_radio = [];//最终的结果集 
    do {
        $radio = get_radio_station($uncover_citys, $radio_city_map);
        if(empty($radio)) {
            break;
        }
        array_push($result_radio, $radio);
        //更新未覆盖的结果集
        $uncover_citys = array_diff($uncover_citys,$radio_city_map[$radio]);
        //删除已覆盖的电台
        unset($radio_city_map[$radio]);
    } while(!empty($radio));

    print_r($result_radio);
}

/**
 * 获取覆盖最多【未覆盖的州】的电台
 * @param uncover_citys 未覆盖的城市
 * @param radio_city_map 电台与城市的映射
 * @return radio key
 */
function get_radio_station($uncover_citys,$radio_city_map) {
    $radio_key = null;
    $max_uncover_num = null;
    foreach($radio_city_map as $key=>$val) {
        $intersect = array_intersect($uncover_citys,$val);//与未覆盖的州取交集
        $intersect_cnt = count($intersect);
        if($intersect_cnt == 0) {
            continue;//无交集，证明都已经被覆盖了
        }
        if(is_null($radio_key) ||  $intersect_cnt > $max_uncover_num) {
            $radio_key = $key;
            $max_uncover_num = $intersect_cnt;
        }
    }

    return $radio_key;
}

// greedy_classroom();
greedy_collection();
