<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];

    // Relationships
    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
