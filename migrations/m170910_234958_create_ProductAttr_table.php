<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ProductAttr`.
 * Has foreign keys to the tables:
 *
 * - `product`
 * - `attr`
 */
class m170910_234958_create_ProductAttr_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ProductAttr', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'attr_id' => $this->integer()->notNull(),
            'value' => $this->string(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-ProductAttr-product_id',
            'ProductAttr',
            'product_id'
        );

        // add foreign key for table `product`
        $this->addForeignKey(
            'fk-ProductAttr-product_id',
            'ProductAttr',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );

        // creates index for column `attr_id`
        $this->createIndex(
            'idx-ProductAttr-attr_id',
            'ProductAttr',
            'attr_id'
        );

        // add foreign key for table `attr`
        $this->addForeignKey(
            'fk-ProductAttr-attr_id',
            'ProductAttr',
            'attr_id',
            'attr',
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
            'fk-ProductAttr-product_id',
            'ProductAttr'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-ProductAttr-product_id',
            'ProductAttr'
        );

        // drops foreign key for table `attr`
        $this->dropForeignKey(
            'fk-ProductAttr-attr_id',
            'ProductAttr'
        );

        // drops index for column `attr_id`
        $this->dropIndex(
            'idx-ProductAttr-attr_id',
            'ProductAttr'
        );

        $this->dropTable('ProductAttr');
    }
}
