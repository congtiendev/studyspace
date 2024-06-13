<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'courses';

    protected $fillable = [
        'UserID',
        'CourseCode',
        'CourseName',
        'CourseSubTitle',
        'Slug',
        'Price',
        'Discount',
        'ImageData',
        'LessonCount',
        'ChapterCount',
        'TimeLessonTotal',
        'RegisterCount',
        'DoneCount',
        'CourseStatus',
        'IntroVideoLink'
    ];
}
