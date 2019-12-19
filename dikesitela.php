<?php
/**
 * 狄克斯特拉算法
 */

 function dikesitela() {
    //所有节点,parent_node父节点,min_cost当前节点目前的最小开销；-1代表无穷大
    $all_nodes = [
        // 'a'=>['parent_node'=>null,'min_cost'=>0],
        'b'=>['parent_node'=>null,'min_cost'=>-1],
        'c'=>['parent_node'=>null,'min_cost'=>-1],
        'd'=>['parent_node'=>null,'min_cost'=>-1],
        'e'=>['parent_node'=>null,'min_cost'=>-1],
        'f'=>['parent_node'=>null,'min_cost'=>-1],
    ];

    //当前节点与邻居节点的对应关系
    $neiber = [
        'a'=>[
            ['neiber_node'=>'b','cost'=>5],
            ['neiber_node'=>'d','cost'=>0],
        ],
        'b'=>[
            ['neiber_node'=>'c','cost'=>15],
            ['neiber_node'=>'e','cost'=>20],
        ],
        'c'=>[
            ['neiber_node'=>'f','cost'=>20],
        ],
        'd'=>[
            ['neiber_node'=>'c','cost'=>30],
            ['neiber_node'=>'e','cost'=>35],
        ],
        'e'=>[
            ['neiber_node'=>'f','cost'=>10],
        ],
    ];

    $start_node = 'a';
    $end_node = 'b';
    //从已知的节点中找出最小开销值，是通过变量记一下还是每次列表中查询呢？先不考虑效率问题，先考虑正确性
    
    foreach($all_nodes as $node) {

    }





 }