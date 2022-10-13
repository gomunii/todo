<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * このメソッドはマイグレートコマンドを打った時に発動する
     * ソースに書いた設計通りのテーブルを作る
     * これなら、IDという主キーがあり、タイトルのVarchar(20)があり
     * テーブル名はフォルダースですよ。といっている。
     * つまり、このファイルはデータベースの設計ファイル
     * マイグレーションファイルがあれば、設計ファイル無くしたっ
     * ていうことにはならない。
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * マイグレーションコマンドでロールバックしたときに発動する
     * ロールバックしたときはフォルダーすテーブル削除してね
     * って書いてある
     */
    public function down()
    {
        Schema::dropIfExists('folders');
    }
}
