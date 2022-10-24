<?php

use yii\db\Migration;

/**
 * Class m221017_202256_add_cv_skills_and_achievements_table
 */
class m221017_202256_add_cv_skills_and_achievements_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%cv_skills_and_achievements}}', [
            'id' => $this->primaryKey(),
            'description' => $this->string(),
            'type' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%cv_skills_and_achievements}}');
    }
}
