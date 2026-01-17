@extends('layouts.app')

@section('title', 'Events')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Discover Amazing Events
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Find and book tickets for the best events in your area. From concerts to sports, we've got you covered.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <input type="text" placeholder="Search events..." class="px-6 py-3 rounded-lg text-gray-900 w-full sm:w-80 focus:outline-none focus:ring-2 focus:ring-white">
                    <button class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Events Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Upcoming Events</h2>
            <p class="text-gray-600">Choose from our curated selection of amazing events</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($events as $event)
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                <div class="relative overflow-hidden">
                    @if($event->gambar)
                        <img src="{{ asset('storage/' . $event->gambar) }}" alt="{{ $event->judul }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-56 bg-gradient-to-br from-blue-400 via-purple-500 to-indigo-600 flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-5xl font-bold text-white mb-2">{{ substr($event->judul, 0, 1) }}</div>
                                <div class="text-white/80 text-sm">No Image</div>
                            </div>
                        </div>
                    @endif

                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/95 backdrop-blur-sm text-gray-800 px-3 py-1.5 rounded-full text-sm font-semibold shadow-lg">
                            {{ $event->kategoris->nama_kategori ?? 'General' }}
                        </span>
                    </div>

                    <!-- Status Badge -->
                    <div class="absolute top-4 right-4">
                        @if($event->tikets->sum('stok') > 0)
                            <span class="bg-green-500 text-white px-3 py-1.5 rounded-full text-sm font-semibold shadow-lg">
                                Available
                            </span>
                        @else
                            <span class="bg-red-500 text-white px-3 py-1.5 rounded-full text-sm font-semibold shadow-lg">
                                Sold Out
                            </span>
                        @endif
                    </div>
                </div>

                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                            {{ $event->judul }}
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2">
                            {{ Str::limit($event->deskripsi, 100) }}
                        </p>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-sm">{{ $event->tanggal_waktu->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm">{{ $event->tanggal_waktu->format('H:i') }}</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm">{{ Str::limit($event->lokasi, 30) }}</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span class="text-sm font-medium text-gray-700">{{ $event->tikets->sum('stok') }} tickets left</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold text-blue-600">
                                From Rp {{ number_format($event->tikets->min('harga') ?? 0, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('events.show', $event) }}"
                       class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View Details
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="text-6xl mb-4">🎭</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No Events Found</h3>
                    <p class="text-gray-600 mb-6">There are no events available at the moment. Check back later for upcoming events!</p>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Dashboard
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection