<?php
use yii\db\Migration;
/**
* Handles the creation of table `{{%user_courses}}`.
*/
class m190803_144107_create_user_courses_table extends Migration
{
    public $db = 'db';

    public $tableName = '{{%user_courses}}';

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey()->notNull()->unique()->comment('ID'),
            'course_id' => $this->integer()->null(),
            'user_id' => $this->integer()->null(),
        ]);

        // creates index for column `id`
        $this->createIndex(
            'idx-user_courses-id',
            $this->tableName,
            'id'
        );

        // add foreign key for table `{{%courses}}`
        $this->addForeignKey(
            'fk-user_courses-course_id-courses-id',
            $this->tableName,
            'course_id',
            '{{%courses}}',
            'id',
            'SET NULL',
            'CASCADE'
        );
        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            'fk-user_courses-user_id-user-id',
            $this->tableName,
            'user_id',
            '{{%user}}',
            'id',
            'SET NULL',
            'CASCADE'
        );

    }

    public function safeDown()
    {

        // drop index for column `id`
        $this->dropIndex(
            'idx-user_courses-id',
            $this->tableName
        );

        // drop foreign key for table `{{%courses}}`
        $this->dropForeignKey(
            'fk-user_courses-course_id-courses-id',
            $this->tableName
        );
        // drop foreign key for table `{{%user}}`
        $this->dropForeignKey(
            'fk-user_courses-user_id-user-id',
            $this->tableName
        );
        $this->dropTable($this->tableName);
    }
}

