@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex">
        <!-- Sidebar -->
        @include('components.admin.sidebar')

        <!-- Main Content -->
        <div class="flex-1 ml-4">

    @if (session('success'))
        <div class="toast toast-bottom toast-center">
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        </div>

        <script>
        setTimeout(() => {
            document.querySelector('.toast')?.remove()
        }, 3000)
        </script>
    @endif

    <div class="container mx-auto p-10">
        <div class="flex">
            <h1 class="text-3xl font-semibold mb-4">Manajemen Tiket</h1>
            <a href="{{ route('admin.tickets.create') }}" class="btn btn-primary ml-auto">Tambah Tiket</a>
        </div>
        <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Event</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $index => $ticket)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $ticket->event->judul ?? 'N/A' }}</td>
                            <td>{{ $ticket->tipe }}</td>
                            <td>Rp {{ number_format($ticket->harga, 0, ',', '.') }}</td>
                            <td>{{ $ticket->stok }}</td>
                            <td>
                                <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                <button class="btn btn-sm bg-red-500 text-white" onclick="openDeleteModal(this)" data-id="{{ $ticket->id }}">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada tiket</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modal -->
    <dialog id="delete_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Konfirmasi Hapus</h3>
            <p class="py-4">Apakah Anda yakin ingin menghapus tiket ini?</p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Batal</button>
                </form>
                <form method="post" id="delete_form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-red-500 text-white">Hapus</button>
                </form>
            </div>
        </div>
    </dialog>

    <script>
        function openDeleteModal(button) {
            const id = button.dataset.id;
            const form = document.querySelector('#delete_modal form#delete_form');
            form.action = `/admin/tickets/${id}`;
            delete_modal.showModal();
        }
    </script>

        </div>
    </div>
</div>

@endsection