<?php
namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Models\Branch;
use App\Models\Application;
use Illuminate\Http\Request;

class JobSeekerController extends Controller
{
    public function dashboard(Request $request)
    {
        // Check if user is authenticated and is a job seeker
        if (!auth()->check() || !auth()->user()->isJobSeeker()) {
            abort(403, 'Access denied. Job seeker privileges required.');
        }

        $query = JobOffer::query()->active()->with(['user.entrepreneurProfile', 'branch']);

        if ($request->filled('branch')) {
            $query->where('branch_id', $request->branch);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $jobOffers = $query->latest()->paginate(12);
        $branches = Branch::all();

        return view('job-seeker.dashboard', compact('jobOffers', 'branches'));
    }

    public function myApplications()
    {
        if (!auth()->check() || !auth()->user()->isJobSeeker()) {
            abort(403, 'Access denied. Job seeker privileges required.');
        }

        $applications = auth()->user()->applications()
            ->with(['jobOffer.user.entrepreneurProfile', 'jobOffer.branch'])
            ->latest()
            ->paginate(15);

        return view('job-seeker.applications.index', compact('applications'));
    }

    public function showApplication(Application $application)
    {
        if (!auth()->check() || !auth()->user()->isJobSeeker()) {
            abort(403, 'Access denied. Job seeker privileges required.');
        }

        if ($application->user_id !== auth()->id()) {
            abort(403);
        }

        $application->load(['jobOffer.user.entrepreneurProfile', 'jobOffer.branch']);
        return view('job-seeker.applications.show', compact('application'));
    }
}
