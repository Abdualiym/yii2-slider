<?php

use yii\db\Migration;

class m191004_071828_create_slider_tags_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%abdualiym_slider_tags}}', [
            'id' => $this->primaryKey(),
            'sort' => $this->tinyInteger()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'title_0' => $this->string(),
            'title_1' => $this->string(),
            'title_2' => $this->string(),
            'title_3' => $this->string(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'updated_at' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('index-abdualiym_slider_tags-slug', 'abdualiym_slider_tags', 'slug', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('abdualiym_slider_tags');
    }
}
