<?php
namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Models\Branch;
use App\Models\Application;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index()
    {
        $jobOffers = JobOffer::active()
            ->with(['user.entrepreneurProfile', 'branch'])
            ->latest()
            ->paginate(12);

        $branches = Branch::all();

        return view('job-offers.index', compact('jobOffers', 'branches'));
    }

    public function show(JobOffer $jobOffer)
    {
        $jobOffer->load(['user.entrepreneurProfile', 'branch', 'applications']);
        return view('job-offers.show', compact('jobOffer'));
    }

    public function create()
    {
        if (!auth()->check() || !auth()->user()->isEntrepreneur()) {
            abort(403, 'Access denied. Entrepreneur privileges required.');
        }

        $branches = Branch::all();
        return view('job-offers.create', compact('branches'));
    }

    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->isEntrepreneur()) {
            abort(403, 'Access denied. Entrepreneur privileges required.');
        }

        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full_time,part_time,contract,freelance',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'requirements' => 'nullable|string',
            'deadline' => 'nullable|date|after:today',
        ]);

        $validated['user_id'] = auth()->id();
        JobOffer::create($validated);

        return redirect()->route('entrepreneur.dashboard')->with('success', 'Job offer created successfully.');
    }

    public function edit(JobOffer $jobOffer)
    {
        if (!auth()->check() || !auth()->user()->isEntrepreneur() || $jobOffer->user_id !== auth()->id()) {
            abort(403, 'Access denied.');
        }

        $branches = Branch::all();
        return view('job-offers.edit', compact('jobOffer', 'branches'));
    }

    public function update(Request $request, JobOffer $jobOffer)
    {
        if (!auth()->check() || !auth()->user()->isEntrepreneur() || $jobOffer->user_id !== auth()->id()) {
            abort(403, 'Access denied.');
        }

        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full_time,part_time,contract,freelance',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'requirements' => 'nullable|string',
            'deadline' => 'nullable|date|after:today',
            'is_active' => 'boolean',
        ]);

        $jobOffer->update($validated);

        return redirect()->route('entrepreneur.dashboard')->with('success', 'Job offer updated successfully.');
    }

    public function destroy(JobOffer $jobOffer)
    {
        if (!auth()->check() || !auth()->user()->isEntrepreneur() || $jobOffer->user_id !== auth()->id()) {
            abort(403, 'Access denied.');
        }

        $jobOffer->delete();

        return redirect()->route('entrepreneur.dashboard')->with('success', 'Job offer deleted successfully.');
    }
}
