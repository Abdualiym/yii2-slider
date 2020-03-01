<?php
use abdualiym\slider\entities\Tags;

/* @var $this yii\web\View */
/* @var $model Tags */

$this->title = Yii::t('slider', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('slider', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title_0, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('slider', 'Update');
?>
<div class="article-tags-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
