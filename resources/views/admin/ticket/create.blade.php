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
                <h2 class="card-title text-2xl mb-6">Tambah Tiket Baru</h2>

                <form id="ticketForm" class="space-y-4" method="post" action="{{ route('admin.tickets.store') }}">
                    @csrf

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Event</span>
                        </label>
                        <select name="event_id" class="select select-bordered" required>
                            <option value="">Pilih Event</option>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}">{{ $event->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Tipe Tiket</span>
                        </label>
                        <input type="text" name="tipe" class="input input-bordered" placeholder="Contoh: VIP, Regular, Early Bird" required />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Harga</span>
                        </label>
                        <input type="number" name="harga" class="input input-bordered" placeholder="0" min="0" required />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Stok</span>
                        </label>
                        <input type="number" name="stok" class="input input-bordered" placeholder="0" min="0" required />
                    </div>

                    <div class="card-actions justify-end">
                        <a href="{{ route('admin.tickets.index') }}" class="btn">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>

@endsection