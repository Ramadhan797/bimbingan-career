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
                <h2 class="card-title text-2xl mb-6">Edit Tiket</h2>

                <form id="ticketForm" class="space-y-4" method="post" action="{{ route('admin.tickets.update', $ticket->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Event</span>
                        </label>
                        <select name="event_id" class="select select-bordered" required disabled>
                            <option value="{{ $ticket->event_id }}" selected>{{ $ticket->event->judul ?? 'N/A' }}</option>
                        </select>
                        <input type="hidden" name="event_id" value="{{ $ticket->event_id }}" />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Tipe Tiket</span>
                        </label>
                        <input type="text" name="tipe" value="{{ $ticket->tipe }}" class="input input-bordered" required />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Harga</span>
                        </label>
                        <input type="number" name="harga" value="{{ $ticket->harga }}" class="input input-bordered" min="0" required />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Stok</span>
                        </label>
                        <input type="number" name="stok" value="{{ $ticket->stok }}" class="input input-bordered" min="0" required />
                    </div>

                    <div class="card-actions justify-end">
                        <a href="{{ route('admin.tickets.index') }}" class="btn">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>

@endsection