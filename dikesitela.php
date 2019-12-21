<?php

/**
 * 狄克斯特拉算法
 */

function dikesitela()
{
    //所有节点,parent_node父节点,min_cost当前节点目前的最小开销；-1代表无穷大
    $all_nodes = [
        'a'=>  ['parent_node'=>null,'min_cost'=>0],
        'b' => ['parent_node' => null, 'min_cost' => null],
        'c' => ['parent_node' => null, 'min_cost' => null],
        'd' => ['parent_node' => null, 'min_cost' => null],
        'e' => ['parent_node' => null, 'min_cost' => null],
        'f' => ['parent_node' => null, 'min_cost' => null],
    ];

    //当前节点与邻居节点的对应关系
    $neiber = [
        'a' => [
            ['neiber_node' => 'b', 'cost' => 5], //邻居节点、到邻居节点的花销
            ['neiber_node' => 'd', 'cost' => 0],
        ],
        'b' => [
            ['neiber_node' => 'c', 'cost' => 15],
            ['neiber_node' => 'e', 'cost' => 20],
        ],
        'c' => [
            ['neiber_node' => 'f', 'cost' => 20],
        ],
        'd' => [
            ['neiber_node' => 'c', 'cost' => 30],
            ['neiber_node' => 'e', 'cost' => 35],
        ],
        'e' => [
            ['neiber_node' => 'f', 'cost' => 10],
        ],
    ];

    $searched_nodes = array(); //已搜索过的节点	

    //解题思路：
    // 从已知的节点中找出最小开销的节点
    // 找到他的邻居节点
    // 更新他的邻居节点的开销
    // 标记当前节点已处理过
    $cnt = count($all_nodes);
    for ($i = 0; $i < $cnt; $i++) {
        $key = search_min_node($all_nodes,$searched_nodes);//最小开销节点
        $neiber_arr = $neiber[$key];//它的邻居节点
        $current_node = $all_nodes[$key];
        //更新邻居节点的开销
        foreach ($neiber_arr as $nb_item) {
            $next_node = &$all_nodes[$nb_item["neiber_node"]];
            $cost = $current_node["min_cost"] + $nb_item["cost"];
            if (is_null($next_node["min_cost"])) { //null代表第一次才到达的，null代表无穷大
                $next_node["parent_node"] = $key;
                $next_node["min_cost"] = $cost;
            } else {
                if ($cost < $next_node["min_cost"]) {
                    //更小的节点开销
                    $next_node["parent_node"] = $key;
                    $next_node["min_cost"] = $cost;
                }
            }
        }
        $searched_nodes[] = $key;//标记已处理过的节点
    }

    print_r($all_nodes);
}

/**
 * 从已知的节点中查找最小开销的节点,如果没有，返回起始点a节点 
 * @return string node key
 */
function search_min_node($arr,$searched_nodes)
{
    $key = null;
    $min_cost = null;
    foreach ($arr as $index => $item) {
        if(in_array($index,$searched_nodes)) {
            continue;//已走过的节点，不再参与
        }
        if(is_null($item["min_cost"])) {
            continue;
        }
        if (is_null($min_cost) ||  $item['min_cost'] < $min_cost) {
            $key = $index;
            $min_cost = $item['min_cost'];
        }
    }
    if (is_null($min_cost)) {
        return 'a'; //default value
    }
    return $key;
}

dikesitela();
