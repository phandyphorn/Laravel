<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            // $table->id();
            // $table->unsignedBigInteger('post_id');
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            // $table->text('text');
            // $table->timestamps();

            $table->id();
            // There are two ways.
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Or
            // $table->foreignId('post_id')->constrained()->onDelete('CASCADE');
            // $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            
            $table->text('text');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
