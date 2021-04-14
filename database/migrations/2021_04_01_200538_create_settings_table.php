<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('see_me')->default('global');
            $table->string('see_post')->default('global');
            $table->string('list_post')->default('my community');
            $table->boolean('sound-on')->default(0);
            $table->boolean('upvote-on')->default(1);
            $table->boolean('downvote-on')->default(1);
            $table->boolean('comments-on')->default(1);
            $table->boolean('posts-on')->default(0);
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
        Schema::dropIfExists('settings');
    }
}
