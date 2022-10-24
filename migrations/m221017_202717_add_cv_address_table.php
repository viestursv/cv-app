<?php

use yii\db\Migration;

/**
 * Class m221017_202717_add_cv_address_table
 */
class m221017_202717_add_cv_address_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%cv_address}}', [
            'id' => $this->primaryKey(),
            'country' => $this->string(),
            'zip_code' => $this->string(),
            'city' => $this->string(),
            'street' => $this->string(),
            'number' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%cv_address}}');
    }
}
