<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "science".
 *
 * @property int $id
 * @property string $science
 *
 * @property Tests[] $tests
 */
class Science extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'science';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['science'], 'required'],
            [['science'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'science' => 'Science',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Tests::className(), ['science_id' => 'id']);
    }
}
