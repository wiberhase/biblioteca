<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📚 Inventario de Libros - Francisco
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 transition-colors duration-300">
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded-lg border border-green-200 dark:border-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if(auth()->user()->role === 'admin')
                    <div class="bg-indigo-50 dark:bg-indigo-900 border-l-4 border-indigo-500 p-4 mb-8 flex justify-between items-center">
                        <div>
                            <p class="font-bold text-indigo-700 dark:text-indigo-200">👑 Panel de Admin</p>
                        </div>
                        <a href="{{ route('books.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition">
                            + Agregar Libro
                        </a>
                    </div>
                @endif

                <h3 class="text-lg font-bold mb-6 text-gray-800 dark:text-white">Libros Disponibles para Préstamo</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300 border-b dark:border-gray-600">
                                <th class="px-6 py-3">Título</th>
                                <th class="px-6 py-3">Autor</th>
                                <th class="px-6 py-3">Existencias</th>
                                <th class="px-6 py-3">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($libros as $libro)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 font-medium dark:text-white">{{ $libro->title }}</td>
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $libro->author }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded text-sm {{ $libro->stock > 0 ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                        {{ $libro->stock }} disponibles
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($libro->stock > 0)
                                        <form action="{{ route('prestamos.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $libro->id }}">
                                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                                                Solicitar
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 italic">No hay stock</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-10 border-t dark:border-gray-700 pt-8">
                    <h3 class="text-lg font-bold mb-4 text-gray-800 dark:text-white">📖 Mis Préstamos Activos</h3>
                    
                    @if($misPrestamos->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400 italic">No tienes libros prestados actualmente.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($misPrestamos as $prestamo)
                            <div class="border dark:border-gray-700 rounded-lg p-4 flex justify-between items-center bg-gray-50 dark:bg-gray-700 transition-colors">
                                <div>
                                    <h4 class="font-bold text-indigo-700 dark:text-indigo-300">{{ $prestamo->book->title }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Fecha: {{ \Carbon\Carbon::parse($prestamo->loan_date)->format('d/m/Y') }}
                                    </p>
                                </div>
                                <span class="px-2 py-1 text-xs font-bold uppercase rounded 
                                    {{ $prestamo->status == 'active' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' }}">
                                    {{ $prestamo->status == 'active' ? 'En uso' : 'Devuelto' }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                @if(auth()->user()->role === 'admin')
                    <div class="mt-12">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white flex items-center gap-2">
                                👑 Monitor Global
                            </h3>
                            <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-200 text-xs rounded-full font-bold">
                                Vista Admin
                            </span>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700 transition-colors">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Usuario</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Libro</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Estado</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach($prestamosGlobales as $prestamo)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-medium text-gray-900 dark:text-white">{{ $prestamo->user->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                {{ $prestamo->book->title }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $prestamo->status == 'active' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' }}">
                                                    {{ $prestamo->status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                @if($prestamo->status == 'active')
                                                    <form action="{{ route('prestamos.return', $prestamo) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="text-indigo-600 dark:text-indigo-400 font-bold hover:underline">
                                                            Recibir
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-400">✅ Listo</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                </div>
        </div>
    </div>
</x-app-layout>