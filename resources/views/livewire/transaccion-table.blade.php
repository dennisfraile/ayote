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
                        <div class="wompi_button_widget" data-url-pago="https://pagos.wompi.sv/IntentoPago/Redirect?id=3af6a906-b524-4fe4-90b3-0bb63b8adba2&esWidget=1" data-render="widget"></div>
                    </div>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="items-center">
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                ID Enlace:</th>
                            
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Producto</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Usable</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Monto</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Enlace</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Eliminar</th>
                        </tr>
                    </thead>
    
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($resultados as $resultado)
                            <tr class="items-center">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>{{ $resultado['idEnlace'] }}</div>
                                </td>
        
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>{{ $resultado['nombreProducto'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>{{ $resultado['usable'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>{{ $resultado['monto'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>{{ $resultado['nombreEnlace'] }}</div>
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
                
            </div>
        </div>
    </div>
</div>  
