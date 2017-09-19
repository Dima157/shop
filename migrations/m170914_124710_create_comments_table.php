<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170914_124710_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'text' => $this->string(),
            'rating' => $this->float(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-comments-user_id',
            'comments',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-comments-user_id',
            'comments',
            'user_id',
            'user',
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
            'fk-comments-user_id',
            'comments'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-comments-user_id',
            'comments'
        );

        $this->dropTable('comments');
    }
}
