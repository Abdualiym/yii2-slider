<?php

use abdualiym\slider\forms\SlidesSearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel SlidesSearch */
/* @var $category \abdualiym\slider\entities\Categories */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $category->title_0;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <p>
        <?= Html::a(Yii::t('slider', 'Create'), ['create', 'slug' => $category->slug], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'value' => function ($model) use ($category) {
                    return Html::a('<i class="glyphicon glyphicon-list-alt"></i> ' . Yii::t('yii', 'View'), ['view', 'id' => $model->id, 'slug' => $category->slug]);
                },
                'label' => '',
                'format' => 'raw'
            ],
            'sort',
            [
                'attribute' => 'photo_0',
                'value' => function ($model) {
                    return Html::img($model->getThumbFileUrl('photo_0', 'sm'));
                },
                'format' => 'raw'
            ],
            'title_0',
            'active:boolean',
        ],
    ]); ?>
</div>
