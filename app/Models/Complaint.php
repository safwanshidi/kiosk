<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_name',
        'c_email',
        'c_ic_num',
        'c_type',
        'c_date',
        'c_details',
        'c_status',
    ];
}
