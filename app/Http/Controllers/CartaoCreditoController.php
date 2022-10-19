<?php

namespace App\Http\Controllers;

use App\Models\CartaoCredito;
use App\Http\Requests\StoreCartaoCreditoRequest;
use App\Http\Requests\UpdateCartaoCreditoRequest;
use Illuminate\Http\Request;

class CartaoCreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartaoCredito = CartaoCredito::simplePaginate(10);

        return response()->json($cartaoCredito);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartaoCreditoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartaoCredito = CartaoCredito::create([
            "nome" => $request->input('nome'),
            "bandeira" => $request->input('bandeira'),
            "limite" => $request->input('limite')
        ]);

        return response()->json([
            "data" => $cartaoCredito
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartaoCredito  $cartaoCredito
     * @return \Illuminate\Http\Response
     */
    public function show(CartaoCredito $cartaoCredito)
    {
        $cartaoCredito = CartaoCredito::find($cartaoCredito);

        if ($cartaoCredito == null) {
            return response()->json([
                "msg" => "Cartão de Crédito não encontrado"
            ], 404);
        }

        return response()->json([
            "data" => $cartaoCredito
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartaoCreditoRequest  $request
     * @param  \App\Models\CartaoCredito  $cartaoCredito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartaoCredito $cartaoCredito)
    {
        $cartaoCredito->nome = $request->input('nome');
        $cartaoCredito->bandeira = $request->input('bandeira');
        $cartaoCredito->limite = $request->input('limite');
        $cartaoCredito->save();

        return response()->json([
            "data" => $cartaoCredito
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartaoCredito  $cartaoCredito
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartaoCredito $cartaoCredito)
    {
        CartaoCredito::destroy($cartaoCredito->id);

        return response()->json([
            "msg" => "O cartão de crédito " . $cartaoCredito->nome . " foi excluído com sucesso!"
        ]);
    }
}
