@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar -->
        @include('components.admin.sidebar')

        <!-- Main Content -->
        <div class="flex-1 p-4 lg:p-6">
            <!-- Notification Toast -->
            @if (session('success'))
                <div class="fixed top-4 right-4 z-50">
                    <div class="bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center space-x-3 animate-fade-in">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>

                <script>
                setTimeout(() => {
                    const toast = document.querySelector('.fixed.top-4');
                    if (toast) {
                        toast.style.opacity = '0';
                        toast.style.transition = 'opacity 0.5s';
                        setTimeout(() => toast.remove(), 500);
                    }
                }, 3000);
                </script>
            @endif

            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl shadow-lg p-6 mb-6">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between">
                    <div>
                        <h1 class="text-2xl lg:text-3xl font-bold text-white mb-2">Manajemen Event</h1>
                        <p class="text-blue-100">Kelola event dan acara dengan mudah</p>
                    </div>
                    <a href="{{ route('admin.events.create') }}" 
                       class="bg-white text-blue-600 hover:bg-blue-50 px-4 py-3 rounded-xl shadow-lg mt-4 lg:mt-0 transform hover:-translate-y-1 transition-all duration-200 flex items-center font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v5H4a1 1 0 100 2h5v5a1 1 0 102 0v-5h5a1 1 0 100-2h-5V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Event
                    </a>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <!-- head -->
                        <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-bold text-blue-600 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase tracking-wider">Judul Event</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-blue-600 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-blue-600 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-blue-600 uppercase tracking-wider">Lokasi</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-blue-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($events as $index => $event)
                                <tr class="hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-6 py-4 text-center text-sm font-medium text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-800">{{ $event->judul }}</div>
                                        @if(isset($event->harga) && $event->harga)
                                            <div class="text-sm text-blue-600 font-semibold mt-1">
                                                Rp {{ number_format($event->harga, 0, ',', '.') }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if(isset($event->kategori) && $event->kategori)
                                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                                                {{ $event->kategori->nama }}
                                            </span>
                                        @else
                                            <span class="text-gray-400 text-sm">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if(isset($event->tanggal_waktu) && $event->tanggal_waktu)
                                            <div class="font-medium text-gray-800">
                                                {{ \Carbon\Carbon::parse($event->tanggal_waktu)->format('d M Y') }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($event->tanggal_waktu)->format('H:i') }}
                                            </div>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="font-medium text-gray-800 max-w-xs truncate">
                                            {{ $event->lokasi ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('admin.events.show', $event->id) }}" 
                                               class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg shadow hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 flex items-center text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                </svg>
                                                Detail
                                            </a>
                                            <a href="{{ route('admin.events.edit', $event->id) }}" 
                                               class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-lg shadow hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 flex items-center text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <button 
                                                class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-lg shadow hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 flex items-center text-sm"
                                                onclick="openDeleteModal(this)" 
                                                data-id="{{ $event->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-lg font-medium text-gray-500">Belum ada event tersedia</p>
                                            <p class="text-sm text-gray-400 mt-1">Mulai dengan menambahkan event baru</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if(method_exists($events, 'links'))
                <div class="mt-6 bg-white rounded-2xl shadow-lg p-4">
                    <div class="flex justify-center">
                        {{ $events->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="delete_modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex flex-col items-center text-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-r from-red-100 to-red-50 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Hapus Event</h3>
                <p class="text-gray-600">Apakah Anda yakin ingin menghapus event ini? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <form method="POST" id="delete_form" class="space-y-4">
                @csrf
                @method('DELETE')
                <input type="hidden" name="event_id" id="delete_event_id">
                <div class="flex space-x-3">
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors duration-200 font-medium">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl shadow hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Ya, Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(button) {
        const id = button.dataset.id;
        const form = document.getElementById('delete_form');
        document.getElementById("delete_event_id").value = id;
        form.action = `/admin/events/${id}`;
        
        const modal = document.getElementById('delete_modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('delete_modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Close modal when clicking outside
    document.getElementById('delete_modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });
</script>

<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Zebra striping */
    tbody tr:nth-child(even) {
        background-color: #f8fafc;
    }
    
    /* Pagination styling */
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        justify-content: center;
        align-items: center;
    }
    
    .page-item {
        margin: 0 2px;
    }
    
    .page-link {
        display: block;
        padding: 8px 12px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        color: #4b5563;
        font-weight: 500;
        transition: all 0.2s;
        text-decoration: none;
    }
    
    .page-link:hover {
        background-color: #f3f4f6;
        transform: translateY(-1px);
    }
    
    .page-item.active .page-link {
        background: linear-gradient(to right, #3b82f6, #1d4ed8);
        color: white;
        border-color: #3b82f6;
    }
    
    .page-item.disabled .page-link {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>
@endsection