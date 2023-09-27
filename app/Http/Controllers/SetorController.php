<?php

namespace App\Http\Controllers;

use App\Estabelecimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Setor;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dados = DB::table('setors')
        ->join('estabelecimentos', 'setors.id_estabelecimento', '=', 'estabelecimentos.id_estabelecimento')
        ->select('setors.*', 'estabelecimentos.nome_estabelecimento')
        ->get();
// dd($dados);
       return view('setor.index', [
           'setores' => $dados
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estabelecimentos = DB::table('estabelecimentos')->get();

        return view('setor.create', [
            'estabelecimentos'=>  $estabelecimentos
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

            Setor::create($dados);

            DB::commit();

           return redirect()->route('home');

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

    public function listaSetores($idEstabelecimento){

       $setores = DB::table('setors')
        ->where('id_estabelecimento', '=', $idEstabelecimento)
        ->get();

        return $setores;
    }
}
