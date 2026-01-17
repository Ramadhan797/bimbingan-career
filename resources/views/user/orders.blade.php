@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">My Orders</h1>
            <p class="text-gray-600">View all your ticket purchases and order history</p>
        </div>

        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        @if($orders->count() > 0)
        <div class="space-y-6">
            @foreach($orders as $order)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Order Header -->
                <div class="bg-blue-600 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-white">Order #{{ $order->id }}</h3>
                            <p class="text-blue-100 text-sm">{{ $order->order_date->format('F d, Y \a\t H:i') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-white text-sm">Total</p>
                            <p class="text-xl font-bold text-white">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Details -->
                <div class="p-6">
                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-900 mb-2">{{ $order->event->judul }}</h4>
                        <p class="text-gray-600 text-sm">{{ $order->event->lokasi }} • {{ $order->event->tanggal_waktu->format('F d, Y \a\t H:i') }}</p>
                    </div>

                    <!-- Ticket Details -->
                    <div class="space-y-3">
                        @foreach($order->detailOrders as $detail)
                        <div class="flex justify-between items-center py-3 border-b border-gray-100 last:border-b-0">
                            <div>
                                <p class="font-medium text-gray-900">{{ $detail->tiket->tipe }}</p>
                                <p class="text-sm text-gray-600">Quantity: {{ $detail->jumlah }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900">Rp {{ number_format($detail->subtotal_harga, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-600">@ Rp {{ number_format($detail->tiket->harga, 0, ',', '.') }} each</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Order Status -->
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Status:</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Confirmed
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">🎫</div>
            <h3 class="text-xl font-medium text-gray-900 mb-2">No orders yet</h3>
            <p class="text-gray-600 mb-6">You haven't purchased any tickets yet. Start exploring events!</p>
            <a href="{{ route('events.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                Browse Events
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
        @endif
    </div>
</div>
@endsection