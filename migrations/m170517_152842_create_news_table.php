<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170517_152842_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'image' => $this->string(255),
            'date' => $this->datetime()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
