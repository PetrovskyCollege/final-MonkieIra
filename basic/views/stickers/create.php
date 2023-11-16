<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stickers $model */

$this->title = 'Create Stickers';
$this->params['breadcrumbs'][] = ['label' => 'Stickers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stickers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
