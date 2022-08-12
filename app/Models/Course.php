<?php

namespace App\Models;
use App\Models\Video;
use App\Models\Order;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',
        'rate',
        'type',
        'description'
    ];
    public function videos(){
        return $this->hasMany(Video::class,"course_id","id");
    }
    public function orders(){
        return $this->hasMany(Order::class,"course_id","id");
    }
    public function quizes(){
        return $this->hasMany(Quiz::class,"course_id","id");
    }

}
