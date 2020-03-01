<?php

use abdualiym\slider\entities\Categories;
use abdualiym\slider\helpers\Language;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model Categories */

$this->title = $model->title_0;
$this->params['breadcrumbs'][] = ['label' => Yii::t('slider', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-categories-view">

    <p>
        <?= Html::a(Yii::t('slider', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="box">
        <div class="box-body row">
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'common_image:boolean',
                        'common_link:boolean',
                        'common_text:boolean',
                        'use_tags:boolean',
                    ],
                ]) ?>
            </div>
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'slug',
                        'created_at:datetime',
                        'updated_at:datetime',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
                <?php foreach (Yii::$app->params['slider']['languages2'] as $key => $language) : ?>
                    <div class="col-sm-3">
                        <p><?= $language ?></p>
                        <h2><?= Language::getAttribute($model, 'title', $key); ?></h2>
                        <div><?= Language::getAttribute($model, 'description', $key); ?></div>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>

    <?= Html::a(Yii::t('slider', 'Delete'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('slider', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>

</div>
