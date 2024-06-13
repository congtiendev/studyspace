<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
                        $rules = [
                            'CourseChapterId' => 'required',
                            'LessonName' => 'required',
                            'LessonDescription' => 'required',
                            'SortNumber' => 'required',
                            'Status' => 'required',
                        ];
                        break;
                        case 'update':
                            $rules = [
                                'CourseChapterId' => 'required',
                                'LessonName' => 'required',
                                'LessonDescription' => 'required',
                                'SortNumber' => 'required',
                                'Status' => 'required',
                            ];
                            break;
                            case 'storeVideos':
                                $rules = [
                                    'Title' => 'required',
                                'LessonLinkUrl' => 'required|url',
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
                    'Title.required' => 'Tên video không được để trống',
                    'LessonName.required' => 'Tên khóa học không được để trống',
                    'LessonDescription.required' => 'Vui lòng nhập mô tả không được để trống',
                    'Status.required' => 'Trạng thái không được để trống',
                    'LessonLinkUrl.required' => 'Link video không được để trống',
                    'LessonLinkUrl.url' => 'Link video không đúng định dạng',
                    'SortNumber.required' => 'Số thứ tự không được để trống',
                    'CourseChapterId.required' => 'Chương không được để trống',
                ];
            }
        }

