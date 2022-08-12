<?php

namespace App\Models;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name',
        'course_id',
        'user_id',
        'user_name',
        'phone',
        'user_email',
        'open'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function user()
    {
        return $this->belongsTo(Course::class);
    }
}
