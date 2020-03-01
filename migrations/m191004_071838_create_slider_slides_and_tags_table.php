<?php

use yii\db\Migration;

class m191004_071838_create_slider_slides_and_tags_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%abdualiym_slider_slides_and_tags}}', [
            'slide_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('primary-abdualiym_slider_slides_and_tags-slug', 'abdualiym_slider_slides_and_tags', ['slide_id', 'tag_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('abdualiym_slider_slides_and_tags');
    }
}
