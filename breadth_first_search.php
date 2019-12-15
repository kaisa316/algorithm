<?php

/**
 * 广度优先搜索 BFS
 */

//广度优先搜索
function bfs() {
    //你=>朋友...
    //朋友=>朋友的朋友
    //朋友的朋友=>朋友的朋友的朋友
    //由近至远的层层查找,要实现这样的效果，用队列。
    $friends['you'] = ['zhangsan','lisi','zhangsan'];
    $friends['zhangsan'] = ['zhangA','zhangB','zhangC'];
    $friends['lisi'] =  ['liA','liB','liC'];
    $friends['zhangA'] = ['zhangA1','zhangA2','zhangA3'];
    $friends['zhangB'] = ['zhangB1','zhangB2','zhangB3'];
    $friends['zhangC'] = ['zhangC1','zhangC2','zhangC3'];
    $friends['liA'] = ['liA1','liA2','liA3'];
    $friends['liB'] = ['liB1','liB2','liB3'];
    $friends['liC'] = ['liC1','liC2','liC3'];
    
     
    //要从朋友圈中找到 zhangC2 
    $search_val = 'zhangC2';
    $queue = $friends['you'];
    $searched = [];//已执行的
    while(!empty($queue)) {
        $current_val = array_shift($queue);//pop first element,出队
        if($current_val == $search_val) {
            return '找到了';
        }
        if (!in_array($current_val, $searched)) {
            $f_friends = $friends[$current_val] ?? [];
            $queue = array_merge($queue, $f_friends); //朋友的朋友append 末尾 ,入队
        }
        $searched[] = $current_val;
    }

    return '未找到';    
    
}

function bfs_main() {
    echo bfs();
}

bfs_main();
