<?php

namespace App\Http\Controllers;

use App\Models\Livros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livro = DB::select('select * from livros');
        return response()->json($livro);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $livrosData = $request->only('nome','categoria','codigo','autor','ebook','tamanho_arquivo','peso');
        $data_merge = array_merge(['pessoas_id'=>auth()->user()->pessoas_id],$livrosData);
        $livros = Livros::create($data_merge);
        return response()->json([
            'livro_id' => $livros->id,
            'mensagem'=>"Operação efectuado com sucesso!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = DB::select('select * from livros where id = :id', ['id' => $id]);
        if(is_null($livro)){
            return response()->json("Item não encontrado");
        }
        return response()->json($livro);
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
        $livrosData = $request->only('nome','categoria','codigo','autor','ebook','tamanho_arquivo','peso');
        $livro = Livros::where("id", $id)->update($livrosData);
        if($livro==0){
            return response()->json("Item não encontrado");
        }
        return response()->json([
            'mensagem'=>"Operação efectuado com sucesso!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = DB::delete('delete from livros where id = ?', [$id]);
        if($livro==0){
            return response()->json("Item não encontrado");
        }
        return response()->json("Operação efectuado com sucesso!");
    }
}
