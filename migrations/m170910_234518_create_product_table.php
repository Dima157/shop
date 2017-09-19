<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 * Has foreign keys to the tables:
 *
 * - `categories`
 */
class m170910_234518_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'categories_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `categories_id`
        $this->createIndex(
            'idx-product-categories_id',
            'product',
            'categories_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-product-categories_id',
            'product',
            'categories_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `categories`
        $this->dropForeignKey(
            'fk-product-categories_id',
            'product'
        );

        // drops index for column `categories_id`
        $this->dropIndex(
            'idx-product-categories_id',
            'product'
        );

        $this->dropTable('product');
    }
}
