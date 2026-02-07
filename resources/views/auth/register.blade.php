<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-black tracking-tight text-gray-900 dark:text-white">
            Crear <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-600">Cuenta</span>
        </h1>
        <p class="mt-2 text-sm font-medium text-orange-800/70 dark:text-orange-200/60 uppercase tracking-widest">
            — Únete a la Biblioteca —
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4 sm:space-y-5">
        @csrf

        <div class="group">
            <x-input-label for="name" :value="__('Nombre Completo')" class="text-xs font-bold ml-1 text-orange-900/80 dark:text-orange-100" />
            <x-text-input id="name" class="block w-full mt-1 p-3 text-base border-none bg-orange-50/50 dark:bg-gray-800/50 rounded-xl focus:ring-2 focus:ring-orange-500/50 transition-all dark:text-white" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <div class="group">
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-xs font-bold ml-1 text-orange-900/80 dark:text-orange-100" />
            <x-text-input id="email" class="block w-full mt-1 p-3 text-base border-none bg-orange-50/50 dark:bg-gray-800/50 rounded-xl focus:ring-2 focus:ring-orange-500/50 transition-all dark:text-white" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="group">
                <x-input-label for="password" :value="__('Contraseña')" class="text-xs font-bold ml-1 text-orange-900/80 dark:text-orange-100" />
                <x-text-input id="password" class="block w-full mt-1 p-3 text-base border-none bg-orange-50/50 dark:bg-gray-800/50 rounded-xl focus:ring-2 focus:ring-orange-500/50 transition-all dark:text-white" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="group">
                <x-input-label for="password_confirmation" :value="__('Confirmar')" class="text-xs font-bold ml-1 text-orange-900/80 dark:text-orange-100" />
                <x-text-input id="password_confirmation" class="block w-full mt-1 p-3 text-base border-none bg-orange-50/50 dark:bg-gray-800/50 rounded-xl focus:ring-2 focus:ring-orange-500/50 transition-all dark:text-white" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>
        </div>

        <div class="pt-2">
            <button type="submit" class="relative w-full group overflow-hidden rounded-xl p-3 font-black text-white text-lg tracking-widest shadow-lg transition-all">
                <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-amber-500 transition-all group-hover:scale-105"></div>
                <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-white transition-all"></div>
                <span class="relative">REGISTRARME</span>
            </button>
        </div>

        <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 text-center">
            <p class="text-gray-500 dark:text-gray-400 text-xs">
                ¿Ya tienes cuenta? 
                <a href="{{ route('login') }}" class="font-bold text-orange-600 dark:text-orange-400 hover:text-orange-500 hover:underline ml-1">
                    Iniciar Sesión
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>