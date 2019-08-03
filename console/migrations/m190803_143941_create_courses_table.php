<?php
use yii\db\Migration;
/**
* Handles the creation of table `{{%courses}}`.
*/
class m190803_143941_create_courses_table extends Migration
{
    public $db = 'db';

    public $tableName = '{{%courses}}';

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey()->notNull()->unique()->comment('ID'),
            'name' => $this->string(500)->null(),
            'description' => $this->string(500)->null(),
            'img' => $this->string(500)->null(),
            'video' => $this->string(500)->null(),
        ]);

        // creates index for column `id`
        $this->createIndex(
            'idx-courses-id',
            $this->tableName,
            'id'
        );


    }

    public function safeDown()
    {

        // drop index for column `id`
        $this->dropIndex(
            'idx-courses-id',
            $this->tableName
        );

        $this->dropTable($this->tableName);
    }
}

