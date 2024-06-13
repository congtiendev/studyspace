<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Lesson extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'lessons';
    protected $fillable = [
        'CourseChapterId',
        'LessonName',
        'LessonDescription',
        'VideoTime',
        'SortNumber',
        'Status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $dates = ['deleted_at'];
  
}
