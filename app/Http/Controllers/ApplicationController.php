<?php
namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request, JobOffer $jobOffer)
    {
        if (!auth()->check() || !auth()->user()->isJobSeeker()) {
            abort(403, 'Access denied. Job seeker privileges required.');
        }

        if ($jobOffer->hasApplied(auth()->id())) {
            return redirect()->back()->with('error', 'You have already applied to this job offer.');
        }

        $validated = $request->validate([
            'cover_letter' => 'nullable|string|max:2000',
        ]);

        Application::create([
            'job_offer_id' => $jobOffer->id,
            'user_id' => auth()->id(),
            'cover_letter' => $validated['cover_letter'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully.');
    }
}
