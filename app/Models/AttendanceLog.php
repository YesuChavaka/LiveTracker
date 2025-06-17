<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    use HasFactory;
    protected $table = "attendance_logs";

        public function getusernames()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
