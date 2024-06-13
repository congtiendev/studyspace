<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'course_chapters';
    protected $fillable = [
        'CourseID',
        'ChapterName',
        'ChapterTotalTime',
        'ChapterLessonCount',
        'SortNumber',
    ];
}
