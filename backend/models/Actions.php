<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "actions".
 *
 * @property int $id
 * @property int $user_id
 * @property int $status
 * @property string $date_time
 *
 * @property User $user
 * @property TestEvents[] $testEvents
 */
class Actions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'date_time'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['date_time'], 'string', 'max' => 25],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'date_time' => 'Date Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestEvents()
    {
        return $this->hasMany(TestEvents::className(), ['action_id' => 'id']);
    }
}
