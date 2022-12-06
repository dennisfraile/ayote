<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Asignar Roles
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
                        <p class="h5">Nombre:</p>
                        <p class="form-control mb-4">{{ $user->name }}</p>
                        <h3 class="mb-4 font-semibold text-gray-900">Listado de Roles</h2>
                        {!! Form::model($user, ['route'=>['users.update', $user], 'method' => 'put']) !!}
                            <ul class="w-48 text-sm font-medium text-gray-900 bg-white dark:text-white">
                                @foreach($roles as $role)
                                    <li class="w-full rounded-t-lg  border-gray-200 dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <label class="py-3 ml-2 w-full text-sm font-medium text-black dark:text-black" >
                                                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'w-4 h-4 text-black-600 bg-gray-100 rounded border border-black-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500']) !!}
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                        
                                    </li>
                                @endforeach
                            </ul>
                            
                            {!! Form::submit('Asignar rol', ['class'=>'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>