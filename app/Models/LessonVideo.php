<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LessonVideo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'lesson_videos';
    protected $fillable = [
        'LessonID',
        'Title',
        'LessonLinkUrl',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $dates = ['deleted_at'];
}