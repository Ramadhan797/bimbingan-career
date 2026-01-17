@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex">
        <!-- Sidebar -->
        @include('components.admin.sidebar')

        <!-- Main Content -->
        <div class="flex-1 ml-4">

    <div class="container mx-auto p-10">
        <div class="card bg-base-100 shadow-sm max-w-2xl">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">Detail Tiket</h2>

                <div class="space-y-4">
                    <div>
                        <label class="label">
                            <span class="label-text font-semibold">Event</span>
                        </label>
                        <p class="text-lg">{{ $ticket->event->judul ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <label class="label">
                            <span class="label-text font-semibold">Tipe Tiket</span>
                        </label>
                        <p class="text-lg">{{ $ticket->tipe }}</p>
                    </div>

                    <div>
                        <label class="label">
                            <span class="label-text font-semibold">Harga</span>
                        </label>
                        <p class="text-lg">Rp {{ number_format($ticket->harga, 0, ',', '.') }}</p>
                    </div>

                    <div>
                        <label class="label">
                            <span class="label-text font-semibold">Stok</span>
                        </label>
                        <p class="text-lg">{{ $ticket->stok }}</p>
                    </div>
                </div>

                <div class="card-actions justify-end mt-6">
                    <a href="{{ route('admin.tickets.index') }}" class="btn">Kembali</a>
                    <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>

@endsection