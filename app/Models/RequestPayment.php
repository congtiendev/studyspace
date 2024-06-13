<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPayment extends Model
{
    use HasFactory;
    protected $table = 'request_payment';
    protected $fillable = ['user_id', 'name', 'email', 'amount', 'date_of_payment','content', 'status'];
    public static $waiting = 1;
    public static $approved = 0;
    public static $reject = 2;
    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)->get();
    }
}
