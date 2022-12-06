<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Roles
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
                        {!! Form::open(['route'=>'roles.store']) !!}
                            
                            @include('livewire.roles.partials.form')
                            
                            {!! Form::submit('Crear Rol', ['class'=>'bg-blue-500 hover:bg-blue-700 
                                text-white font-bold py-2 px-4 rounded']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>