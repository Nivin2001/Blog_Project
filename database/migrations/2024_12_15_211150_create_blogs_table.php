<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')
            ->constrained('blog_sections')
            ->onDelete('cascade');  // عند حذف القسم يتم حذف المقالات المرتبطة به
            $table->foreignId('user_id')->nullable()
            ->constrained('users')
            ->onDelete('set null');// This will set the user_id to NULL when a user is deleted

            $table->string('title');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->timestamps();


        });
    }
//     users إلى blogs: علاقة واحد إلى عدة، حيث كل مستخدم يمكنه كتابة عدة مقالات.
// blog_sections إلى blogs: علاقة واحد إلى عدة، حيث كل قسم يمكن أن يحتوي على عدة مقالات.


    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }

};

