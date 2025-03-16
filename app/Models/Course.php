<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model {
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['course_name', 'description'];

    // Relationships
    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
}

