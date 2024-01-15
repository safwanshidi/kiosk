<?php

// Application.php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $primaryKey = 'applicationId';

    protected $fillable = [
        'id',
        'business_name',
        'business_role',
        'business_category',
        'business_information',
        'business_operating_hour',
        'business_start_date',
        'ssm_pdf',
        'business_proposal_pdf',
        'application_status',
        'application_comment',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $timestamps = false;

}

