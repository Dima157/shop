<?php

use yii\db\Migration;

/**
 * Handles the creation of table `productImg`.
 * Has foreign keys to the tables:
 *
 * - `product`
 */
class m170911_151629_create_productImg_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('productImg', [
            'id' => $this->primaryKey(),
            'path' => $this->string(),
            'product_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-productImg-product_id',
            'productImg',
            'product_id'
        );

        // add foreign key for table `product`
        $this->addForeignKey(
            'fk-productImg-product_id',
            'productImg',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `product`
        $this->dropForeignKey(
            'fk-productImg-product_id',
            'productImg'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-productImg-product_id',
            'productImg'
        );

        $this->dropTable('productImg');
    }
}
