<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(AttendanceDetail::class);
    }
}
