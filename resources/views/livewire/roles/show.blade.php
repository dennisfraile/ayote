<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mostrar rol
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(session('info'))
                    <div class="alert alert-success">
                        <strong>{{ session('info') }}</strong>
                    </div>
                @endif
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <div class="card-body px-6 py-4">
                        <h1>{{ $role->id }}</h1>
                        <h2>{{ $role->name }}</h2>
                    </div>
                <div class="flex justify-between items-center pb-4">
                        <a class="bg-transparent hover:bg-green-500 text-green-700 
                            font-semibold hover:text-white py-2 px-4 border border-green-500 
                            hover:border-transparent rounded" 
                            href="{{ route('roles.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>         
                        </a>
                </div>    
                
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>