<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ➕ Agregar Nuevo Libro
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                        <input type="text" name="title" class="w-full border rounded py-2 px-3" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Autor:</label>
                        <input type="text" name="author" class="w-full border rounded py-2 px-3" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">ISBN:</label>
                        <input type="text" name="isbn" class="w-full border rounded py-2 px-3" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Cantidad:</label>
                        <input type="number" name="stock" min="1" class="w-full border rounded py-2 px-3" required>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('dashboard') }}" class="text-gray-500 py-2">Cancelar</a>
                        <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                            Guardar Libro
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>