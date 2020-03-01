<?php
use abdualiym\slider\entities\Categories;

/* @var $this yii\web\View */
/* @var $model Categories */

$this->title = Yii::t('slider', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('slider', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title_0, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('slider', 'Update');
?>
<div class="article-categories-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
