<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\User;
use Exception;
class LoginController extends Controller
{
    public function formLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
            // href="#signin-modal" data-toggle="modal"
        }


        return view('login.login');
    }

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
            // href="#signin-modal" data-toggle="modal"
        }


        return view('login.login');
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'cpf' => "required|min:11|max:14|unique:users,cpf",
            'cell' => 'required',
            'password' => 'required',
        ];

        $message = [
            'name.required' => 'O nome é obrigatório.',
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

        try {
            DB::beginTransaction();

            $userCreate = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'cell' => $request->cell,
                'cpf' => $request->cpf,
                'rg' => $request->rg,
                'password' => $request->password,
            ]);

            DB::commit();

            $ultimoUsuario = DB::table('users')->latest()->first('id');

            $ultimoUsuarioId = $ultimoUsuario->id;

            Auth::loginUsingId($ultimoUsuarioId);

            return redirect()->route('home')->with([
                'color' => 'success',
                'message' => 'Cadastro efetuado com sucesso. Faça o Login!'
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function login(Request $request)
    {

        if (in_array('', $request->only('email', 'password'))) {
            return redirect()->back()->withInput()->withErrors([
                'message' => 'Oooops, informe todos os dados para efetuar o login!'
            ]);
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->withErrors([
                'message' => 'Oooops, informe um e-mail válido!'
            ]);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withInput()->withErrors([
                'message' => 'Oooops, dados não conferem ou você não tem acesso a essa área!'
            ]);
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
