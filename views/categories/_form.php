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

    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-3">
                    <br>
                    <?= $form->field($model, 'use_tags')->checkbox() ?>
                </div>
                <div class="col-sm-3">
                    <br>
                    <?= $form->field($model, 'common_image')->checkbox() ?>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="row">
                <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'title_' . $key)->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'description_' . $key)->textarea() ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-3">
                    <?= $form->field($model, 'checkbox_label')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'use_checkbox')->checkbox() ?>
                    <hr>
                    <?= $form->field($model, 'common_text')->checkbox() ?>
                    <?= $form->field($model, 'use_editor')->checkbox() ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'text_2_label')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'use_text_2')->checkbox() ?>
                    <?= $form->field($model, 'common_text_2')->checkbox() ?>
                    <?= $form->field($model, 'use_editor_2')->checkbox() ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'link_label')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'use_link')->checkbox() ?>
                    <?= $form->field($model, 'common_link')->checkbox() ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'input_label')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'use_input')->checkbox() ?>
                    <?= $form->field($model, 'common_input')->checkbox() ?>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('slider', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
