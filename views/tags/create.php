<?php

use abdualiym\slider\entities\Tags;

/* @var $this yii\web\View */
/* @var $model Tags */

$this->title = Yii::t('slider', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('slider', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-tags-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
