<?php

use yii\db\Migration;

/**
 * Class m221017_201256_add_cv_education_data_table
 */
class m221017_201256_add_cv_education_data_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%cv_education_data}}', [
            'id' => $this->primaryKey(),
            'institution_name' => $this->string(),
            'faculty' => $this->string(),
            'study_programme' => $this->string(),
            'education_level' => $this->string(),
            'status' => $this->string(),
            'years_studied' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%cv_education_data}}');
    }
}
