<?php

use yii\db\Migration;

/**
 * Class m221017_201330_add_cv_employment_history_table
 */
class m221017_201330_add_cv_employment_history_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%cv_employment_history}}', [
            'id' => $this->primaryKey(),
            'company_name' => $this->string(),
            'position' => $this->string(),
            'employment_type' => $this->string(),
            'years_worked' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%cv_employment_history}}');
    }
}
