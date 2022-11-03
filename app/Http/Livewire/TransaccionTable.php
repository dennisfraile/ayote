<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\Transaccion;
use Psy\Readline\Hoa\Console;

class TransaccionTable extends Component
{
    use WithPagination;

    public $search = '';
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
        CURLOPT_POSTFIELDS => "grant_type=client_credentials&client_id=97a4dfea-a9df-4d1e-94a0-98f1928fea36&client_secret=9a255b22-6628-447c-905e-e2af397e5f53&audience=wompi_api",
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
        CURLOPT_URL => "https://api.wompi.sv/EnlacePago",
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
        
        
        return view('livewire.transaccion-table',compact('resultados'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
    }
}
