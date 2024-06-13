<?php
use Illuminate\Database\Seeder;
use App\Models\UserCourse;
use App\Models\User;
use App\Models\Courses;
use App\Models\VideoDoneData;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
//         1	id	int	Khóa chính, định danh duy nhất cho mỗi ghi danh của người dùng vào khóa học.
// 2	UserID	int	ID của người dùng tham gia khóa học.
// 3	CourseID	int	ID của khóa học mà người dùng đăng ký.
// 4	isDone	bit	Trạng thái hoàn thành khóa học (bit: 0 hoặc 1).
// 5	RegisterTime	datetime	Thời gian đăng ký khóa học.
// 6	GrandTotal	double	Tổng số tiền thanh toán cho khóa học (nếu có).
// 7	LastTimeStudy	datetime	Thời gian cuối cùng học khóa học.
// 8	DonePercent	double	Phần trăm hoàn thành khóa học.
// 9	DoneLesson	int	Số bài học hoàn thành
        for ($i = 1; $i <= 10; $i++) {
            UserCourse::create([
            "id" => $i,
            "userid"=> User::inRandomOrder()->first()->id,
            "courseid"=> Courses::inRandomOrder()->first()->id,
            "isDone"=> rand(0, 1),
            "RegisterTime"=> Carbon::now(),
            "GrandTotal"=> rand(0, 1000000),
            "LastTimeStudy"=> Carbon::now()->subDays(rand(1, 30)),
            "DonePercent"=> rand(0, 100),
            "DoneLesson"=> rand(0, 100)
            ]);


        }
    }
}
