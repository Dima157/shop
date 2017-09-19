<?php

use yii\db\Migration;

/**
 * Handles adding path_img to table `product`.
 */
class m170910_235319_add_path_img_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'path_img', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'path_img');
    }
}
