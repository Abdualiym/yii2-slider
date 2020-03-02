<?php

use abdualiym\slider\entities\Categories;
use abdualiym\slider\forms\CategoriesSearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('slider', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-categories-index">

    <p>
        <?= Html::a(Yii::t('slider', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title_0',
            'slug',
            [
                'attribute' => 'id',
                'value' => function (Categories $model) {
                    return Html::a($model->title_0, ['/slider/slides/index', 'slug' => $model->slug]);
                },
                'label' => Yii::t('slider', 'View'),
                'format' => 'raw'
            ],
            'use_tags:boolean',
            'common_image:boolean',
            'common_link:boolean',
            'common_text:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
