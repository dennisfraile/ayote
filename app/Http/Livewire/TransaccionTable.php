<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\Transaccion;
use Nette\Utils\Arrays;
use PhpParser\Node\Expr\Cast\Array_;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class TransaccionTable extends Component
{
    use WithPagination;

    public $search = '';
    public $fecha = '';
    public $perPage = '5';

    protected $queryString = ['search' =>['except' =>''],'perPage'=>['except' =>'5']];

    public function render()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://id.wompi.sv/connect/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "grant_type=client_credentials&client_id=f78c7fe4-9989-4e7a-a2b8-ee24cf8857c0&client_secret=6a0cf79a-dc0f-41dd-b1e5-ede29de67509&audience=wompi_api",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } 
        
        $array= json_decode($response,true);
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.wompi.sv/TransaccionCompra",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer ".$array['access_token'],
            "content-type: application/json"
        ),
        ));

        $t = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } 
        
        
        $transacciones = json_decode($t,true);
        
        $resultados = $transacciones['resultado'];
        $trans = Collect($resultados);
        dump($trans);
        return view('livewire.transaccion-table',compact('trans'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
    }

   
}
