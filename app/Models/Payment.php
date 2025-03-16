<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = ['student_id', 'amount', 'payment_date'];

    // Relationships
    public function student() {
        return $this->belongsTo(Student::class);
    }
}

