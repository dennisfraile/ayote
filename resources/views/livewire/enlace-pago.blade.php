<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8">
        <div class=" py-2 inline-block min-w-full align-middle sm:px-6 lg:px-8 ">
            
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="flex justify-between items-center pb-4">
                        <div class=" flex justify-between  items-center pb-4 bg-white px-1 py-3 sm:px-4 ">
                            <input 
                                wire:model="search"
                                type="text" 
                                id="table-search-transacciones" 
                                class="form-input rounded-md shadow-sm mt-1 block w-full " 
                                placeholder="Buscar">
                        </div>
                        <div class=" flex relative w-64 px-2 ">
                            <select wire:model="perPage" class="block appearance-none w-full bg-white border 
                                border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight 
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
                </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="items-center">
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Id Enlace</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Nombre del producto</th>
                                
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Realizar Transaccion sobre:</th>
                                
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Info del producto</th>
                                
                            </tr>
                        </thead>
        
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($result as $resultado)
                                <tr class="items-center">
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div>{{ $resultado['idEnlace'] }}</div>
                                    </td> 
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div>{{ $resultado['nombreProducto'] }}</div>
                                    </td> 
                                    
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        
                                          
                                            <a href="{{ $resultado['urlEnlace'] }}" target="_blank" rel="noreferrer noopener"
                                            class="bg-indigo-500 hover:bg-indigo-400 border-b-4 border-indigo-700 
                                            hover:border-indigo-500 text-white text-white text-center py-2 px-4 rounded
                                            inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 ">
                                            <path stroke-linecap="round" stroke-linejoin="round" 
                                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 
                                                0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 
                                                0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                            {{ $resultado['nombreProducto']  }} 
                                            
                                        </a>
                                        
                                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div>{{ $resultado['infoProducto'] }}</div>
                                    </td>       
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>  