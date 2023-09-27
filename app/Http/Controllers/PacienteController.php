<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Paciente;
use App\Endereco;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DB::table('pacientes')->get();
        $estabelecimento = DB::table('estabelecimentos')->get();

        return view('paciente.index',[
            'pacientes'=>$dados,
            'estabelecimentos'=> $estabelecimento
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    public function cadastroRapido()
    {
        dd('teste');
        return view('paciente.cadastro-rapido');
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

    try {

        DB::beginTransaction();

        Paciente::create($dados);

        DB::commit();

        $ultimoRegistro = DB::table('pacientes')->latest()->first('id_paciente');

        $dados['id_paciente'] = $ultimoRegistro->id_paciente;

        $this->cadastrarEndereco($dados);

        return redirect()->route('home');

    } catch (Exception $e) {
        DB::rollback();

        return redirect()->back()->withInput()->withErrors([
            'message' => $e->getMessage()
        ]);

    }
    }

    public function cadastrarEndereco($dados){
        try {

            DB::beginTransaction();

            Endereco::create($dados);

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);

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
        $dados = DB::table('pacientes')
        ->where('id_paciente','=', $id )
        ->get();

        $endereco = DB::table('enderecos')
        ->where('id_paciente','=', $id )
        ->get();

// dd($endereco);
        return view('paciente.show', [
            'paciente' => $dados[0],
            'endereco' => $endereco[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $dados = DB::table('pacientes')->
        where('id_paciente', '=', $id)->get();

        return view('paciente.edit',[
            'dadosPagina'=>$dados[0],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_paciente)
    {
            // dd($request);


            $rules = [
                'nome_paciente' => 'required',
                'email_paciente' => 'required|email|unique:users,email',
                'cpf_paciente' => "required|min:11|max:14|unique:users,cpf",
            ];

            $message = [
                'nome_paciente.required' => 'O nome é obrigatório.',
                'email_paciente.required' => 'O email é obrigatório.',
                'email_paciente.email' => 'Informe um e-mail válido.',
                'email_paciente.unique' => 'Esse e-mail já está cadastrado.',
                'cpf.unique' => 'Esse CPF já possui cadastrado.',
            ];

            $validator = Validator::make($request->all(), $rules, $message);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }



            try {

                DB::beginTransaction();

                $dados = $request->all();

                $usuario = DB::table('pacientes')
                    ->where('id_paciente', '=', $id_paciente)
                    ->get();

                $retorno =  DB::table('pacientes')
                ->where('id_paciente', $usuario[0]->id_paciente)
                ->update([
                    'nome_paciente'             => $dados['nome_paciente'],
                    'celular_paciente'          => $dados['celular_paciente'],
                    'cpf_paciente'              => $dados['cpf_paciente'],
                    'telefone_paciente'         => $dados['telefone_paciente'],
                    'contato_paciente_nome'     => $dados['contato_paciente_nome'],
                    'contato_paciente_telefone' => $dados['contato_paciente_telefone'],
                    'email_paciente'            => $dados['email_paciente'],
                    'nome_pai'                  => $dados['nome_pai'],
                    'nome_mae'                  => $dados['nome_mae'],
                    'naturalidade_paciente'     => $dados['naturalidade_paciente'],
                    'nacionalidade_paciente'    => $dados['nacionalidade_paciente'],
                    'plano_saude'               => $dados['plano_saude'],
                    'data_nascimento'           => $dados['data_nascimento'],
                ]);

                $retorno =  DB::table('enderecos')
                ->where('id_paciente', $usuario[0]->id_paciente)
                ->update([
                    'endereco'          => $dados['endereco'],
                    'numero'            => $dados['numero'],
                    'cep'               => $dados['cep'],
                    'cidade'            => $dados['cidade'],
                    'pais'              => $dados['pais'],
                    'bairro'            => $dados['bairro'],
                    'complemento'       => $dados['complemento'],
                    'tipo_endereco'     => $dados['tipo_endereco'],
                ]);

                DB::commit();

                return redirect()->route('paciente.show',['paciente'=>$usuario[0]->id_paciente])->with([
                    'color' => 'success',
                    'message' => 'Atualização efetuada com sucesso.'
                ]);

        }catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
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
        //
    }
}



