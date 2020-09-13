<?php

use yii\db\Migration;

class m200913_151526_add_ckeditor_to_slider_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%abdualiym_slider_categories}}', 'use_editor', $this->boolean()->notNull());
        $this->addColumn('{{%abdualiym_slider_categories}}', 'link_label', $this->string());
        $this->addColumn('{{%abdualiym_slider_categories}}', 'common_input', $this->boolean()->notNull());
        $this->addColumn('{{%abdualiym_slider_categories}}', 'input_label', $this->string());

        $this->addColumn('{{%abdualiym_slider_slides}}','input_0', $this->string());
        $this->addColumn('{{%abdualiym_slider_slides}}','input_1', $this->string());
        $this->addColumn('{{%abdualiym_slider_slides}}','input_2', $this->string());
        $this->addColumn('{{%abdualiym_slider_slides}}','input_3', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('abdualiym_slider_slides', 'input_0');
        $this->dropColumn('abdualiym_slider_slides', 'input_1');
        $this->dropColumn('abdualiym_slider_slides', 'input_2');
        $this->dropColumn('abdualiym_slider_slides', 'input_3');

        $this->dropColumn('abdualiym_slider_categories', 'use_editor');
        $this->dropColumn('abdualiym_slider_categories', 'link_label');
        $this->dropColumn('abdualiym_slider_categories', 'common_input');
        $this->dropColumn('abdualiym_slider_categories', 'input_label');
    }
}
