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
        'user_id',
        'KioskNo',
        'kioskStatus',
        // Add other fields as needed
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}