<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrepreneurProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_description',
        'website',
        'phone',
        'address',
        'city',
        'logo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
