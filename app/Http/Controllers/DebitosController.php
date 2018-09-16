<?php

namespace Serbinario\Http\Controllers;


//meu teste

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class DebitosController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @param BoletoFacilApi $boletoFacil
     */
    public function __construct()
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
        $cliente_id = Auth::user()->id;
        $debitos = \DB::table('fin_debitos')
            ->Join('mk_clientes', 'mk_clientes.id', '=', 'fin_debitos.mk_cliente_id')
            ->Join('fin_boletos', 'fin_boletos.id', '=', 'fin_debitos.boleto_id')
            ->Join('fin_status', 'fin_status.id', '=', 'fin_debitos.status_id')
            ->where('mk_clientes.id', '=', $cliente_id)
            ->where('fin_debitos.status_id', '=','2')
            ->select([
                'fin_debitos.id', 'fin_debitos.numero_cobranca', 'fin_debitos.valor_debito', 'fin_status.nome as status',
                'fin_debitos.data_vencimento', 'fin_debitos.data_pagamento', 'fin_debitos.valor_pago' , 'mk_clientes.nome',
                'fin_debitos.data_competencia',
                'fin_boletos.link',
                'fin_debitos.status_id', 'fin_debitos.boleto_id',
                \DB::raw('DATE_FORMAT(fin_debitos.data_vencimento,"%d/%m/%Y") as data_vencimento'),
            ])->get();

        $debitosPago = \DB::table('fin_debitos')
            ->Join('mk_clientes', 'mk_clientes.id', '=', 'fin_debitos.mk_cliente_id')
            ->Join('fin_boletos', 'fin_boletos.id', '=', 'fin_debitos.boleto_id')
            ->Join('fin_status', 'fin_status.id', '=', 'fin_debitos.status_id')
            ->whereIn('fin_debitos.status_id', [3,4,7])
            ->where('mk_clientes.id', '=', $cliente_id)
            ->select([
                'fin_debitos.id', 'fin_debitos.numero_cobranca', 'fin_debitos.valor_debito', 'fin_status.nome as status',
                'fin_debitos.data_vencimento', 'fin_debitos.data_pagamento', 'fin_debitos.valor_pago' , 'mk_clientes.nome',
                'fin_debitos.data_competencia', 'fin_boletos.code', 'fin_debitos.status_id', 'fin_debitos.boleto_id',
                'fin_boletos.link',
            ])->get();

        return view('debitos.index', compact('debitos', 'debitosPago'));
    }


}
