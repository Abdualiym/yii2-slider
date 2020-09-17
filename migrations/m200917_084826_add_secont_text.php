<?php

use yii\db\Migration;

class m200917_084826_add_secont_text extends Migration
{

    public function safeUp()
    {
        $this->addColumn('{{%abdualiym_slider_categories}}', 'use_text_2', $this->boolean()->notNull());
        $this->addColumn('{{%abdualiym_slider_categories}}', 'text_2_label', $this->string());
        $this->addColumn('{{%abdualiym_slider_categories}}', 'use_editor_2', $this->boolean()->notNull());
        $this->addColumn('{{%abdualiym_slider_categories}}', 'common_text_2', $this->boolean()->notNull());
        $this->addColumn('{{%abdualiym_slider_categories}}', 'use_link', $this->boolean()->notNull());
        $this->addColumn('{{%abdualiym_slider_categories}}', 'use_input', $this->boolean()->notNull());

        $this->addColumn('{{%abdualiym_slider_slides}}','text_2_0', $this->text());
        $this->addColumn('{{%abdualiym_slider_slides}}','text_2_1', $this->text());
        $this->addColumn('{{%abdualiym_slider_slides}}','text_2_2', $this->text());
        $this->addColumn('{{%abdualiym_slider_slides}}','text_2_3', $this->text());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%abdualiym_slider_slides}}','text_2_0');
        $this->dropColumn('{{%abdualiym_slider_slides}}','text_2_1');
        $this->dropColumn('{{%abdualiym_slider_slides}}','text_2_2');
        $this->dropColumn('{{%abdualiym_slider_slides}}','text_2_3');

        $this->dropColumn('{{%abdualiym_slider_categories}}', 'use_text_2');
        $this->dropColumn('{{%abdualiym_slider_categories}}', 'text_2_label');
        $this->dropColumn('{{%abdualiym_slider_categories}}', 'use_editor_2');
        $this->dropColumn('{{%abdualiym_slider_categories}}', 'common_text_2');
    }
}
