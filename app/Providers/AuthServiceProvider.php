<?php
namespace App\Providers;

use App\Models\JobOffer;
use App\Policies\JobOfferPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        JobOffer::class => JobOfferPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
