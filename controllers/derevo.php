<?php


function debug($e)
{
    echo "<pre>";
    print_r($e);
    echo "</pre>";
}


$arr = [
    ['cat_id' => 1, 'name' => 'krepeg', 'parent_id' => 0],
    ['cat_id' => 2, 'name' => 'shyrypi i bolti', 'parent_id' => 1],
    ['cat_id' => 3, 'name' => 'gvozdi', 'parent_id' => 1],
    ['cat_id' => 4, 'name' => 'klei', 'parent_id' => 1],
    ['cat_id' => 5, 'name' => 'derevo', 'parent_id' => 8],
    ['cat_id' => 6, 'name' => 'doski', 'parent_id' => 5],
    ['cat_id' => 7, 'name' => 'brevna', 'parent_id' => 5],
    ['cat_id' => 8, 'name' => 'material', 'parent_id' => 0],
    ['cat_id' => 9, 'name' => 'kirpichi', 'parent_id' => 10],
    ['cat_id' => 10, 'name' => 'kamen', 'parent_id' => 8],
    ['cat_id' => 11, 'name' => 'gazobloki', 'parent_id' => 10],
];

function getTree($arr_cat,$parent=0)
{
    $tree=[];
    foreach($arr_cat as $item)
    {
        if($item['parent_id']===$parent)
        {
            $children=getTree($arr_cat,$item['cat_id']);
            if($children)
            {
                $item['children']=$children;
            }
            $tree[]=$item;
        }
    }
    return $tree;
}

$tree1= getTree($arr,0);
function getList($tree)
{
    $html='<ul>';
    foreach($tree as $item)
    {
        $html.='<li>';
        $html.=$item['name'];
        if($item['children'])
        {
            $html.=getList(($item['children']));
        }
        $html.='</li>';
    }
    $html.="</ul>";
    return $html;
}
$list=getList($tree1);
debug($list);

