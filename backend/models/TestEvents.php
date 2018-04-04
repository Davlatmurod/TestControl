<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "test_events".
 *
 * @property int $id
 * @property int $test_id
 * @property string $showed_answers
 * @property int $action_id
 * @property string $selected_answer
 *
 * @property Tests $test
 * @property Actions $action
 */
class TestEvents extends \yii\db\ActiveRecord
{
    public static $active_events_id=array();
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id', 'showed_answers', 'action_id'], 'required'],
            [['test_id', 'action_id'], 'integer'],
            [['showed_answers'], 'string', 'max' => 5],
            [['selected_answer'], 'string', 'max' => 1],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tests::className(), 'targetAttribute' => ['test_id' => 'id']],
            [['action_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actions::className(), 'targetAttribute' => ['action_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'showed_answers' => 'Showed Answers',
            'action_id' => 'Action ID',
            'selected_answer' => 'Selected Answer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Tests::className(), ['id' => 'test_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {
        return $this->hasOne(Actions::className(), ['id' => 'action_id']);
    }
}
