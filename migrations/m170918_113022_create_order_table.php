<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `order_item`
 */
class m170918_113022_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'order_item_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-order-user_id',
            'order',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-order-user_id',
            'order',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `order_item_id`
        $this->createIndex(
            'idx-order-order_item_id',
            'order',
            'order_item_id'
        );

        // add foreign key for table `order_item`
        $this->addForeignKey(
            'fk-order-order_item_id',
            'order',
            'order_item_id',
            'order_item',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-order-user_id',
            'order'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-order-user_id',
            'order'
        );

        // drops foreign key for table `order_item`
        $this->dropForeignKey(
            'fk-order-order_item_id',
            'order'
        );

        // drops index for column `order_item_id`
        $this->dropIndex(
            'idx-order-order_item_id',
            'order'
        );

        $this->dropTable('order');
    }
}
