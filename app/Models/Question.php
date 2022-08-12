<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\Choice;
class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_name',
        'quiz_id',
    ];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function choices()
    {
        return $this->hasMany(Choice::class,"question_id","id");
    }
}
