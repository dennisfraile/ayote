<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class transaccionT extends PowerGridComponent
{
    public string $primaryKey = 'idTransaccion';
    public string $sortField = 'idTransaccion';
    //Custom per page
    public int $perPage = 5;

    //Custom per page values
    public array $perPageValues = [0, 5, 10, 20, 50];
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Collection
    {
        $token = getToken('f78c7fe4-9989-4e7a-a2b8-ee24cf8857c0','6a0cf79a-dc0f-41dd-b1e5-ede29de67509');
        $result = getDataApi('https://api.wompi.sv/EnlacePago',$token);
            
            //dump($result);
            $tr = collect();
            
            foreach ($result as $enlace)
            {
                //dump('Transacciones nulas:');
                //dump($enlace['transacciones']);
                
                    
                    if ($enlace['transacciones']==[])
                    {   
                        $tr->add([
                            'idEnlace'=> $enlace['idEnlace'],
                            'nombreEnlace'=>$enlace['nombreEnlace'],
                            'idTransaccion'=>'no posee',
                            'fechaTransaccion'=>Carbon::parse('1-01-0001')->format('Y-m-d'),
                            'Nombre'=>'no posee transaccion',
                            'Celular'=>'null',
                            'EMail' =>'null',
                            'Direccion'=>'null',
                            'monto'=>'null',
                            'formaPago'=>'null',
                        ],);
                    }else{
                        foreach ($enlace['transacciones'] as $resultado)
                        {
                        $tr->add([
                            'idEnlace'=> $enlace['idEnlace'],
                            'nombreEnlace'=>$enlace['nombreEnlace'],
                            'idTransaccion'=>$resultado['idTransaccion'],
                            'fechaTransaccion'=>Carbon::parse($resultado['fechaTransaccion'])->format('Y-m-d'),
                            'Nombre'=>$resultado['datosAdicionales']['Nombre'],
                            'Celular'=>$resultado['datosAdicionales']['Celular'],
                            'EMail' =>$resultado['datosAdicionales']['EMail'],
                            'Direccion'=>$resultado['datosAdicionales']['Direccion'],
                            'monto'=>$resultado['monto'],
                            'formaPago'=>$resultado['formaPago'],
                        ],); 
                    }
                }
            }
            
        return $tr;
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox('idTransaccion');
        //$this->persist(['columns', 'filters']);
        return [
            Exportable::make('Transacciones')
                ->striped('A6ACCD')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showSearchInput()
                ->showToggleColumns()
                ->includeViewOnTop('components.datatable.header-top'),
            Footer::make()
                ->showPerPage($this->perPage, $this->perPageValues)
                ->showRecordCount()
                ->includeViewOnTop('components.datatable.footer-top'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('idEnlace')
            ->addColumn('nombreEnlace')
            ->addColumn('idTransaccion')
            ->addColumn('fechaTransaccion')
            ->addColumn('Nombre')
            ->addColumn('Celular')
            ->addColumn('EMail')
            ->addColumn('Direccion')
            ->addColumn('monto')
            ->addColumn('formaPago')
            ;
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |

    */
     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make(title:'ID enlace', field:'idEnlace')
                ->sortable(),
            Column::make(title:'Enlace', field:'nombreEnlace')
                ->searchable(),
            Column::make(title:'ID transaccion', field:'idTransaccion')
                ->sortable(),

            Column::make(title:'Fecha', field:'fechaTransaccion')
                ->sortable()
                ->searchable()
                ->makeInputDatePicker('fechaTransaccion'),

            Column::make(title:'Nombre', field:'Nombre')
                ->searchable(),

            Column::make(title:'Celular', field:'Celular'),
            
            Column::make(title:'Email', field:'EMail'),

            Column::make(title:'Direccion', field:'Direccion'),

            Column::make(title:'Monto', field:'monto'),

            Column::make(title:'Forma de pago', field:'formaPago')
                ->searchable(),
        ];
    }
    
}
