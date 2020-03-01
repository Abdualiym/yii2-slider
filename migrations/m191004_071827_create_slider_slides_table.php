<?php

use yii\db\Migration;

class m191004_071827_create_slider_slides_table extends Migration
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

        $this->createTable('{{%abdualiym_slider_slides}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'active' => $this->tinyInteger()->notNull(),
            'sort' => $this->tinyInteger()->notNull(),
            'photo_0' => $this->string(),
            'photo_1' => $this->string(),
            'photo_2' => $this->string(),
            'photo_3' => $this->string(),
            'link_0' => $this->string(),
            'link_1' => $this->string(),
            'link_2' => $this->string(),
            'link_3' => $this->string(),
            'title_0' => $this->string(),
            'title_1' => $this->string(),
            'title_2' => $this->string(),
            'title_3' => $this->string(),
            'content_0' => $this->text(),
            'content_1' => $this->text(),
            'content_2' => $this->text(),
            'content_3' => $this->text(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'updated_at' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('index-abdualiym_slider_slides-active', 'abdualiym_slider_slides', 'active');

        $this->createIndex('index-abdualiym_slider_slides-category_id', 'abdualiym_slider_slides', 'category_id');
        $this->addForeignKey('fkey-abdualiym_slider_slides-category_id', 'abdualiym_slider_slides', 'category_id', 'abdualiym_slider_categories', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('abdualiym_slider_slides');
    }
}
