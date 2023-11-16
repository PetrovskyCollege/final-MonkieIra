<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stickers".
 *
 * @property int $id
 * @property string $sticker
 *
 * @property Notes[] $notes
 */
class Stickers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stickers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sticker'], 'required'],
            [['sticker'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sticker' => 'Sticker',
        ];
    }

    /**
     * Gets query for [[Notes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Notes::class, ['id_stickers' => 'id']);
    }
}
