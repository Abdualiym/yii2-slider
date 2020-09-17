<?php

use abdualiym\slider\entities\Slides;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model Slides */
/* @var $category \abdualiym\slider\entities\Categories */
/* @var $form yii\widgets\ActiveForm */

$columnCount = 12 / count(Yii::$app->params['cms']['languages2']);
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'category_id')->hiddenInput(['value' => $category->id])->label(false) ?>

    <?= $form->errorSummary($model) ?>

    <div class="box">
        <div class="box-body row">
            <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                <div class="col-sm-<?= $columnCount ?>">
                    <?php if (!$category->common_image || ($category->common_image && $key == 0)): ?>
                        <?= $form->field($model, 'photo_' . $key)->widget(\kartik\file\FileInput::class, [
                            'options' => ['accept' => 'image/*'],
                            'language' => Yii::$app->language,
                            'pluginOptions' => [
                                'showCaption' => false,
                                'showRemove' => false,
                                'showUpload' => false,
                                'browseClass' => 'btn btn-primary btn-block',
                                'browseLabel' => 'Рисунок',
                                'layoutTemplates' => [
                                    'main1' => '<div class="kv-upload-progress hide"></div>{remove}{cancel}{upload}{browse}{preview}',
                                ],
                                'initialPreview' => [
                                    Html::img($model->getThumbFileUrl('photo_' . $key, 'sm'), ['class' => 'file-preview-image', 'alt' => '', 'title' => '']),
                                ],
                            ],
                        ]);
                        ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="box">
        <div class="box-header"><h2><?= Yii::t('slider', 'Text') ?></h2></div>
        <div class="box-body row">
            <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                <div class="col-sm-<?= $columnCount ?>">
                    <?php
                    if (!$category->common_text || ($category->common_text && $key == 0)) {
                        echo $form->field($model, 'title_' . $key)->textInput(['maxlength' => true]);
                        if ($category->use_editor) {
                            echo $form->field($model, 'content_' . $key)->widget(\sadovojav\ckeditor\CKEditor::class, [
                                'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
                                    'preset' => 'standard',
                                    'extraPlugins' => 'image2,widget,oembed,video',
                                    'language' => Yii::$app->language,
                                    'height' => 600,
                                ]),
                            ]);
                        } else {
                            echo $form->field($model, 'content_' . $key)->textarea(['rows' => 12]);
                        }
                    }

                    if ($category->use_text_2) {
                        if (!$category->common_text_2 || ($category->common_text_2 && $key == 0)) {
                            if ($category->use_editor_2) {
                                echo $form->field($model, 'text_2_' . $key)->widget(\sadovojav\ckeditor\CKEditor::class, [
                                    'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
                                        'preset' => 'standard',
                                        'extraPlugins' => 'image2,widget,oembed,video',
                                        'language' => Yii::$app->language,
                                        'height' => 600,
                                    ]),
                                ])->label($category->text_2_label . "(" . $language . ")");
                            } else {
                                echo $form->field($model, 'text_2_' . $key)->textarea(['rows' => 12])->label($category->text_2_label . "(" . $language . ")");
                            }
                        }
                    }
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php if ($category->use_tags) : ?>
        <div class="box">
            <div class="box-header"><h2><?= Yii::t('slider', 'Tags') ?></h2></div>
            <div class="box-body">
                <?= $form->field($model, 'tags')->checkboxList($model->getTagsList())->label(false) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($category->use_link) : ?>
        <div class="box">
            <div class="box-header"><h2><?= $category->link_label ?></h2></div>
            <div class="box-body">
                <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                    <div class="col-sm-2">
                        <?php if (!$category->common_link || ($category->common_link && $key == 0)) : ?>
                            <?= $form->field($model, 'link_' . $key)->textInput(['maxlength' => true])->label($category->link_label . "(" . $language . ")") ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($category->use_input) : ?>
        <div class="box">
            <div class="box-header"><h2><?= $category->input_label ?></h2></div>
            <div class="box-body">
                <?php foreach (Yii::$app->params['cms']['languages2'] as $key => $language) : ?>
                    <div class="col-sm-2">
                        <?php if (!$category->common_input || ($category->common_input && $key == 0)) : ?>
                            <?= $form->field($model, 'input_' . $key)->textInput(['maxlength' => true])->label($category->input_label . "(" . $language . ")") ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="box">
        <div class="box-header"><h2></h2></div>
        <div class="box-body">
            <div class="col-sm-2">
                <?= $form->field($model, 'sort')->textInput(['value' => $model->getSortValue($category->id)]) ?>
            </div>
            <div class="col-sm-2">
                <br>
                <?php if ($category->use_checkbox) {
                    echo $form->field($model, 'active')->checkbox(['label' => $category->checkbox_label]);
                } ?>
            </div>
            <div class="col-sm-2">
                <br>
                <?= Html::submitButton(Yii::t('slider', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
