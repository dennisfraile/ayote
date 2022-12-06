<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class EnlacePago extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = '5';

    protected $queryString = ['search' =>['except' =>''],'perPage'=>['except' =>'5']];
    
    public function render()
    {
        $token = getToken('f78c7fe4-9989-4e7a-a2b8-ee24cf8857c0','6a0cf79a-dc0f-41dd-b1e5-ede29de67509');
        $result = getDataApi('https://api.wompi.sv/EnlacePago',$token);
        return view('livewire.enlace-pago',compact('result'));
       
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
    }
}
