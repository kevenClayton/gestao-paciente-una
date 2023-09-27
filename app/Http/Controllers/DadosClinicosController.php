<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DadosClinicos;
use Exception;
class DadosClinicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DB::table('dados_clinicos')
        ->get();


        return view('dados-clinicos.index',[
            'dadosClinicos' =>  $dados,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idInternacao)
    {
        $internacao = DB::table('internacaos')
        ->where('id_internacao', '=', $idInternacao)
        ->join('pacientes', 'internacaos.id_paciente', '=', 'pacientes.id_paciente')
        ->get();

        return view('dados-clinicos.create', [
            'internacao' =>   $internacao,
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

        DadosClinicos::create($dados);

        DB::commit();

        return redirect()->route('dados-clinicos.index');

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
}
