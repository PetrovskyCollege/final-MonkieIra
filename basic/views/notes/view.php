<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Notes $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="notes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text',
            'data_n',
             [  
                'attribute' => 'id_settings',  
                'value' => function ($model) {  
                    return $model->settings->color;  
                },  
            ],
            [  
                'attribute' => 'id_stickers',  
                'value' => function ($model) {  
                    return $model->stickers->sticker;  
                },  
            ],
            [  
                'attribute' => 'id_user',  
                'value' => function ($model) {  
                    return $model->user->name;  
                },  
            ],
        ],
    ]) ?>

</div>
