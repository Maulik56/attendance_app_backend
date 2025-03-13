<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'franchise_id',
        'instructor_id',
        'cw_uid',
        'group_name',
        'start_date',
        'start_time',
        'end_time',
        'payer_id',
        'price_type_id',
        'program_id',
        'pos_id',
        'total_revenue_share',
        'your_revenue_share',
        'value',
        'communication_mode',
        'frequency',
        'day',
        'number_of_lessons',
        'status',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'group_id');
    }
}
