<?php
include("includes/initialize.php");

use Illuminate\Database\Schema\Blueprint;

//Raw Query

$database::schema()->dropIfExists('image_presets');
$database::schema()->create('image_presets', function ($table) {
    $table->id();
    $table->string('name', 25)->nullable();
    $table->integer('width');
    $table->integer('height');
    $table->boolean('status')->default(1);
});
// $database::schema()->dropIfExists('pricing');
// $database::schema()->create('pricing', function ($table) {
//     $table->increments('id');
//     $table->string('name', 255);
//     $table->interger('price', 255);
//     $table->boolean('status')->default(0);
//     $table->timestamps();
// });


// $database::schema()->dropIfExists('faqs');
// $database::schema()->create('faqs', function ($table) {
//     $table->increments('id');
//     $table->string('title', 255);
//     $table->mediumText('text');
//     $table->boolean('status')->default(0);
//     $table->timestamps();
// });

// $database::schema()->table('services', function ($table) {
//     $table->string('image_front', 100)->nullable()->after('image');
//     $table->text('front_text')->nullable()->after('image_front');
// });
// $database::schema()->table('services', function ($table) {
//     $table->after('meta_keywords', function (Blueprint $table) {
//         $table->string('og_title', 100)->nullable();
//         $table->string('og_locale', 100)->nullable();
//         $table->string('og_description', 250)->nullable();
//         $table->string('og_url', 20)->nullable();
//         $table->string('og_site_name', 20)->nullable();
//         $table->string('og_image', 50)->nullable();
//         $table->string('og_image_alt', 70)->nullable();
//     });
// });
// $database::schema()->dropIfExists('testimonials');
// $database::schema()->create('testimonials', function ($table) {
//     $table->increments('id');
//     $table->string('name', 60);
//     $table->string('designation', 60);
//     $table->string('text', 500);
//     $table->string('image');
//     $table->boolean('status')->default(0);
//     $table->timestamps();
// });
// $database::schema()->dropIfExists('counter');
// $database::schema()->create('counter', function ($table) {
//     $table->increments('id');
//     $table->string('name', 60);
//     $table->integer('number');
//     $table->boolean('status')->default(0);
//     $table->timestamps();
// });
// $database::schema()->dropIfExists('team');
// $database::schema()->create('team', function ($table) {
//     $table->increments('id');
//     $table->string('name', 60);
//     $table->string('image');
//     $table->string('designation', 50);
//     $table->string('facebook', 20);
//     $table->string('twiiter', 20);
//     $table->string('instagram', 20);
//     $table->string('youtube', 20);
//     $table->boolean('status')->default(0);
//     $table->timestamps();
// });
// $database::schema()->dropIfExists('client');
// $database::schema()->create('client', function ($table) {
//     $table->increments('id');
//     $table->string('name', 60);
//     $table->string('image');
//     $table->string('url', 50);
//     $table->boolean('status')->default(0);
//     $table->timestamps();
// });
// $database::schema()->dropIfExists('gallerycat');
// $database::schema()->create('gallerycat', function ($table) {
//     $table->increments('id');
//     $table->string('name', 60);
//     $table->string('slug', 60);
//     $table->boolean('status')->default(0);
//     $table->timestamps();
// });

// $database::schema()->dropIfExists('gallery');
// $database::schema()->create('gallery', function ($table) {
//     $table->increments('id');
//     $table->string('name', 60);
//     $table->string('image');
//     $table->string('alt', 100);
//     $table->mediumText('text');
//     $table->timestamps();
// });
// $database::schema()->dropIfExists('services');
// $database::schema()->create('services', function ($table) {
//     $table->increments('id');
//     $table->string('service_title', 60);
//     $table->string('service_slug', 60);
//     $table->string('image');
//     $table->string('icon', 20);
//     $table->string('sub_text', 100);
//     $table->string('meta_title');
//     $table->mediumText('meta_description');
//     $table->mediumText('meta_keywords');
//     $table->string('og_title', 100)->nullable();
//     $table->string('og_locale', 100)->nullable();
//     $table->string('og_description', 250)->nullable();
//     $table->string('og_url', 20)->nullable();
//     $table->string('og_site_name', 20)->nullable();
//     $table->string('og_image', 50)->nullable();
//     $table->string('og_image_alt', 70)->nullable();
//     $table->mediumText('text');
//     $table->timestamps();
// });

// $database::schema()->dropIfExists('blog_category');
// $database::schema()->create('blog_category', function ($table) {
//     $table->increments('id');
//     $table->string('cat_title', 60);
//     $table->string('cat_slug', 60);
//     $table->string('image');
//     $table->string('meta_title');
//     $table->mediumText('meta_description');
//     $table->mediumText('meta_keywords');
//     $table->mediumText('text');
//     $table->timestamps();
// });

// $database::schema()->dropIfExists('blog');
// $database::schema()->create('blog', function ($table) {
//     $table->increments('id');
//     $table->string('blog_title', 100);
//     $table->string('blog_slug', 100);
//     $table->string('meta_title');
//     $table->mediumText('meta_description');
//     $table->mediumText('meta_keywords');
//     $table->mediumText('text');
//     $table->timestamps();
// });
