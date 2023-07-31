<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostPreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_previews', function (Blueprint $table) {
            $table->id();
            $table->string('id_article');
            $table->string('title');
            $table->longText('desc');
            $table->string('preview_image');
            $table->string('redaction');
            $table->longText('tags');
            $table->string('category');

            $table->softDeletes();
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
        Schema::dropIfExists('post_previews');
    }
}
