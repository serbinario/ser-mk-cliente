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

class DebitosController extends Controller
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
        $debitosPago = \DB::table('fin_debitos')
            ->Join('fin_boletos', 'fin_boletos.id', '=', 'fin_debitos.boleto_id')
            ->Join('fin_status', 'fin_status.id', '=', 'fin_debitos.status_id')
            ->where('mk_cliente_id', '=', $id_cliente)
            ->whereIn('status_id', [2,4])
            ->select([
                'fin_debitos.id',
                'fin_debitos.valor_debito',
                'fin_status.nome as status',
                'fin_debitos.data_pagamento',
                'fin_debitos.valor_pago' ,
                'fin_debitos.data_competencia', 'fin_boletos.link', 'fin_debitos.status_id', 'fin_debitos.boleto_id',
                \DB::raw('DATE_FORMAT(fin_debitos.data_vencimento,"%d/%m/%Y") as data_vencimento'),
            ])->get();

        $debitos = \DB::table('fin_debitos')
            ->Join('fin_boletos', 'fin_boletos.id', '=', 'fin_debitos.boleto_id')
            ->Join('fin_status', 'fin_status.id', '=', 'fin_debitos.status_id')
            ->where('mk_cliente_id', '=', $id_cliente)
            ->whereIn('status_id', [3,7])
            ->select([
                'fin_debitos.id',
                'fin_debitos.valor_debito',
                'fin_status.nome as status',
                'fin_debitos.data_pagamento',
                'fin_debitos.valor_pago' ,
                'fin_debitos.data_competencia', 'fin_boletos.link', 'fin_debitos.status_id', 'fin_debitos.boleto_id',
                \DB::raw('DATE_FORMAT(fin_debitos.data_vencimento,"%d/%m/%Y") as data_vencimento'),
            ])->get();

        return view('debitos.index', compact('debitos', 'debitosPago'));
    }



}
