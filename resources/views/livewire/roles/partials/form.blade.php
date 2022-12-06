<div class="w-full max-w-lg">
    {!! Form::label('name','name') !!}
    {!! Form::text('name', null, ['class'=>'appearance-none block w-full 
        bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight 
        focus:outline-none focus:bg-white', 'placeholder'=>'Ingrese el nombre del rol'
    ]) !!}
    @error('name')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<h2 class="h3">Listado de permisos</h2>
@foreach($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, 
                ['class'=>'w-4 h-4 text-black-600 bg-gray-100 rounded border border-black-300 
                    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 
                    focus:ring-2 dark:bg-gray-600 dark:border-gray-500'
                ]) 
            !!}
            {{ $permission->description }}
        </label>
    </div>
@endforeach