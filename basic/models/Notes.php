<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notes".
 *
 * @property int $id
 * @property string $text
 * @property string $data_n
 * @property int $id_settings
 * @property int|null $id_stickers
 * @property int $id_user
 *
 * @property Settings $settings
 * @property Stickers $stickers
 * @property User $user
 */
class Notes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'data_n', 'id_user'], 'required'],
            [['data_n'], 'safe'],
            [['id_settings', 'id_stickers', 'id_user'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['id_settings'], 'exist', 'skipOnError' => true, 'targetClass' => Settings::class, 'targetAttribute' => ['id_settings' => 'id']],
            [['id_stickers'], 'exist', 'skipOnError' => true, 'targetClass' => Stickers::class, 'targetAttribute' => ['id_stickers' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'data_n' => 'Data N',
            'id_settings' => 'Id Settings',
            'id_stickers' => 'Id Stickers',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[Settings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasOne(Settings::class, ['id' => 'id_settings']);
    }

    /**
     * Gets query for [[Stickers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStickers()
    {
        return $this->hasOne(Stickers::class, ['id' => 'id_stickers']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
