<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Courses;
use App\Models\Wallet;
use App\Models\Feedbacks;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Http\Requests\LessonRequest;
use App\Models\Chapter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    public function index()
    {
        // Tính tổng Amount của tất cả các user trong bảng wallet
        $total_amount = Wallet::sum('amount');
        // Lấy ra tổng số tiền của từng tháng trong bảng wallet (amount) yêu cầu trả về 12 kết quả gồm tháng và tổng số tiền của tháng đó
        $monthlyStatisticsAmount = Wallet::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(Amount) as total_amount'))
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy(DB::raw('MONTH(created_at)'))
        ->get();
        $users_count = User::count();
        $new_users_count = User::whereDate('created_at', date('Y-m-d'))->count();
        $courses_count = Courses::count();
        $new_courses_count = Courses::whereDate('created_at', date('Y-m-d'))->count();
        $feedback_count = Feedbacks::count();
        $new_feedback_count = Feedbacks::whereDate('created_at', date('Y-m-d'))->count();
        return view('admin.index', compact('users_count','new_users_count','courses_count','new_courses_count','total_amount','feedback_count','new_feedback_count','monthlyStatisticsAmount') );
    }
}
