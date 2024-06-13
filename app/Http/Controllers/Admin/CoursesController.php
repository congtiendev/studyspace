<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    const DOT = '.';
    const OBJECT = 'admin.courses';
    //
    public function index()
    {
        $data = Courses::all();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data'));
    }

    public function add()
    {
        return view(self::OBJECT . self::DOT . __FUNCTION__);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'UserID' => 'required',
                'CourseCode' => 'required|max:255|unique:courses,CourseCode',
                'CourseName' => 'required|max:255',
                'CourseSubTitle' => 'required|max:255',
                'Slug' => 'required|max:255',
                'Price' => 'required|numeric',
                'ImageData' => 'required|max:255',
                'Discount' => 'required|numeric',
                'LessonCount' => 'required|integer|min:0',
                'ChapterCount' => 'required|integer|min:0',
                'TimeLessonTotal' => 'required|integer|min:0',
                'RegisterCount' => 'required|integer|min:0',
                'DoneCount' => 'required|integer|min:0',
                'IntroVideoLink' => 'required|max:255',
            ]);

            $model = new Courses();
            $model->fill($request->except('ImageData'));

            if ($request->hasFile('ImageData')) {
                $model->ImageData = upload_file(OBJECT_COURSE, $request->file('ImageData'));
            }

            $model->save();
            return redirect()->route('courses.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422);
        }
    }

    public function edit(string $id)
    {

        $detail = Courses::query()->findOrFail($id);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('detail'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'UserID' => 'required',
                'CourseCode' => 'required|max:255|unique:courses,CourseCode,' . $id,
                'CourseName' => 'required|max:255',
                'CourseSubTitle' => 'required|max:255',
                'Slug' => 'required|max:255',
                'Price' => 'required|numeric',
                'ImageData' => 'required|max:255',
                'Discount' => 'required|numeric',
                'LessonCount' => 'required|integer|min:0',
                'ChapterCount' => 'required|integer|min:0',
                'TimeLessonTotal' => 'required|integer|min:0',
                'RegisterCount' => 'required|integer|min:0',
                'DoneCount' => 'required|integer|min:0',
                'IntroVideoLink' => 'required|max:255',
            ]);

            $model = Courses::find($id);

            if (!$model) {
                return response()->json(['message' => 'Courses not found'], 404);
            }

            $model->fill($request->except('ImageData'));

            if ($request->hasFile('ImageData')) {
                delete_file($model->ImageData);
                $model->ImageData = upload_file(OBJECT_COURSE, $request->file('ImageData'));
            }

            $model->save();

            return redirect()->route('courses.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422);
        }
    }

    public function destroy(string $id)
    {
        $model = Courses::findOrFail($id);
        $model->delete();
        delete_file($model->ImageData);
        return redirect()->route('courses.index');
    }
}
