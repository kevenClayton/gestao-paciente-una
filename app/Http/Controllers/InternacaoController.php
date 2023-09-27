<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Internacao;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use DateTime;
use Illuminate\Support\Str;

class InternacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DB::table('internacaos')
        ->join('pacientes', 'internacaos.id_paciente', '=', 'pacientes.id_paciente')
        ->join('estabelecimentos', 'internacaos.id_estabelecimento', '=', 'estabelecimentos.id_estabelecimento')
        ->join('setors', 'internacaos.id_setor', '=', 'setors.id_setor')
        ->join('leitos', 'internacaos.id_leito', '=', 'leitos.id_leito')
        ->join('status_internacao', 'internacaos.id_status', '=', 'status_internacao.id_status')
        ->select('internacaos.*', 'pacientes.nome_paciente','estabelecimentos.nome_estabelecimento', 'setors.nome_setor', 'leitos.nome_leito', 'status_internacao.nome_status' )
        ->orderBy('estabelecimentos.nome_estabelecimento', 'desc')
        ->get();

        $estabelecimento = DB::table('estabelecimentos')->get();
        $setor = DB::table('setors')->get();

        return view('internacao.index', [
            'pacientes'         => $dados,
            'estabelecimentos'  => $estabelecimento,
            'setores'           => $setor
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = DB::table('pacientes')->get();
        $estabelecimentos = DB::table('estabelecimentos')->get();
        $setores = DB::table('setors')->get();
        $status = DB::table('status_internacao')->get();

        return view('internacao.create',[
            'pacientes'        =>  $pacientes,
            'estabelecimentos' =>  $estabelecimentos ,
            'setores'          =>  $setores,
            'status'          =>  $status,

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
       $dados = $request->all();

       try {

        DB::beginTransaction();

        Internacao::create($dados);

        DB::commit();

        return redirect()->route('internacao.index');

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

    public function dadosClinicos($idInternacao){

        $dados = DB::table('dados_clinicos')
        ->where('id_internacao', '=', $idInternacao)
        ->get();

        $internacao = DB::table('internacaos')
        ->where('id_internacao', '=', $idInternacao)
        ->join('pacientes', 'internacaos.id_paciente', '=', 'pacientes.id_paciente')
        ->get();

        // $paciente = DB::table('internacaos')
        // ->join('pacientes', 'internacaos.id_paciente', '=', 'pacientes.id_paciente')
        // ->join('estabelecimentos', 'internacaos.id_estabelecimento', '=', 'estabelecimentos.id_estabelecimento')
        // ->join('setors', 'internacaos.id_setor', '=', 'setors.id_setor')
        // ->join('leitos', 'internacaos.id_leito', '=', 'leitos.id_leito')
        // ->select('internacaos.*', 'pacientes.nome_paciente','estabelecimentos.nome_estabelecimento', 'setors.nome_setor', 'leitos.nome_leito' )
        // ->orderBy('estabelecimentos.nome_estabelecimento', 'desc')
        // ->get();

        return view('internacao.dados-clinicos',[
            'dadosClinicos' => $dados,
            'internacao' => $internacao,

        ]);

    }
}
