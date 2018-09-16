<?php

namespace Serbinario\Http\Controllers;


//meu teste

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Serbinario\Entities\Debito;
use Serbinario\Entities\Debitos;
use Serbinario\Entities\FinBoleto;
use Serbinario\Entities\FinCarne;
use Serbinario\Entities\Cliente;
use Serbinario\Http\Controllers\BoletoFacil\BoletoFacil;
use Serbinario\Http\Controllers\BoletoFacil\BoletoFacilApi;
use Serbinario\Http\Controllers\Controller;
use Serbinario\Entities\FinContasBancaria;
use Serbinario\Entities\FinFormasPagamento;
use Serbinario\Entities\FinLocaisPagamento;
use serbinario\Services\teste;
use Yajra\DataTables\DataTables;
use Exception;

class MeusDadosController extends Controller
{
    public function __construct(BoletoFacilApi $boletoFacilApi)
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the debitos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $id_cliente = Auth::user()->id;
        //$id_cliente = "302";
        $meusDados = Cliente::with('mkProfile')->find($id_cliente);
        //dd($meusDados);

        return view('meusDados.index', compact('meusDados'));
    }



}
