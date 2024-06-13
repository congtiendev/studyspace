<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Http\Requests\LessonRequest;
use App\Models\Chapter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

class LessonController extends Controller
{
    protected $lesson;
    protected $lessonVideo;
    public function __construct()
    {
        $this->lesson = new Lesson();
        $this->lessonVideo = new LessonVideo();
    }
    public function index()
    {
        $lessons = $this->lesson->join('course_chapters','course_chapters.id','=','lessons.CourseChapterId')->select('lessons.*','course_chapters.ChapterName')->orderBy('course_chapters.id', 'desc')->paginate(10);
        return view('admin.lesson.index', compact('lessons'));
    }

    public function create()
    {
        $course_chapter=Chapter ::all();
        return view('admin.lesson.create',compact('course_chapter'));
    }

    public function store(LessonRequest $request)
    {
        $data = $request->except('_token');
        $data['VideoTime'] = 0;
        try {
            $this->lesson->fill($data);
            $this->lesson->save();
            Session::flash('success', 'Thêm người dùng thành công');
            return redirect()->route('lesson.index');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $lesson = $this->lesson->find($id);
        $course_chapter=Chapter ::all();
        if ($lesson) {
            return view('admin.lesson.edit', compact(['lesson','course_chapter']));
        } else {
            Session::flash('error', 'Không tìm thấy người dùng');
            return redirect()->route('lesson.index');
        }
    }

    public function update($id, LessonRequest $request)
    {
        $lesson = Lesson::findOrFail($id);
        if ($lesson) {
            $data = $request->except('_token');
            try {
                $lesson->update($data);
                Session::flash('success', 'Cập nhật người dùng thành công');
                return redirect()->route('lesson.edit', $id);
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            Session::flash('error', 'Không tìm thấy người dùng');
            return redirect()->route('lesson.index');
        }
    }

    public function destroy($id)
    {
        $lesson = $this->lesson->find($id);
        if ($lesson) {
            try {
                $lesson->delete();
                Session::flash('success', 'Xóa người dùng thành công');
                return redirect()->route('lesson.index');
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            Session::flash('error', 'Không tìm thấy người dùng');
            return redirect()->route('lesson.index');
        }
    }

    public function addVideos($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('admin.lesson.add_video', compact('lesson'));
    }

    public function storeVideos($id, LessonRequest $request)
    {
      $lesson = Lesson::findOrFail($id);
        if ($lesson) {
            $data = $request->except('_token');
            $data['LessonID'] = $id;
            try {
                $this->lessonVideo->fill($data);
                $this->lessonVideo->save();
                Session::flash('success', 'Thêm video thành công');
                return redirect()->route('lesson.add-video', $id);
            } catch (\Exception $e) {
                dd($e);
                Session::flash('error', $e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            Session::flash('error', 'Không tìm thấy người dùng');
            return redirect()->route('lesson.index');
        }
    }

    public function show($id) {
        $lesson = Lesson::findOrFail($id);
        $videos = LessonVideo::where('LessonID', $id)->get();
        return view('admin.lesson.detail', compact('lesson', 'videos'));
    }

    public function destroyVideo($id){
        $lessonVideo = $this->lessonVideo->find($id);
        if ($lessonVideo) {
            try {
                $lessonVideo->delete();
                Session::flash('success', 'Xóa video thành công');
                return redirect()->back();
            } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            Session::flash('error', 'Không tìm thấy video');
            return redirect()->route('lesson.index');
        }
    }
}
