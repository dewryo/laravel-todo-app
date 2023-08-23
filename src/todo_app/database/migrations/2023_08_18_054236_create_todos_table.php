<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id(); // 自動増分 ID カラム
            $table->unsignedBigInteger('user_id'); // ユーザー ID カラム
            $table->string('todo'); // Todo カラム
            $table->integer('addtime');
            $table->boolean('exist');
            $table->timestamps(); // 作成日時と更新日時カラム

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('todos');
    }
};
