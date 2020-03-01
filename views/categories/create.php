<?php

use abdualiym\slider\entities\Categories;

/* @var $this yii\web\View */
/* @var $model Categories */

$this->title = Yii::t('slider', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('slider', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-categories-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
