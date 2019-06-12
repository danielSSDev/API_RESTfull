<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::all();
        return response()->json(['data'=>$produto, 'status'=>true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $produto = Produto::create($dados);
        if($produto)
        {
            return response()->json(['data'=>$produto, 'status'=>true]);
        }else
        {
            return reponse()->json(['data'=>'Erro ao criar Produto', 'status'=>false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if($produto)
        {
            return response()->json(['data'=>$produto, 'status'=>true]);
        }else
        {
            return response()->json(['data'=>'Produto não encontrado', 'status'=>false]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $produto = Produto::find($id);
        $produto->update($dados);

        if($produto)
        {
            return response()->json(['data'=>$produto, 'status'=>true]);
        }else
        {
            return response()->json(['data'=>'Erro ao atualizar Produto', 'status'=>false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if($produto)
        {
            $produto->delete();

            return response()->json(['data'=>'Produto deletado com sucesso', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao deletar produto', 'status'=>false]);
        }
    }
}
