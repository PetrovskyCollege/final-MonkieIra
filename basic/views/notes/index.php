<?php

use app\models\Notes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ваши записи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Notes', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            ['attribute' => 'text','label' => 'Текст'], 
            ['attribute' => 'data_n','label' => 'Дата'], 
            // [  
            //     'attribute' => 'id_settings',  
            //     'value' => function ($model) {  
            //         return $model->settings->color;  
            //     },  
            // ],
            // [  
            //     'attribute' => 'id_stickers',  
            //     'value' => function ($model) {  
            //         return $model->stickers->sticker;  
            //     },  
            // ],
            [  
                'attribute' => 'id_user', 'label' => 'Пользователь', 
                'value' => function ($model) {  
                    return $model->user->name;  
                },  
            ],
            // 'id_settings',
            // 'id_stickers',
            //'id_user',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Notes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
