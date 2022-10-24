<?php

use yii\db\Migration;

/**
 * Class m221017_192327_add_cv_personal_info_table
 */
class m221017_192327_add_cv_personal_info_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%cv_personal_info}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'phone' => $this->integer()->notNull(),
            'e_mail' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%cv_personal_info}}');
    }
}
