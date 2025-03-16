<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration {
    public function up() {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('courses')->insert([
            ['course_name' => 'Computer Science', 'description' => 'Introduction to computing'],
            ['course_name' => 'Business Management', 'description' => 'Fundamentals of business'],
            ['course_name' => 'Psychology', 'description' => 'Understanding human behavior'],
        ]);
        
    }

    public function down() {
        Schema::dropIfExists('courses');
    }
};

