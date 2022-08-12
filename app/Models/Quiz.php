<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Question;
class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'course_id',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class,"quiz_id","id");
    }

}
