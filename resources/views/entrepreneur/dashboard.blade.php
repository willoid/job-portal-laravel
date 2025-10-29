<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Entrepreneur Dashboard') }}
            </h2>
            <a href="{{ route('job-offers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Post Job Offer
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Total Job Offers</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ $jobOffers->count() }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Total Applications</h3>
                        <p class="text-3xl font-bold text-green-600">{{ $totalApplications }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Active Offers</h3>
                        <p class="text-3xl font-bold text-purple-600">{{ $jobOffers->where('is_active', true)->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Job Offers -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Your Job Offers</h3>
                    @if($jobOffers->count() > 0)
                    <div class="space-y-4">
                        @foreach($jobOffers as $offer)
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h4 class="text-lg font-semibold">{{ $offer->title }}</h4>
                                    <p class="text-gray-600">{{ $offer->branch->name }} • {{ $offer->location }}</p>
                                    <p class="text-sm text-gray-500 mt-2">{{ $offer->applications->count() }} applications</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                        <span class="px-2 py-1 text-xs rounded-full {{ $offer->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $offer->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    <a href="{{ route('job-offers.edit', $offer) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('job-offers.destroy', $offer) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-500">No job offers posted yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
