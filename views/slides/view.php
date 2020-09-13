<?php

use abdualiym\language\Language;
use abdualiym\slider\entities\Slides;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model Slides */
/* @var $category \abdualiym\slider\entities\Categories */

$this->title = $model->title_0;
$this->params['breadcrumbs'][] = ['label' => $category->title_0, 'url' => ['index', 'slug' => $category->slug]];
$this->params['breadcrumbs'][] = $this->title;

$columnCount = 12 / count(Yii::$app->params['cms']['languages2']);
?>
<div class="articles-view">

    <p>
        <?= Html::a(Yii::t('slider', 'Update'), ['update', 'id' => $model->id, 'slug' => $category->slug], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'sort',
                            'active:boolean',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'created_at:datetime',
                            'updated_at:datetime',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <h3 class="box-header"><?= Yii::t('slider', 'Photo') ?></h3>
        <div class="box-body row">
            <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                <div class="col-sm-<?= $columnCount ?>">
                    <?php if (!$category->common_image || ($category->common_image && $key == 0)): ?>
                        <?= Html::img($model->getThumbFileUrl('photo_' . $key, 'md'), ['class' => 'file-preview-image', 'alt' => '', 'title' => '']) ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <h3 class="box-header"><?= Yii::t('slider', 'Title') ?></h3>
        <div class="box-body row">
            <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                <div class="col-sm-<?= $columnCount ?>">
                    <?php if (!$category->common_text || ($category->common_text && $key == 0)) : ?>
                        <?= Language::getAttribute($model, 'title', $key) ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <h3 class="box-header"><?= Yii::t('slider', 'Content') ?></h3>
        <div class="box-body row">
            <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                <div class="col-sm-<?= $columnCount ?>">
                    <?php if (!$category->common_text || ($category->common_text && $key == 0)) : ?>
                        <?= Language::getAttribute($model, 'content', $key) ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ($category->use_tags) : ?>
            <h3 class="box-header"><?= Yii::t('slider', 'Tags') ?></h3>
            <div class="box-body text-bold">
                <?= implode('<br>', $model->getTagsList(true)) ?>
            </div>
        <?php endif; ?>

        <h3 class="box-header"><?= $category->link_label ?></h3>
        <div class="box-body">
            <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                <div class="col-sm-<?= $columnCount ?>">
                    <?php if (!$category->common_link || ($category->common_link && $key == 0)) {echo Language::getAttribute($model, 'link', $key);} ?>
                </div>
            <?php endforeach; ?>
        </div>

        <h3 class="box-header"><?= $category->input_label ?></h3>
        <div class="box-body">
            <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                <div class="col-sm-<?= $columnCount ?>">
                    <?php if (!$category->common_input || ($category->common_input && $key == 0)) {echo Language::getAttribute($model, 'input', $key);} ?>
                </div>
            <?php endforeach; ?>
        </div>
        <br>
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
