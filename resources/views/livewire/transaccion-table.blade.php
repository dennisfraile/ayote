<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8">
        <div class=" py-2 inline-block min-w-full align-middle sm:px-6 lg:px-8 ">
            
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="flex justify-between items-center pb-4">
                    @can('user.transaccion.informe')
                        <a href="#" class="bg-indigo-500 hover:bg-indigo-400 border-b-4 border-indigo-700 
                            hover:border-indigo-500 text-white text-white text-center py-2 px-4 rounded">
                            Generar Informe en PDF
                        </a>
                    @endcan
                    @can('user.transaccion.dashboard')
                        <div class=" flex justify-between  items-center pb-4 bg-white px-1 py-3 sm:px-4 ">
                            <input 
                                wire:model="search"
                                type="text" 
                                id="table-search-transacciones" 
                                class="form-input rounded-md shadow-sm mt-1 block w-full " 
                                placeholder="Buscar">
                        </div>
                        <div class=" flex justify-between  items-center pb-4 bg-white px-1 py-3 sm:px-4 ">
                            <label for="fechaini">Fecha Inicio</label>
                            <input 
                                wire:model="fecha"
                                type="date" 
                                id="fechaini" 
                                class="form-input rounded-md shadow-sm mt-1 block w-full " 
                                placeholder="Fecha inicio">
                        </div>
                        <div class=" flex justify-between  items-center pb-4 bg-white px-1 py-3 sm:px-4 ">
                            <label for="fechafin">Fecha final</label>
                            <input 
                                wire:model="fecha"
                                type="date" 
                                id="fechafin" 
                                class="form-input rounded-md shadow-sm mt-1 block w-full " 
                                placeholder="Fecha final">
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
                    @endcan 
                </div>
                @can('user.transaccion.dashboard')
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="items-center">
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    ID de transaccion</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Fecha de la transaccion</th>
                                
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Cliente</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Celular</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Direccion</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Monto</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500
                                     uppercase border-b border-gray-200 bg-gray-50">
                                    Forma de pago</th>
                            </tr>
                        </thead>
        
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($trans as $resultado)
                                <tr class="items-center">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div>{{ $resultado['idTransaccion'] }}</div>
                                    </td>
            
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div>{{ date('d-m-Y',strtotime($resultado['fechaTransaccion']))  }}</div>
                                    </td> 
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div>{{ $resultado['datosAdicionales']['Nombre'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div>{{ $resultado['datosAdicionales']['Celular'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div>{{ $resultado['datosAdicionales']['EMail'] }}</div>
                                    </td>      
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div>{{ $resultado['datosAdicionales']['Direccion'] }}</div>
                                    </td>    
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div>{{ $resultado['monto'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap ">
                                        <div>{{ $resultado['formaPago'] }}</div>
                                    </td>
            
                                </tr>
                            @endforeach
                            <tr class="items-center">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>0001</div>
                                </td>
        
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>19-10-2022</div>
                                </td> 
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>Juan</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>79864790</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>juan@hotmail.com</div>
                                </td>      
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>lejos</div>
                                </td>    
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>50</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>efectivo</div>
                                </td>
        
                            </tr>
                            <tr class="items-center">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>0021</div>
                                </td>
        
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>1-10-2022</div>
                                </td> 
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>gabriel</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>79864790</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>gabriel@hotmail.com</div>
                                </td>      
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>lejos</div>
                                </td>    
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>5</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>efectivo</div>
                                </td>
        
                            </tr>
                            <tr class="items-center">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>0031</div>
                                </td>
        
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>30-10-2022</div>
                                </td> 
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>steven</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>79864790</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>steven@hotmail.com</div>
                                </td>      
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>lejos</div>
                                </td>    
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>60</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>efectivo</div>
                                </td>
        
                            </tr>
                            <tr class="items-center">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>0041</div>
                                </td>
        
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>25-11-2022</div>
                                </td> 
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>David</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>79864790</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>david@hotmail.com</div>
                                </td>      
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>lejos</div>
                                </td>    
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>180</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div>efectivo</div>
                                </td>
        
                            </tr>
                        </tbody>
                    </table>
                @endcan
            </div>
        </div>
    </div>
</div>  
