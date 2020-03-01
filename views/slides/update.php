<?php

use abdualiym\slider\entities\Slides;

/* @var $this yii\web\View */
/* @var $model Slides */

$this->title = Yii::t('slider', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('slider', 'Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title_0, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('slider', 'Update');
?>
<div class="articles-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
