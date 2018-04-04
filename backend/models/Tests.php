<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tests".
 *
 * @property int $id
 * @property int $science_id
 * @property string $question
 * @property string $answer_a
 * @property string $answer_b
 * @property string $answer_c
 * @property string $answer_d
 * @property string $answer_e
 * @property string $right_answer
 *
 * @property Science $science
 */
class Tests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['science_id', 'question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_e', 'right_answer'], 'required'],
            [['science_id'], 'integer'],
            [['question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_e'], 'string', 'max' => 100],
            [['right_answer'], 'string', 'max' => 1],
            [['science_id'], 'exist', 'skipOnError' => true, 'targetClass' => Science::className(), 'targetAttribute' => ['science_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'science_id' => 'Science ID',
            'question' => 'Question',
            'answer_a' => 'Answer A',
            'answer_b' => 'Answer B',
            'answer_c' => 'Answer C',
            'answer_d' => 'Answer D',
            'answer_e' => 'Answer E',
            'right_answer' => 'Right Answer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScience()
    {
        return $this->hasOne(Science::className(), ['id' => 'science_id']);
    }
}
