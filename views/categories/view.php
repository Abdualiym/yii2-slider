<?php

use abdualiym\language\Language;
use abdualiym\slider\entities\Categories;
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
        <div class="box-body">
            <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                <div class="col-sm-3">
                    <p><?= $language ?></p>
                    <h2><?= Language::getAttribute($model, 'title', $key); ?></h2>
                    <div><?= Language::getAttribute($model, 'description', $key); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'slug',
                            'common_image:boolean',
                            'use_tags:boolean',
                        ],
                    ]) ?>
                </div>
                <div class="col-sm-6">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'created_at:datetime',
                            'updated_at:datetime',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-3">
                    <h3>Text 1</h3>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'common_text:boolean',
                            'use_editor:boolean',
                        ],
                    ]) ?>
                    <h3>Checkbox</h3>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'checkbox_label',
                            'use_checkbox:boolean',
                        ],
                    ]) ?>
                </div>
                <div class="col-sm-3">
                    <h3>Text 2</h3>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'use_text_2:boolean',
                            'text_2_label',
                            'common_text_2:boolean',
                            'use_editor_2:boolean',
                        ],
                    ]) ?>
                </div>
                <div class="col-sm-3">
                    <h3>Input 1</h3>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'use_link:boolean',
                            'common_link:boolean',
                            'link_label',
                        ],
                    ]) ?>
                </div>
                <div class="col-sm-3">
                    <h3>Input 2</h3>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'use_input:boolean',
                            'common_input:boolean',
                            'input_label',
                        ],
                    ]) ?>
                </div>
            </div>
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
