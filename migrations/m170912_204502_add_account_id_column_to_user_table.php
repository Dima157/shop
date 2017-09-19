<?php

use yii\db\Migration;

/**
 * Handles adding account_id to table `user`.
 * Has foreign keys to the tables:
 *
 * - `account`
 */
class m170912_204502_add_account_id_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'account', $this->integer()->notNull());

        // creates index for column `account`
        $this->createIndex(
            'idx-user-account',
            'user',
            'account'
        );

        // add foreign key for table `account`
        $this->addForeignKey(
            'fk-user-account',
            'user',
            'account',
            'account',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `account`
        $this->dropForeignKey(
            'fk-user-account',
            'user'
        );

        // drops index for column `account`
        $this->dropIndex(
            'idx-user-account',
            'user'
        );

        $this->dropColumn('user', 'account');
    }
}
