<?php

use yii\db\Migration;

/**
 * Handles the creation of table `account`.
 */
class m170910_204229_create_account_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('account', [
            'id' => $this->primaryKey(),
            'login' => $this->string(),
            'pass' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('account');
    }
}
