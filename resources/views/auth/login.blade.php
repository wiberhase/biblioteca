<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-black tracking-tight text-gray-900 dark:text-white">
            Biblioteca <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-600">Central</span>
        </h1>
        <p class="mt-2 text-sm font-medium text-orange-800/70 dark:text-orange-200/60 uppercase tracking-widest">
            — Acceso —
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div class="group">
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-xs font-bold ml-1 text-orange-900/80 dark:text-orange-100" />
            <x-text-input id="email" class="block w-full mt-1 p-3 text-base border-none bg-orange-50/50 dark:bg-gray-800/50 rounded-xl focus:ring-2 focus:ring-orange-500/50 transition-all dark:text-white" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="group">
            <x-input-label for="password" :value="__('Contraseña')" class="text-xs font-bold ml-1 text-orange-900/80 dark:text-orange-100" />
            <x-text-input id="password" class="block w-full mt-1 p-3 text-base border-none bg-orange-50/50 dark:bg-gray-800/50 rounded-xl focus:ring-2 focus:ring-orange-500/50 transition-all dark:text-white" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="flex items-center justify-between px-1">
            <label for="remember_me" class="flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="w-4 h-4 text-orange-500 border-none rounded bg-orange-100 dark:bg-gray-800 focus:ring-orange-500" name="remember">
                <span class="ml-2 text-xs font-bold text-gray-600 dark:text-gray-400 uppercase">{{ __('Recordarme') }}</span>
            </label>
            
            @if (Route::has('password.request'))
                <a class="text-xs font-bold text-orange-600 dark:text-orange-400 hover:text-orange-500 hover:underline" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste?') }}
                </a>
            @endif
        </div>

        <div class="pt-2">
            <button type="submit" class="relative w-full group overflow-hidden rounded-xl p-3 font-black text-white text-lg tracking-widest shadow-lg transition-all">
                <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-amber-500 transition-all group-hover:scale-105"></div>
                <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-white transition-all"></div>
                <span class="relative">INGRESAR</span>
            </button>
        </div>

        <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 text-center">
            <p class="text-gray-500 dark:text-gray-400 text-xs">
                ¿Nuevo aquí? 
                <a href="{{ route('register') }}" class="font-bold text-orange-600 dark:text-orange-400 hover:text-orange-500 hover:underline ml-1">
                    Crear cuenta
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>