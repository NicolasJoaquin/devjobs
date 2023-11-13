<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('rate_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories', 'id')->onDelete('cascade');
            $table->string('company');
            $table->date('last_date');
            $table->text('description');
            $table->string('image');
            $table->integer('published')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign('jobs_category_id_foreign');
            $table->dropForeign('jobs_rate_id_foreign');
            $table->dropForeign('jobs_user_id_foreign');
            $table->dropColumn([
                'title',
                'rate_id',
                'category_id',
                'company',
                'last_date',
                'description',
                'image',
                'published',
                'user_id',
            ]);
        });
    }
};
