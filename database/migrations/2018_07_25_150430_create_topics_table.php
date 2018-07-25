<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id')
                ->comment('主键 ID');
            $table->string('title')
                ->index('idx_title')
                ->comment('话题标题');
            $table->text('body')
                ->comment('话题内容');
            $table->integer('user_id')
                ->unsigned()
                ->index('idx_user_id')
                ->comment('用户 ID');
            $table->integer('category_id')
                ->unsigned()
                ->index('idx_category_id')
                ->comment('分类 ID');
            $table->integer('reply_count')
                ->unsigned()
                ->default(0)
                ->comment('回复数量');
            $table->integer('view_count')
                ->unsigned()
                ->default(0)
                ->comment('查看数量');
            $table->integer('last_reply_user_id')
                ->unsigned()
                ->default(0)
                ->comment('最后回复的用户 ID');
            $table->integer('order')
                ->unsigned()
                ->default(0)
                ->comment('排序');
            $table->text('excerpt')
                ->nullable()
                ->comment('文章摘要');
            $table->string('slug')
                ->nullable()
                ->comment('SEO 友好的 URI');
            $table->timestamp('created_at')
                ->nullable()
                ->comment('创建时间');
            $table->timestamp('updated_at')
                ->nullable()
                ->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
