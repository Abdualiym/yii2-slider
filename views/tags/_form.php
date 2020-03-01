<?php

use abdualiym\slider\entities\Tags;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model Tags */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model) ?>

    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-3">
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'sort')->textInput(['value' => $model->getSortValue()]) ?>
                </div>
            </div>
            <div class="row">
                <?php foreach (Yii::$app->params['slider']['languages2'] as $key => $language) : ?>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'title_' . $key)->textInput(['maxlength' => true]) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton(Yii::t('slider', 'Save'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
