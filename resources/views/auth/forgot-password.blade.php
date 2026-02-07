<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-black tracking-tighter text-gray-900 dark:text-white">
            Recuperar <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-600">Acceso</span>
        </h1>
        <p class="mt-2 text-sm font-medium text-orange-800/60 dark:text-orange-200/50 uppercase tracking-widest">
            — Biblioteca Central —
        </p>
    </div>

    <div class="mb-6 text-base text-center text-gray-600 dark:text-gray-300 leading-relaxed">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Escribe tu correo y te enviaremos un enlace para recuperar tu cuenta.') }}
    </div>

    <x-auth-session-status class="mb-4 text-center text-orange-600 font-bold" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <div class="group">
            <x-input-label for="email" value="Correo Electrónico" class="text-sm font-bold ml-1 text-orange-900/80 dark:text-orange-100" />
            <x-text-input id="email" class="block w-full mt-2 p-4 text-lg border-none bg-orange-100/50 dark:bg-gray-800/50 rounded-2xl focus:ring-4 focus:ring-orange-500/30 transition-all dark:text-white" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-2">
            <button type="submit" class="relative w-full group overflow-hidden rounded-2xl p-4 font-black text-white text-lg tracking-widest shadow-xl transition-all">
                <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-amber-500 transition-all group-hover:scale-110"></div>
                <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-white transition-all"></div>
                
                <span class="relative uppercase">{{ __('Enviar Enlace') }}</span>
            </button>
        </div>

        <div class="mt-6 text-center">
            <a class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-orange-600 dark:text-gray-400 dark:hover:text-orange-400 transition-colors duration-300" href="{{ route('login') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al inicio
            </a>
        </div>
    </form>
</x-guest-layout>