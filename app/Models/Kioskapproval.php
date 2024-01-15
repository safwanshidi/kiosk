<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kioskapproval extends Model
{
    use HasFactory;

    protected $table = 'kioskapproval';

    protected $primaryKey = 'kioskID';

    protected $fillable = [
        'application_id',
        
        'KioskNo',
        'kioskStatus',
       
    ];

    
}