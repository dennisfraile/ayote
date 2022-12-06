<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class RolesTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = '5';

    protected $queryString = ['search' =>['except' =>''],'perPage'=>['except' =>'5']];

    public function render()
    {
        return view('livewire.roles-table', [
            'roles'=> Role::where('name', 'LIKE', "%{$this->search}%")->paginate($this->perPage)
        ]);
    }
    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
    }
}
