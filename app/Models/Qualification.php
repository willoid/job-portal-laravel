<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_seeker_profile_id',
        'title',
        'institution',
        'year_obtained',
        'description',
    ];

    public function jobSeekerProfile()
    {
        return $this->belongsTo(JobSeekerProfile::class);
    }
}
