<?php

use yii\db\Migration;

class m191004_071826_create_slider_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%abdualiym_slider_categories}}', [
            'id' => $this->primaryKey(),
            'common_image' => $this->boolean()->notNull(),
            'common_link' => $this->boolean()->notNull(),
            'common_text' => $this->boolean()->notNull(),
            'use_tags' => $this->boolean()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'title_0' => $this->string(),
            'title_1' => $this->string(),
            'title_2' => $this->string(),
            'title_3' => $this->string(),
            'description_0' => $this->text(),
            'description_1' => $this->text(),
            'description_2' => $this->text(),
            'description_3' => $this->text(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'updated_at' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('index-abdualiym_slider_categories-slug', 'abdualiym_slider_categories', 'slug', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('abdualiym_slider_categories');
    }
}
