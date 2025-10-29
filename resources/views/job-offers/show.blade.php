<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $jobOffer->title }}
            </h2>
            <a href="{{ route('job-offers.index') }}" class="text-blue-600 hover:text-blue-900">← Back to Jobs</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Job Header -->
                    <div class="border-b border-gray-200 pb-6 mb-6">
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $jobOffer->title }}</h1>
                        <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $jobOffer->user->entrepreneurProfile->company_name ?? $jobOffer->user->name }}
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                </svg>
                                {{ $jobOffer->branch->name }}
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
                                </svg>
                                {{ $jobOffer->location }}
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zM4 7h12v9a1 1 0 01-1 1H5a1 1 0 01-1-1V7z"/>
                                </svg>
                                {{ ucfirst(str_replace('_', ' ', $jobOffer->employment_type)) }}
                            </span>
                        </div>

                        @if($jobOffer->salary_min || $jobOffer->salary_max)
                            <div class="mt-2">
                                <span class="text-lg font-semibold text-green-600">
                                    @if($jobOffer->salary_min && $jobOffer->salary_max)
                                        ${{ number_format($jobOffer->salary_min) }} - ${{ number_format($jobOffer->salary_max) }}
                                    @elseif($jobOffer->salary_min)
                                        From ${{ number_format($jobOffer->salary_min) }}
                                    @else
                                        Up to ${{ number_format($jobOffer->salary_max) }}
                                    @endif
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Job Description -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Job Description</h3>
                        <div class="text-gray-700 whitespace-pre-line">{{ $jobOffer->description }}</div>
                    </div>

                    <!-- Requirements -->
                    @if($jobOffer->requirements)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Requirements</h3>
                            <div class="text-gray-700 whitespace-pre-line">{{ $jobOffer->requirements }}</div>
                        </div>
                    @endif

                    <!-- Application Deadline -->
                    @if($jobOffer->deadline)
                        <div class="mb-6">
                            <span class="text-sm text-gray-600">Application Deadline: </span>
                            <span class="text-sm font-medium text-red-600">{{ $jobOffer->deadline->format('M d, Y') }}</span>
                        </div>
                    @endif

                    <!-- Apply Button -->
                    @auth
                        @if(auth()->user()->isJobSeeker())
                            @if(!$jobOffer->hasApplied(auth()->id()))
                                <div class="border-t border-gray-200 pt-6">
                                    <form action="{{ route('applications.store', $jobOffer) }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="cover_letter" class="block text-sm font-medium text-gray-700 mb-2">
                                                Cover Letter (Optional)
                                            </label>
                                            <textarea name="cover_letter" id="cover_letter" rows="4"
                                                      class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                      placeholder="Tell the employer why you're interested in this position..."></textarea>
                                        </div>
                                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded">
                                            Apply for this Job
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="border-t border-gray-200 pt-6">
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                                        <span class="font-medium">Application Submitted!</span>
                                        <p class="text-sm mt-1">You have already applied for this position. You can check your application status in your dashboard.</p>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @else
                        <div class="border-t border-gray-200 pt-6">
                            <p class="text-gray-600 mb-4">Please log in to apply for this position.</p>
                            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded">
                                Login to Apply
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
