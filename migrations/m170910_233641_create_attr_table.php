<?php

use yii\db\Migration;

/**
 * Handles the creation of table `attr`.
 */
class m170910_233641_create_attr_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('attr', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('attr');
    }
}
