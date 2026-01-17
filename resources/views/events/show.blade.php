@extends('layouts.app')

@section('title', $event->judul)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Event Header -->
    <div class="relative overflow-hidden">
        @if($event->gambar)
            <div class="h-96 bg-cover bg-center relative" style="background-image: url('{{ asset('storage/' . $event->gambar) }}')">
                <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/70"></div>
                <!-- Overlay Pattern -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-900/20 to-purple-900/20"></div>
            </div>
        @else
            <div class="h-96 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 relative">
                <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-black/20"></div>
                <!-- Decorative Elements -->
                <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
                <div class="absolute bottom-10 right-10 w-24 h-24 bg-white/5 rounded-full blur-lg"></div>
            </div>
        @endif

        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="text-white">
                    <!-- Category Badge -->
                    <div class="flex items-center mb-6">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-white/20 backdrop-blur-md border border-white/30 text-white shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            {{ $event->kategoris->nama_kategori ?? 'General' }}
                        </span>
                    </div>

                    <!-- Event Title -->
                    <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent">
                        {{ $event->judul }}
                    </h1>

                    <!-- Event Meta Information -->
                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <div class="flex items-center bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm text-blue-200 font-medium">Date & Time</div>
                                <div class="text-lg font-bold text-white">{{ $event->tanggal_waktu->format('l, F d, Y') }}</div>
                                <div class="text-sm text-blue-200">{{ $event->tanggal_waktu->format('H:i') }}</div>
                            </div>
                        </div>

                        <div class="flex items-center bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm text-green-200 font-medium">Location</div>
                                <div class="text-lg font-bold text-white">{{ $event->lokasi }}</div>
                                <div class="text-sm text-green-200">Venue Address</div>
                            </div>
                        </div>

                        <div class="flex items-center bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm text-purple-200 font-medium">Available Tickets</div>
                                <div class="text-lg font-bold text-white">{{ $event->tikets->sum('stok') }} tickets</div>
                                <div class="text-sm text-purple-200">Starting from {{ $event->tikets->min('harga') ? 'Rp ' . number_format($event->tikets->min('harga'), 0, ',', '.') : 'TBA' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#tickets" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold rounded-2xl transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-blue-500/25">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v8a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5z"></path>
                            </svg>
                            Get Your Tickets Now
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <button class="inline-flex items-center justify-center px-6 py-4 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white font-semibold rounded-2xl transition-all duration-300 border border-white/30">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            Add to Wishlist
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white/70 rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Event Details -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">About This Event</h2>
                    </div>

                    <!-- Event Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-4 text-center border border-blue-200">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="text-2xl font-bold text-blue-600">{{ $event->tanggal_waktu->format('d') }}</div>
                            <div class="text-sm text-blue-700 font-medium">{{ $event->tanggal_waktu->format('M Y') }}</div>
                        </div>

                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-4 text-center border border-green-200">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="text-2xl font-bold text-green-600">{{ $event->tanggal_waktu->format('H:i') }}</div>
                            <div class="text-sm text-green-700 font-medium">Start Time</div>
                        </div>

                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-4 text-center border border-purple-200">
                            <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="text-lg font-bold text-purple-600 leading-tight">{{ Str::limit($event->lokasi, 15) }}</div>
                            <div class="text-sm text-purple-700 font-medium">Location</div>
                        </div>

                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-4 text-center border border-orange-200">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div class="text-2xl font-bold text-orange-600">{{ $event->kategoris->nama_kategori ?? 'General' }}</div>
                            <div class="text-sm text-orange-700 font-medium">Category</div>
                        </div>
                    </div>

                    <!-- Event Description -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-gray-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Event Description</h3>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            <p class="mb-4">{{ $event->deskripsi }}</p>
                        </div>
                    </div>

                    <!-- Event Highlights -->
                    <div class="mt-8 bg-gradient-to-r from-indigo-50 to-blue-50 rounded-2xl p-6 border border-indigo-200">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">What to Expect</h3>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">Professional event management</span>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">High-quality entertainment</span>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">Comfortable venue facilities</span>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">Networking opportunities</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ticket Purchase -->
            <div id="tickets" class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl p-8 sticky top-6 border border-gray-100">
                    <div class="text-center mb-6">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v8a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">🎫 Get Your Tickets</h3>
                        <p class="text-gray-600 text-sm">Select your tickets and complete your booking</p>
                    </div>

                    @if($event->tikets->count() > 0)
                        <div class="space-y-6">
                            @foreach($event->tikets as $tiket)
                            <div class="border-2 border-gray-100 rounded-2xl p-6 hover:border-blue-200 hover:shadow-lg transition-all duration-200 bg-gradient-to-br from-gray-50 to-white" data-price="{{ $tiket->harga }}">
                                <!-- Ticket Header -->
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900 text-lg mb-2">{{ ucfirst($tiket->tipe) }} Ticket</h4>
                                        <p class="text-gray-600 text-sm mb-3 leading-relaxed">Premium seating with excellent view and access to all event facilities</p>
                                        <div class="flex items-center text-sm text-gray-500 mb-2">
                                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            {{ $tiket->stok }} tickets available
                                        </div>
                                    </div>
                                    <div class="text-right ml-4">
                                        <div class="text-3xl font-bold text-blue-600 mb-1">
                                            Rp {{ number_format($tiket->harga, 0, ',', '.') }}
                                        </div>
                                        <div class="text-xs text-gray-500 font-medium">per ticket</div>
                                    </div>
                                </div>

                                @if($tiket->stok > 0)
                                <!-- Quantity Selector -->
                                <div class="mb-6">
                                    <label class="block text-sm font-semibold text-gray-700 mb-3">Select Quantity</label>
                                    <div class="flex items-center justify-center space-x-4">
                                        <button type="button" onclick="decreaseQty('qty-{{ $tiket->id }}')"
                                                class="w-12 h-12 rounded-full bg-gray-100 hover:bg-red-100 hover:text-red-600 flex items-center justify-center transition-all duration-200 shadow-md hover:shadow-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        <div class="flex flex-col items-center">
                                            <input type="number" id="qty-{{ $tiket->id }}" name="quantity" value="1" min="1" max="{{ $tiket->stok }}"
                                                   class="w-20 text-center text-xl font-bold px-3 py-2 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                   onchange="updateTotal('{{ $tiket->id }}', {{ $tiket->harga }})">
                                            <span class="text-xs text-gray-500 mt-1">tickets</span>
                                        </div>
                                        <button type="button" onclick="increaseQty('qty-{{ $tiket->id }}', {{ $tiket->stok }})"
                                                class="w-12 h-12 rounded-full bg-gray-100 hover:bg-green-100 hover:text-green-600 flex items-center justify-center transition-all duration-200 shadow-md hover:shadow-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Total Price Display -->
                                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-4 mb-6 border border-blue-100">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <span class="text-sm font-medium text-gray-700">Total Price</span>
                                            <div class="text-xs text-gray-500">including all fees</div>
                                        </div>
                                        <span id="total-{{ $tiket->id }}" class="text-2xl font-bold text-blue-600">
                                            Rp {{ number_format($tiket->harga, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Buy Button -->
                                <form action="{{ route('events.buy', $tiket) }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1" id="hidden-qty-{{ $tiket->id }}">
                                    <button type="submit" onclick="setQuantity('{{ $tiket->id }}')"
                                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-4 px-6 rounded-2xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13l-1.1 5M7 13L5.4 5"></path>
                                        </svg>
                                        Purchase Tickets
                                    </button>
                                </form>
                                @else
                                <div class="text-center py-8">
                                    <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                    <div class="text-red-600 font-semibold text-lg mb-2">Sold Out</div>
                                    <p class="text-gray-500 text-sm">This ticket type is no longer available</p>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <!-- Purchase Info -->
                        <div class="mt-8 p-6 bg-gradient-to-r from-green-50 to-blue-50 rounded-2xl border border-green-100">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg">Purchase Information</h4>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-2">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Instant confirmation after purchase
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Digital tickets sent to your email
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Valid for one-time entry only
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Non-refundable after purchase
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-6">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v8a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">No Tickets Available</h3>
                            <p class="text-gray-600 mb-6">Tickets for this event are not available yet. Check back later for ticket sales.</p>
                            <div class="flex items-center justify-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                We'll notify you when tickets become available
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        {{ session('success') }}
    </div>
    @endif
</div>

<script>
// Quantity selector functions
function increaseQty(inputId, maxStock) {
    const input = document.getElementById(inputId);
    const currentValue = parseInt(input.value) || 1;
    if (currentValue < maxStock) {
        input.value = currentValue + 1;
        const price = getPriceFromInput(inputId);
        updateTotal(inputId.replace('qty-', ''), price);
    }
}

function decreaseQty(inputId) {
    const input = document.getElementById(inputId);
    const currentValue = parseInt(input.value) || 1;
    if (currentValue > 1) {
        input.value = currentValue - 1;
        const price = getPriceFromInput(inputId);
        updateTotal(inputId.replace('qty-', ''), price);
    }
}

function updateTotal(ticketId, price) {
    const qtyInput = document.getElementById('qty-' + ticketId);
    const totalElement = document.getElementById('total-' + ticketId);
    const hiddenQtyInput = document.getElementById('hidden-qty-' + ticketId);

    const quantity = parseInt(qtyInput.value) || 1;
    const total = quantity * price;

    // Update total display
    totalElement.textContent = 'Rp ' + total.toLocaleString('id-ID');

    // Update hidden input for form submission
    if (hiddenQtyInput) {
        hiddenQtyInput.value = quantity;
    }
}

function getPriceFromInput(inputId) {
    const ticketId = inputId.replace('qty-', '');
    const ticketCard = document.querySelector(`[data-price]`);

    // Find the specific ticket card by looking for the input within it
    const input = document.getElementById(inputId);
    const card = input.closest('[data-price]');
    if (card) {
        return parseInt(card.getAttribute('data-price')) || 0;
    }
    return 0;
}

function setQuantity(ticketId) {
    const qtyInput = document.getElementById('qty-' + ticketId);
    const hiddenQtyInput = document.getElementById('hidden-qty-' + ticketId);
    if (hiddenQtyInput) {
        hiddenQtyInput.value = qtyInput.value;
    }
}

// Initialize totals on page load
document.addEventListener('DOMContentLoaded', function() {
    // Find all quantity inputs and initialize totals
    const qtyInputs = document.querySelectorAll('input[name="quantity"]');
    qtyInputs.forEach(input => {
        const ticketId = input.id.replace('qty-', '');
        const price = getPriceFromInput(input.id);
        if (price > 0) {
            updateTotal(ticketId, price);
        }
    });
});

// Auto-hide success message
@if(session('success'))
setTimeout(() => {
    const message = document.querySelector('.bg-green-500');
    if (message) {
        message.style.opacity = '0';
        setTimeout(() => message.remove(), 300);
    }
}, 3000);
@endif
</script>
@endsection