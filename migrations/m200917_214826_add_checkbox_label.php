<?php

use yii\db\Migration;

class m200917_214826_add_checkbox_label extends Migration
{

    public function safeUp()
    {
        $this->addColumn('{{%abdualiym_slider_categories}}', 'use_checkbox', $this->boolean()->notNull());
        $this->addColumn('{{%abdualiym_slider_categories}}', 'checkbox_label', $this->string());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%abdualiym_slider_categories}}', 'use_checkbox');
        $this->dropColumn('{{%abdualiym_slider_categories}}', 'checkbox_label');
    }
}
