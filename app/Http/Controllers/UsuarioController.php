<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = DB::table('status_usuarios')
        ->get();
        $dadosPerfil = DB::table('perfis')
        ->get();

        return view('usuario.create', [
            'statusPaciente'=> $dados,
            'perfis'=> $dadosPerfil
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function registrarUsuario(Request $request)
    {

        $rules = [
            'nome' => 'required',
            'email' => 'required|email|unique:users,email',
            'cpf' => "required|min:11|max:14|unique:users,cpf",
            'password' => 'required',
        ];

        $message = [
            'nome.required' => 'O nome é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Esse e-mail já está cadastrado.',
            'cpf.unique' => 'Esse CPF já possui cadastrado.',
            'password.required' => 'A senha é obrigatória.',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $dados = $request->all();

        try {
            DB::beginTransaction();

            // $userCreate = User::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'cell' => $request->cell,
            //     'cpf' => $request->cpf,
            //     'rg' => $request->rg,
            //     'password' => $request->password,
            // ]);

            User::create($dados);

            DB::commit();

            $ultimoUsuario = DB::table('users')->latest()->first('id');

            $ultimoUsuarioId = $ultimoUsuario->id;

            Auth::loginUsingId($ultimoUsuarioId);

            return redirect()->route('home')->with([
                'color' => 'success',
                'message' => 'Cadastro efetuado com sucesso. Faça o Login!'
            ]);

        } catch (Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }

}
