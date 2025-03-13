<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'student_id',
        'lesson_id',
        'date',
        'day',
        'status',
    ];

    public function group()
    {
        return $this->belongsTo(StudentGroup::class, 'group_id');
    }
}
