<div class="drawer-side">
    <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
    <div class="flex min-h-full flex-col bg-gradient-to-b from-blue-600 to-blue-700 w-64 shadow-2xl border-r border-blue-500">
        <!-- Logo Section -->
        <div class="w-full flex items-center justify-center p-6 bg-gradient-to-r from-blue-700 to-blue-800 border-b border-blue-600">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg">
                    <img src="{{ asset('assets/images/logo_bengkod.svg') }}" alt="Logo" class="w-6 h-6 brightness-0 invert">
                </div>
                <div class="hidden lg:block">
                    <h2 class="text-white font-bold text-lg">TicketHub</h2>
                    <p class="text-blue-200 text-xs">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Sidebar Navigation -->
        <div class="flex-1 overflow-y-auto p-4">
            <ul class="menu w-full space-y-2">
                <!-- Dashboard Item -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 shadow-lg' : 'text-white hover:bg-white/10 hover:text-blue-100' }}">
                        <div class="w-8 h-8 {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : 'bg-white/10' }} rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="text-white">
                                <path fill="currentColor" d="M6 19h3v-5q0-.425.288-.712T10 13h4q.425 0 .713.288T15 14v5h3v-9l-6-4.5L6 10zm-2 0v-9q0-.475.213-.9t.587-.7l6-4.5q.525-.4 1.2-.4t1.2.4l6 4.5q.375.275.588.7T20 10v9q0 .825-.588 1.413T18 21h-4q-.425 0-.712-.288T13 20v-5h-2v5q0 .425-.288.713T10 21H6q-.825 0-1.412-.587T4 19m8-6.75" />
                            </svg>
                        </div>
                        <span class="hidden lg:inline font-medium">Dashboard</span>
                    </a>
                </li>

                <!-- Kategori item -->
                <li>
                    <a href="{{ route('admin.categories.index') }}" 
                       class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-white/20 shadow-lg' : 'text-white hover:bg-white/10 hover:text-blue-100' }}">
                        <div class="w-8 h-8 {{ request()->routeIs('admin.categories.*') ? 'bg-white/20' : 'bg-white/10' }} rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="text-white">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                            </svg>
                        </div>
                        <span class="hidden lg:inline font-medium">Manajemen Kategori</span>
                    </a>
                </li>

                <!-- Event item -->
                <li>
                    <a href="{{ route('admin.events.index') }}" 
                       class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.events.*') ? 'bg-white/20 shadow-lg' : 'text-white hover:bg-white/10 hover:text-blue-100' }}">
                        <div class="w-8 h-8 {{ request()->routeIs('admin.events.*') ? 'bg-white/20' : 'bg-white/10' }} rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="text-white">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3a2 2 0 0 0 0-4V7a2 2 0 0 1 2-2" />
                            </svg>
                        </div>
                        <span class="hidden lg:inline font-medium">Manajemen Event</span>
                    </a>
                </li>

                <!-- History item -->
                <li>
                    <a href="{{ route('admin.histories.index') }}" 
                       class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.histories.*') ? 'bg-white/20 shadow-lg' : 'text-white hover:bg-white/10 hover:text-blue-100' }}">
                        <div class="w-8 h-8 {{ request()->routeIs('admin.histories.*') ? 'bg-white/20' : 'bg-white/10' }} rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="text-white">
                                <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                                <polyline points="12 6 12 12 16 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></polyline>
                            </svg>
                        </div>
                        <span class="hidden lg:inline font-medium">History Pembelian</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Logout Section -->
        <div class="w-full p-4 border-t border-blue-600">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white w-full py-3 px-4 rounded-xl font-medium transition-all duration-200 shadow-lg hover:shadow-red-500/25 flex items-center justify-center gap-3">
                    <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="text-white">
                            <path fill="currentColor" d="M10 17v-2h4v-2h-4v-2l-5 3l5 3m9-12H5q-.825 0-1.413.588T3 7v10q0 .825.587 1.413T5 19h14q.825 0 1.413-.587T21 17v-3h-2v3H5V7h14v3h2V7q0-.825-.587-1.413T19 5z" />
                        </svg>
                    </div>
                    <span class="hidden lg:inline">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>