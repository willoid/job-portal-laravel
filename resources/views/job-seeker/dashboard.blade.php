<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Opportunities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filter -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form action="{{ route('job-seeker.dashboard') }}" method="GET" class="flex flex-wrap gap-4">
                        <div class="flex-1 min-w-64">
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="Search jobs..."
                                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div class="min-w-48">
                            <select name="branch" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">All Branches</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ request('branch') == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Search
                        </button>
                    </form>
                </div>
            </div>

            <!-- Job Offers -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobOffers as $offer)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2">{{ $offer->title }}</h3>
                            <p class="text-gray-600 mb-2">{{ $offer->user->entrepreneurProfile->company_name ?? $offer->user->name }}</p>
                            <p class="text-sm text-gray-500 mb-4">{{ $offer->branch->name }} • {{ $offer->location }}</p>
                            <p class="text-sm text-gray-700 mb-4">{{ Str::limit($offer->description, 100) }}</p>

                            <div class="flex justify-between items-center">
                                <a href="{{ route('job-offers.show', $offer) }}"
                                   class="text-blue-600 hover:text-blue-900 font-medium">View Details</a>

                                @if(!$offer->hasApplied(auth()->id()))
                                    <form action="{{ route('applications.store', $offer) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-sm font-bold py-1 px-3 rounded">
                                            Apply Now
                                        </button>
                                    </form>
                                @else
                                    <span class="text-green-600 text-sm font-medium">Applied</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $jobOffers->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
