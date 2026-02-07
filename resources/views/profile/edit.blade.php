<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between px-2">
            <h2 class="font-black text-3xl text-gray-900 dark:text-white leading-tight tracking-tight flex items-center gap-3 drop-shadow-2xl">
                <span>
                    Configuración de <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-400 drop-shadow-lg">Perfil</span>
                </span>
            </h2>
            <div class="hidden sm:block text-xs font-black text-orange-900 dark:text-white uppercase tracking-widest bg-white/[0.01] dark:bg-white/[0.02] px-4 py-2 rounded-full backdrop-blur-[30px] border border-white/[0.08] shadow-2xl">
                Cuenta de Usuario
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- Tarjeta 1: Información del Perfil --}}
            <div class="p-8 sm:p-12 bg-white/[0.005] dark:bg-white/[0.01] backdrop-blur-[60px] rounded-[3.5rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1)] border border-white/[0.05] dark:border-white/[0.02] relative overflow-hidden group hover:backdrop-blur-[80px] transition-all duration-700">
                {{-- Decoración de luz --}}
                <div class="absolute -right-20 -top-20 h-[400px] w-[400px] rounded-full bg-orange-500/[0.03] blur-[80px] group-hover:bg-orange-500/[0.06] transition-all duration-1000"></div>
                
                <div class="relative z-10 max-w-xl">
                    <h3 class="text-xl font-black text-gray-900 dark:text-white uppercase tracking-widest drop-shadow-lg mb-4">
                        Datos Personales
                    </h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Tarjeta 2: Contraseña --}}
            <div class="p-8 sm:p-12 bg-white/[0.005] dark:bg-white/[0.01] backdrop-blur-[60px] rounded-[3.5rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1)] border border-white/[0.05] dark:border-white/[0.02] relative overflow-hidden group hover:backdrop-blur-[80px] transition-all duration-700">
                {{-- Decoración de luz --}}
                <div class="absolute -left-20 -bottom-20 h-[400px] w-[400px] rounded-full bg-amber-500/[0.03] blur-[80px] group-hover:bg-amber-500/[0.06] transition-all duration-1000"></div>

                <div class="relative z-10 max-w-xl">
                    <h3 class="text-xl font-black text-gray-900 dark:text-white uppercase tracking-widest drop-shadow-lg mb-4">
                        Seguridad
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Tarjeta 3: Eliminar Cuenta (Con tinte rojo sutil) --}}
            <div class="p-8 sm:p-12 bg-red-500/[0.01] dark:bg-red-500/[0.02] backdrop-blur-[60px] rounded-[3.5rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1)] border border-red-500/[0.1] dark:border-red-500/[0.05] relative overflow-hidden group hover:backdrop-blur-[80px] transition-all duration-700">
                
                <div class="relative z-10 max-w-xl">
                    <h3 class="text-xl font-black text-red-600 dark:text-red-400 uppercase tracking-widest drop-shadow-lg mb-4">
                        Zona de Peligro
                    </h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>