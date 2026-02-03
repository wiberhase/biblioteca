<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📚 Inventario de Libros - Francisco
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <h3 class="text-lg font-bold mb-6">Libros Disponibles para Préstamo</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 border-b">
                                <th class="px-6 py-3">Título</th>
                                <th class="px-6 py-3">Autor</th>
                                <th class="px-6 py-3">Existencias</th>
                                <th class="px-6 py-3">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($libros as $libro)
                            <tr>
                                <td class="px-6 py-4 font-medium">{{ $libro->title }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $libro->author }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded text-sm {{ $libro->stock > 0 ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800' }}">
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

            </div>
        </div>
    </div>
</x-app-layout>