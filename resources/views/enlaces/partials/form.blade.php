<div class="w-full max-w-lg">
    {!! Form::label('name','Nombre del enlace de pago') !!}
    {!! Form::text('name', null, ['class'=>'appearance-none block w-full 
        bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight 
        focus:outline-none focus:bg-white', 'placeholder'=>'Ingrese el nombre del enlace'
    ]) !!}
    {!! Form::label('producto','Producto') !!}
    {!! Form::text('producto', null, ['class'=>'appearance-none block w-full 
        bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight 
        focus:outline-none focus:bg-white', 'placeholder'=>'Ingrese el nombre del producto'
    ]) !!}
    {!! Form::label('monto','Monto') !!}
    {!! Form::text('monto', null, ['class'=>'appearance-none block w-full 
        bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight 
        focus:outline-none focus:bg-white', 'placeholder'=>'Ingrese el monto del producto'
    ]) !!}
    @error('name')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<h2 class="h3">Listado de aplicativos</h2>
@foreach($result as $aplicativo)
    <div>
        <label>
            {!! Form::radio('aplicativo', $aplicativo['idAplicativo'], null, 
                ['class'=>'w-4 h-4 text-black-600 bg-gray-100 rounded border border-black-300 
                    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 
                    focus:ring-2 dark:bg-gray-600 dark:border-gray-500'
                ]) 
            !!}
            {{ $aplicativo['nombreAplicativo'] }}
        </label>
    </div>
@endforeach