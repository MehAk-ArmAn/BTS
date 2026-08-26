<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_pages', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('type')->default('standard'); 
            // about, privacy, terms, disclaimer, contact, cookies, community, copyright, data-deletion

            $table->string('title');
            $table->string('nav_label')->nullable();

            $table->string('eyebrow')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();

            $table->string('intro_title')->nullable();
            $table->text('intro_body')->nullable();

            $table->longText('content_html')->nullable();

            $table->json('blocks')->nullable();
            $table->json('faqs')->nullable();

            $table->string('cta_label')->nullable();
            $table->string('cta_url')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('show_in_nav')->default(false);
            $table->boolean('show_in_footer')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_pages');
    }
};