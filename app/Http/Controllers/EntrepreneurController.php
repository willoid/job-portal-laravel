<?php
namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Models\Branch;
use App\Models\Application;
use Illuminate\Http\Request;

class EntrepreneurController extends Controller
{
    public function dashboard()
    {
        if (!auth()->check() || !auth()->user()->isEntrepreneur()) {
            abort(403, 'Access denied. Entrepreneur privileges required.');
        }

        $jobOffers = auth()->user()->jobOffers()->with('applications', 'branch')->latest()->get();
        $totalApplications = Application::whereHas('jobOffer', function($query) {
            $query->where('user_id', auth()->id());
        })->count();

        return view('entrepreneur.dashboard', compact('jobOffers', 'totalApplications'));
    }

    public function applications()
    {
        if (!auth()->check() || !auth()->user()->isEntrepreneur()) {
            abort(403, 'Access denied. Entrepreneur privileges required.');
        }

        $applications = Application::whereHas('jobOffer', function($query) {
            $query->where('user_id', auth()->id());
        })->with(['user.jobSeekerProfile', 'jobOffer'])->latest()->paginate(15);

        return view('entrepreneur.applications.index', compact('applications'));
    }

    public function showApplication(Application $application)
    {
        if (!auth()->check() || !auth()->user()->isEntrepreneur()) {
            abort(403, 'Access denied. Entrepreneur privileges required.');
        }

        if ($application->jobOffer->user_id !== auth()->id()) {
            abort(403);
        }

        $application->load(['user.jobSeekerProfile.qualifications', 'user.jobSeekerProfile.experiences', 'jobOffer']);
        return view('entrepreneur.applications.show', compact('application'));
    }

    public function respondToApplication(Request $request, Application $application)
    {
        if (!auth()->check() || !auth()->user()->isEntrepreneur()) {
            abort(403, 'Access denied. Entrepreneur privileges required.');
        }

        if ($application->jobOffer->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:reviewed,accepted,rejected',
            'entrepreneur_response' => 'required|string|max:1000',
        ]);

        $application->update([
            'status' => $validated['status'],
            'entrepreneur_response' => $validated['entrepreneur_response'],
            'responded_at' => now(),
        ]);

        return redirect()->route('entrepreneur.applications.show', $application)
            ->with('success', 'Response sent successfully.');
    }
}
