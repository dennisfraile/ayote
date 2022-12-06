<div class="flex flex-col">
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="-my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8">
        <div class=" py-2 inline-block min-w-full align-middle sm:px-6 lg:px-8 ">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="flex justify-between items-center pb-4">
                    @can('admin.role.create')
                        <a class="bg-transparent hover:bg-green-500 text-green-700 
                            font-semibold hover:text-white py-2 px-4 border border-green-500 
                            hover:border-transparent rounded"
                            href="{{ route('roles.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                              </svg>  
                        </a>
                    @endcan
                    @can('admin.role.index')
                        <div class=" flex justify-between  items-center pb-4 bg-white px-1 py-3 sm:px-4 ">
                            <input 
                                wire:model="search"
                                type="text" 
                                id="table-search-users" 
                                class="form-input rounded-md shadow-sm mt-1 block w-full " 
                                placeholder="Buscar">
                        </div>
                        <div class=" flex relative w-64 px-2 ">
                            <select wire:model="perPage" class="block appearance-none w-full bg-white border border-gray-400 
                                hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight 
                                focus:outline-none focus:shadow-outline ">
                                <option value="5"> 5 por pagina</option>
                                <option value="10"> 10 por pagina</option>
                                <option value="15"> 15 por pagina</option>
                                <option value="25"> 25 por pagina</option>
                                <option value="50"> 50 por pagina</option>
                            </select>
                            @if($search !== '')
                            <button wire:click="clear" class="bg-red hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-md">X</button>
                            @endif
                        </div>
                    @endcan
                </div>
                @if($roles->count())
                @can('admin.role.index')
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="items-center">
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Role</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Creado</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Actualizado</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Editar</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Eliminar</th>
                            </tr>
                        </thead>
        
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($roles as $rol)
                                <tr class="items-center">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium leading-5 text-gray-900">
                                                    {{ $rol->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
            
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div class="text-sm leading-5 text-gray-500">{{ $rol->created_at }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div class="text-sm leading-5 text-gray-500">{{ $rol->updated_at }}</div>
                                    </td>
                                    
                                    @can('admin.user.update')
                                        <td
                                            class="px-6 py-4 text-sm leading-5  whitespace-no-wrap">
                                            <form method="PUTCH" action="{{route('roles.edit',$rol->id)}}">
                                                @csrf
                                                @method('UPDATE')
                                                <button type="submit"  class="bg-transparent hover:bg-orange-500 text-orange-600 
                                                    font-semibold hover:text-white py-2 px-4 border border-orange-500 
                                                    hover:border-transparent rounded" 
                                                    href="{{route('users.edit', $rol)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" 
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 
                                                            16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 
                                                            011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 
                                                            2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 
                                                            2.25 0 015.25 6H10" />
                                                    </svg>
                                                    
                                                </button>
                                            </form>
                                            
                                        </td>
                                    @endcan
                                    @can('admin.user.destroy')
                                        <td
                                            class="px-6 py-4 text-sm leading-5  whitespace-no-wrap">
        
                                            <form method="POST" action="{{route('roles.destroy',$rol->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                
                                                <button type="submit" class="bg-transparent hover:bg-red-500 text-red-700 
                                                    font-semibold hover:text-white py-2 px-4 border border-red-500 
                                                    hover:border-transparent rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" 
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 
                                                            1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 
                                                            2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 
                                                            00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 
                                                            013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 
                                                            0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                            
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $roles->links() }}
                    </div>
                    @else
                        <div class="bg-white px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6">
                        No hay Resultados para la busqueda: {{ $search }} en la pagina {{ $page }} al mostrar {{ $perPage }} por pagina
                        </div>
                    @endif
                @endcan
            </div>
        </div>
    </div>
</div>  


