<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
debug($_GET);
debug($data);
debug($pagination);
echo LinkPager::widget(['pagination' => $pagination]);
//echo "privet";