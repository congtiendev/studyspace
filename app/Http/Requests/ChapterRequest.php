<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];
        $currenAction = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($currenAction) {
                    case 'store':
                    case 'update':
                        $rules = [
                            'CourseID' => 'required',
                            'ChapterName' => 'required|max:255',
                            'ChapterTotalTime' => 'required|integer|min:0',
                            'ChapterLessonCount' => 'required|integer|min:0',
                            'SortNumber' => 'required|integer|min:0',
                        ];
                        break;
                    default:
                        break;
                }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'CourseID.required' => 'Please select course!',
            'ChapterName.required' => 'Please enter chapter name!',
            'ChapterName.max' => 'Chapter name must be less than 255 characters!',
            'ChapterTotalTime.required' => 'Please enter chapter total time!',
            'ChapterTotalTime.integer' => 'Chapter total time must be integer!',
            'ChapterTotalTime.min' => 'Chapter total time must be greater than 0!',
            'ChapterLessonCount.required' => 'Please enter chapter lesson count!',
            'ChapterLessonCount.integer' => 'Chapter lesson count must be integer!',
            'ChapterLessonCount.min' => 'Chapter lesson count must be greater than 0!',
            'SortNumber.required' => 'Please enter sort number!',
            'SortNumber.integer' => 'Sort number must be integer!',
            'SortNumber.min' => 'Sort number must be greater than 0!',
        ];
    }
}
