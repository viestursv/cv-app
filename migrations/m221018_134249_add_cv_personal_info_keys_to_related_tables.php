<?php

use yii\db\Migration;

/**
 * Class m221018_134249_add_cv_personal_info_keys_to_related_tables
 */
class m221018_134249_add_cv_personal_info_keys_to_related_tables extends Migration
{
    public function up()
    {
        $table_array = ['cv_education_data', 'cv_employment_history', 'cv_skills_and_achievements', 'cv_address'];

        foreach ($table_array as $table_name) {
            
            $this->addColumn($table_name, 'cv_personal_info_id', $this->integer());

            // creates index for column `cv_personal_info_id`
            $this->createIndex(
                'idx-'.$table_name.'-cv_personal_info_id',
                $table_name,
                'cv_personal_info_id'
            );

            // add foreign key for table `cv_education_data`
            $this->addForeignKey(
                'fk-'.$table_name.'-cv_personal_info_id',
                $table_name,
                'cv_personal_info_id',
                'cv_personal_info',
                'id',
                'CASCADE'
            );
        }
    }

    public function down()
    {

        $table_array = ['cv_education_data', 'cv_employment_history', 'cv_skills_and_achievements', 'cv_address'];

        foreach ($table_array as $table_name) {
            
            // drops foreign key for table `cv_education_data`
            $this->dropForeignKey(
                'fk-'.$table_name.'-cv_personal_info_id',
                $table_name
            );

            // drops index for column `cv_personal_info_id`
            $this->dropIndex(
                'idx-'.$table_name.'-cv_personal_info_id',
                $table_name
            );

            $this->dropColumn($table_name, 'cv_personal_info_id');
        }

        
    }
}
