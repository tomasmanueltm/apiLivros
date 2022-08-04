<?php

namespace App\Http\Controllers;

use App\Models\Pessoas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PessoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store','index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pessoaData = $request->only('nome','idade','sexo');
        $userData = $request->only('email','password');

        $pessoa = Pessoas::create($pessoaData);
        $user = new User();

        $user->pessoas_id = $pessoa->id;
        $user->email = $userData['email'];
        $user->password = Hash::make($userData['password']);
        $user->save();


        return response()->json([
            'pessoa_id' => $pessoa->id,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
