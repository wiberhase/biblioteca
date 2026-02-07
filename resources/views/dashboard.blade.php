<x-app-layout>
    {{-- ================= ESTILO DE FONDO ================= --}}
    <div class="fixed inset-0 -z-20 bg-cover bg-center bg-no-repeat" style="background-image: url('/ruta/a/tu/fondo-login.jpg');"></div>
    
    {{-- Capa de superposición CASI INEXISTENTE (Solo un mínimo tinte para unificar) --}}
    <div class="fixed inset-0 -z-10 bg-white/[0.02] dark:bg-black/[0.1] backdrop-blur-none"></div>
    {{-- =================================================== --}}

    <x-slot name="header">
        <div class="flex items-center justify-between px-2">
            <h2 class="font-black text-3xl text-gray-900 dark:text-white leading-tight tracking-tight flex items-center gap-3 drop-shadow-xl">
                <span>
                    Biblioteca <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-400 drop-shadow-md">Inventario</span>
                </span>
            </h2>
            <div class="hidden sm:block text-xs font-black text-orange-900 dark:text-white uppercase tracking-widest bg-white/[0.05] dark:bg-white/[0.05] px-4 py-2 rounded-full backdrop-blur-[20px] border border-white/[0.1] shadow-xl">
                Panel de Control
            </div>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-14">
            
            {{-- Notificación de Éxito (Cristal Etéreo) --}}
            @if(session('success'))
                <div class="relative overflow-hidden rounded-2xl bg-white/[0.05] dark:bg-black/[0.1] backdrop-blur-[30px] border border-green-400/20 dark:border-green-500/10 p-4 shadow-2xl shadow-green-900/10">
                    <div class="flex items-center gap-3">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-green-500/80 text-white shadow-lg shadow-green-500/30 backdrop-blur-md">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <p class="font-black text-green-900 dark:text-white text-sm tracking-wide uppercase drop-shadow-lg">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- Sección Admin (Panel Superior - DRÁSTICAMENTE TRANSPARENTE) --}}
            @if(auth()->user()->role === 'admin')
                <div class="relative overflow-hidden bg-white/[0.03] dark:bg-black/[0.15] backdrop-blur-[50px] rounded-[3rem] p-10 shadow-2xl border border-white/[0.05] dark:border-white/[0.02] group hover:bg-white/[0.07] dark:hover:bg-black/[0.2] transition-all duration-700">
                    {{-- Decoración casi imperceptible --}}
                    <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full bg-orange-500/[0.03] blur-[60px] group-hover:bg-orange-500/[0.07] transition-all duration-1000"></div>
                    
                    <div class="relative flex flex-col md:flex-row justify-between items-center gap-8">
                        <div>
                            <h3 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight drop-shadow-2xl">👑 Panel Maestro</h3>
                            <p class="mt-2 text-sm font-bold text-gray-800 dark:text-gray-200 uppercase tracking-[0.2em] drop-shadow-md">Gestión de Biblioteca</p>
                        </div>
                        <a href="{{ route('books.create') }}" class="relative group/btn overflow-hidden rounded-[2rem] px-10 py-5 font-black text-white shadow-2xl shadow-orange-900/20 transition-all hover:scale-105 active:scale-95 bg-gradient-to-r from-orange-600/70 to-amber-500/70 backdrop-blur-[30px] border border-white/10">
                            <div class="absolute inset-0 bg-white/30 opacity-0 group-hover/btn:opacity-100 transition-all duration-500"></div>
                            <span class="relative flex items-center gap-4 tracking-widest text-sm drop-shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                                NUEVO LIBRO
                            </span>
                        </a>
                    </div>
                </div>
            @endif

            {{-- Tabla de Libros (Ultra Glass Extremo) --}}
            <div class="bg-white/[0.02] dark:bg-black/[0.1] backdrop-blur-[40px] rounded-[3.5rem] shadow-2xl overflow-hidden border border-white/[0.05] dark:border-white/[0.02]">
                {{-- Header de la tabla --}}
                <div class="p-10 border-b border-white/[0.05] dark:border-white/[0.02] flex justify-between items-center bg-white/[0.02] dark:bg-black/[0.05]">
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tight drop-shadow-xl">Catálogo Disponible</h3>
                    <div class="flex space-x-3">
                        <div class="w-2 h-2 rounded-full bg-orange-500/80 shadow-[0_0_15px_rgba(249,115,22,0.8)]"></div>
                        <div class="w-2 h-2 rounded-full bg-amber-500/80 shadow-[0_0_15px_rgba(245,158,11,0.8)]"></div>
                    </div>
                </div>

                <div class="overflow-x-auto p-6">
                    <table class="min-w-full border-separate border-spacing-y-4">
                        <thead>
                            <tr class="text-left text-[11px] font-black uppercase tracking-[0.25em] text-gray-800 dark:text-gray-300">
                                <th class="px-6 py-2 drop-shadow-lg">Obra</th>
                                <th class="px-6 py-2 drop-shadow-lg">Autor</th>
                                <th class="px-6 py-2 text-center drop-shadow-lg">Status</th>
                                <th class="px-6 py-2 text-right drop-shadow-lg">Solicitud</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($libros as $libro)
                            <tr class="group transition-all duration-500 hover:scale-[1.01]">
                                <td class="px-8 py-6 bg-white/[0.03] dark:bg-black/[0.15] rounded-l-[2rem] border-y border-l border-white/[0.05] dark:border-white/[0.02] backdrop-blur-[10px] group-hover:bg-white/[0.07] dark:group-hover:bg-black/[0.25]">
                                    <div class="font-black text-xl text-gray-900 dark:text-white group-hover:text-orange-600 dark:group-hover:text-orange-300 transition-colors drop-shadow-xl">
                                        {{ $libro->title }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 bg-white/[0.03] dark:bg-black/[0.15] border-y border-white/[0.05] dark:border-white/[0.02] backdrop-blur-[10px] group-hover:bg-white/[0.07] dark:group-hover:bg-black/[0.25]">
                                    <div class="text-xs font-bold text-gray-700 dark:text-gray-400 uppercase tracking-widest drop-shadow-md">
                                        {{ $libro->author }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-center bg-white/[0.03] dark:bg-black/[0.15] border-y border-white/[0.05] dark:border-white/[0.02] backdrop-blur-[10px] group-hover:bg-white/[0.07] dark:group-hover:bg-black/[0.25]">
                                    @if($libro->stock > 0)
                                    <span class="inline-flex items-center gap-3 px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-green-400/10 text-green-900 dark:text-green-100 border border-green-400/20 backdrop-blur-xl shadow-lg">
                                        <span class="relative flex h-2 w-2">
                                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                          <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500 dark:bg-green-400 shadow-[0_0_10px_rgba(74,222,128,0.8)]"></span>
                                        </span>
                                        {{ $libro->stock }} Disp.
                                    </span>
                                    @else
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-red-400/10 text-red-900 dark:text-red-100 border border-red-400/20 backdrop-blur-xl shadow-lg">
                                        Agotado
                                    </span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 text-right bg-white/[0.03] dark:bg-black/[0.15] rounded-r-[2rem] border-y border-r border-white/[0.05] dark:border-white/[0.02] backdrop-blur-[10px] group-hover:bg-white/[0.07] dark:group-hover:bg-black/[0.25]">
                                    @if($libro->stock > 0)
                                        <form action="{{ route('prestamos.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $libro->id }}">
                                            <button type="submit" class="group/btn relative overflow-hidden rounded-2xl bg-gray-900/60 dark:bg-white/10 px-8 py-3 text-xs font-black text-white uppercase tracking-widest shadow-2xl shadow-black/30 dark:shadow-orange-500/10 transition-all hover:scale-105 active:scale-95 border border-white/10 backdrop-blur-[20px]">
                                                <div class="absolute inset-0 bg-gradient-to-r from-orange-500 to-amber-500 opacity-0 group-hover/btn:opacity-100 transition-all duration-500"></div>
                                                <span class="relative z-10 flex items-center gap-2 drop-shadow-md">
                                                    Obtener <span class="transition-transform group-hover/btn:translate-x-1">→</span>
                                                </span>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500 text-xs font-black uppercase tracking-widest cursor-not-allowed opacity-50 drop-shadow-sm">No disponible</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Sección Mis Préstamos --}}
            <div class="pt-10">
                <h3 class="flex items-center gap-5 text-3xl font-black text-gray-900 dark:text-white mb-12 drop-shadow-2xl">
                    <span class="flex h-14 w-14 items-center justify-center rounded-[2rem] bg-gradient-to-br from-orange-500/60 to-amber-600/60 text-white text-3xl shadow-2xl shadow-orange-500/30 backdrop-blur-[30px] border border-white/10">
                        📖
                    </span>
                    Mis Préstamos Activos
                </h3>
                
                @if($misPrestamos->isEmpty())
                    <div class="rounded-[3rem] border-2 border-dashed border-gray-400/20 dark:border-white/10 p-16 text-center bg-white/[0.02] dark:bg-black/[0.05] backdrop-blur-[20px]">
                        <p class="text-lg font-bold text-gray-600 dark:text-gray-400 uppercase tracking-widest drop-shadow-lg">No tienes lecturas en curso.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($misPrestamos as $prestamo)
                        <div class="relative bg-white/[0.03] dark:bg-black/[0.15] backdrop-blur-[50px] rounded-[3rem] p-10 shadow-2xl border border-white/[0.05] dark:border-white/[0.02] hover:-translate-y-3 transition-all duration-500 group overflow-hidden">
                            {{-- Letra de fondo casi invisible --}}
                             <div class="absolute top-0 right-0 p-6 opacity-[0.02] dark:opacity-[0.04] text-9xl font-black text-black dark:text-white select-none z-0">
                                {{ substr($prestamo->book->title, 0, 1) }}
                             </div>
                            
                            <div class="relative z-10">
                                <div class="flex justify-between items-start mb-8">
                                    <span class="px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-xl backdrop-blur-[20px] border {{ $prestamo->status == 'active' ? 'bg-amber-500/10 border-amber-500/20 text-amber-900 dark:text-amber-100' : 'bg-green-500/10 border-green-500/20 text-green-900 dark:text-green-100' }}">
                                        {{ $prestamo->status == 'active' ? '⏳ En Lectura' : '✅ Devuelto' }}
                                    </span>
                                </div>
                                
                                <h4 class="text-2xl font-black text-gray-900 dark:text-white leading-tight mb-6 line-clamp-2 group-hover:text-orange-600 dark:group-hover:text-orange-300 transition-colors drop-shadow-xl">
                                    {{ $prestamo->book->title }}
                                </h4>
                                <div class="flex items-center gap-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-widest bg-white/[0.05] dark:bg-white/[0.02] p-3 rounded-2xl w-fit backdrop-blur-[20px] border border-white/[0.05] shadow-md">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    Desde: {{ \Carbon\Carbon::parse($prestamo->loan_date)->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Monitor Global (Admin - Transparencia Total) --}}
            @if(auth()->user()->role === 'admin')
                <div class="mt-24 bg-white/[0.02] dark:bg-black/[0.15] backdrop-blur-[60px] rounded-[3.5rem] p-12 shadow-2xl border border-white/[0.05] dark:border-white/[0.02] relative overflow-hidden">
                    
                    <div class="relative z-10 flex items-center justify-between mb-10">
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white flex items-center gap-4 drop-shadow-2xl">
                            👑 Monitor Global
                        </h3>
                        <span class="px-5 py-2 bg-orange-500/10 text-orange-900 dark:text-white text-xs rounded-full font-black uppercase tracking-widest border border-orange-500/20 backdrop-blur-[20px] shadow-xl">
                            Admin System
                        </span>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-separate border-spacing-y-4">
                            <thead>
                                <tr class="text-left text-[11px] font-black uppercase tracking-[0.25em] text-gray-700 dark:text-gray-400">
                                    <th class="px-8 py-4 drop-shadow-lg">Usuario</th>
                                    <th class="px-8 py-4 drop-shadow-lg">Libro en posesión</th>
                                    <th class="px-8 py-4 text-center drop-shadow-lg">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prestamosGlobales as $prestamo)
                                <tr class="group hover:scale-[1.01] transition-all duration-300">
                                    <td class="px-8 py-6 bg-white/[0.03] dark:bg-black/[0.2] rounded-l-[2rem] border-y border-l border-white/[0.05] dark:border-white/[0.02] backdrop-blur-[15px]">
                                        <div class="flex items-center gap-5">
                                            <div class="h-10 w-10 rounded-2xl bg-gradient-to-tr from-orange-500/70 to-amber-600/70 flex items-center justify-center text-sm text-white font-black shadow-xl shadow-orange-500/20 backdrop-blur-sm">
                                                {{ substr($prestamo->user->name, 0, 1) }}
                                            </div>
                                            <div class="font-bold text-gray-900 dark:text-white text-base drop-shadow-xl">{{ $prestamo->user->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-sm font-bold text-gray-700 dark:text-gray-300 drop-shadow-md bg-white/[0.03] dark:bg-black/[0.2] border-y border-white/[0.05] dark:border-white/[0.02] backdrop-blur-[15px]">
                                        {{ $prestamo->book->title }}
                                    </td>
                                    <td class="px-8 py-6 text-center bg-white/[0.03] dark:bg-black/[0.2] rounded-r-[2rem] border-y border-r border-white/[0.05] dark:border-white/[0.02] backdrop-blur-[15px]">
                                        @if($prestamo->status == 'active')
                                            <form action="{{ route('prestamos.return', $prestamo) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="text-orange-900 dark:text-orange-100 font-black text-[10px] uppercase tracking-widest hover:scale-110 transition-all bg-white/10 dark:bg-white/[0.05] px-5 py-2 rounded-full backdrop-blur-[20px] shadow-lg border border-white/20 dark:border-white/10">
                                                    Marcar Recibido
                                                </button>
                                            </form>
                                        @else
                                            <span class="inline-flex items-center gap-2 text-emerald-900 dark:text-emerald-100 font-black text-[10px] uppercase tracking-widest bg-emerald-500/10 px-5 py-2 rounded-full border border-emerald-500/10 backdrop-blur-[20px] shadow-lg">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                                Completado
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>