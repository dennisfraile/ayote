  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8">
        <div class=" py-2 inline-block min-w-full align-middle sm:px-6 lg:px-8 ">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="flex justify-between items-center pb-4">
                    <div class=" flex justify-between  items-center pb-4 bg-white px-4 py-3 sm:px-6">
                        <input 
                            wire:model="search"
                            type="text" 
                            id="table-search-users" 
                            class="form-input rounded-md shadow-sm mt-1 block w-full" 
                            placeholder="Buscar">
                        <div class=" flex relative w-64">
                            <select wire:model="perPage" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline ">
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
                    </div>
                </div>
                @if($users->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="items-center">
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Usuario</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Email</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Doble Factor</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Editar</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Eliminar</th>
                        </tr>
                    </thead>
    
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr class="items-center">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded-full" src="{{ $user->profile_photo_url }}"
                                                alt=" {{ $user->name }}">
                                        </div>
        
                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
        
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div class="text-sm leading-5 text-gray-500">{{ $user->email }}</div>
                                </td>
        
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        @if( $user->two_factor_secret == null)
                                            <div class="h-2.5 w-2.5 rounded-full  mr-2 items-center">No</div>
                                        @else:
                                            <div class="h-2.5 w-2.5 rounded-full  mr-2 items-center">Si</div>
                                        @endif
                                    </div>
                                </td>
        
                                <td
                                    class="px-6 py-4 text-sm leading-5  whitespace-no-wrap">
                                    <a  class=" btn btn-primary" href="{{route('users.edit', $user)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    
                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5  whitespace-no-wrap">
                                    <a class=" btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $users->links() }}
                </div>
                @else
                    <div class="bg-white px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6">
                       No hay Resultados para la busqueda: {{ $search }} en la pagina {{ $page }} al mostrar {{ $perPage }} por pagina
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>  

