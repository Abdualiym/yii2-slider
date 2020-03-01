<?php

use abdualiym\slider\entities\Slides;

/* @var $this yii\web\View */
/* @var $model Slides */

$this->title = Yii::t('slider', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('slider', 'Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
