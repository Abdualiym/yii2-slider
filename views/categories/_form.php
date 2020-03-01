<?php

use abdualiym\slider\entities\Categories;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'common')->checkbox() ?>
    <?= $form->field($model, 'use_tags')->checkbox() ?>

    <div class="box">
        <div class="box-body">
            <ul class="nav nav-tabs" role="tablist">
                <?php foreach (Yii::$app->params['slider']['languages2'] as $key => $language) : ?>
                    <li role="presentation" <?= $key == 0 ? 'class="active"' : '' ?>>
                        <a href="#<?= $key ?>" aria-controls="<?= $key ?>" role="tab" data-toggle="tab"><?= $language ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="tab-content">
                <br>
                <?php foreach (Yii::$app->params['slider']['languages2'] as $key => $language) : ?>
                    <div role="tabpanel" class="tab-pane <?= $key == 0 ? 'active' : '' ?>" id="<?= $key ?>">
                        <?= $form->field($model, 'title_' . $key)->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'description_' . $key)->textarea() ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('slider', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
