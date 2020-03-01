<?php

use abdualiym\slider\entities\Slides;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model Slides */

$this->title = $model->title_0;
$this->params['breadcrumbs'][] = ['label' => $category->title_0, 'url' => ['index', 'slug' => $category->slug]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-view">

    <p>
        <?= Html::a(Yii::t('slider', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>


    <div class="box">
        <div class="box-body row">
            <?php foreach (Yii::$app->params['slider']['languages2'] as $key => $language) : ?>
                <div class="col-sm-6">
                    <?php if (!$category->common_image || ($category->common_image && $key == 0)): ?>
                        <?= Html::img($model->getThumbFileUrl('photo_' . $key, 'sm'), ['class' => 'file-preview-image', 'alt' => '', 'title' => '']) ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="box">
        <div class="box-header"><h2><?= Yii::t('slider', 'Text') ?></h2></div>
        <div class="box-body row">
            <?php foreach (Yii::$app->params['slider']['languages2'] as $key => $language) : ?>
                <div class="col-sm-6">
                    <?php if (!$category->common_text || ($category->common_text && $key == 0)) : ?>
                        <?= Language::getAttribute($model, 'title', $key) ?>
                        <?= Language::getAttribute($model, 'content', $key) ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="box">
        <div class="box-header"><h2></h2></div>
        <div class="box-body">
            <div class="col-sm-2">
                <?= $form->field($model, 'sort')->textInput(['value' => $model->getSortValue($category->id)]) ?>
                <br>
                <?php
                $model->active = $model->isNewRecord;
                echo $form->field($model, 'active')->checkbox();
                ?>
                <?= Html::submitButton(Yii::t('slider', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <?php foreach (Yii::$app->params['slider']['languages2'] as $key => $language) : ?>
                <div class="col-sm-3">
                    <?php if (!$category->common_link || ($category->common_link && $key == 0)) : ?>
                        <?= Language::getAttribute($model, 'link', $key) ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <div class="box">
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'slug',
                            'status:boolean',
                            'created_at:datetime',
                            'updated_at:datetime',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box">
                <div class="box-body">
                    <img src="<?= $model->getThumbFileUrl('photo', 'md') ?>">
                </div>
            </div>
        </div>
    </div>
</div>


<p>
    <?= Html::a(Yii::t('slider', 'Delete'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('slider', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
</p>
