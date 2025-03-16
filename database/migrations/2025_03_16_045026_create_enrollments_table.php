<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration {
    public function up() {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->date('enrollment_date');
            $table->timestamps();
        });

        DB::table('enrollments')->insert([
            ['student_id' => 1, 'course_id' => 1, 'enrollment_date' => '2024-03-01'],
            ['student_id' => 2, 'course_id' => 2, 'enrollment_date' => '2024-03-02'],
            ['student_id' => 3, 'course_id' => 3, 'enrollment_date' => '2024-03-03'],
        ]);
        
    }

    public function down() {
        Schema::dropIfExists('enrollments');
    }
};
