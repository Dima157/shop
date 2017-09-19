<?php

use yii\db\Migration;

/**
 * Handles adding price to table `product`.
 */
class m170911_150217_add_price_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'price', $this->float());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'price');
    }
}
