<?php

namespace frontend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id ID
 * @property string $name
 * @property string $description
 * @property string $img
 * @property string $video
 *
 * @property UserCourses[] $userCourses
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'img', 'video'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'img' => 'Img',
            'video' => 'Video',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
  
    public function getUsers() {
        return $this->hasMany(User::className(), ['id' => 'user_id'])
          ->viaTable('user_courses', ['course_id' => 'id']);
    }
}
