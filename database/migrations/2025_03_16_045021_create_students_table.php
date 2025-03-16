<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration {
    public function up() {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->timestamps();
        });



         DB::table('students')->insert([
             ['first_name' => 'John', 'last_name' => 'Doe', 'email' => 'john@example.com', 'phone' => '123456789'],
             ['first_name' => 'Jane', 'last_name' => 'Smith', 'email' => 'jane@example.com', 'phone' => '987654321'],
             ['first_name' => 'Alice', 'last_name' => 'Brown', 'email' => 'alice@example.com', 'phone' => '456789123'],
        ]);
    }

    public function down() {
        Schema::dropIfExists('students');
    }
};
