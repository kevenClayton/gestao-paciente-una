<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Estabelecimento;

use Exception;

class EstabelecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DB::table('estabelecimentos')
        ->join('tipo_estabelecimentos', 'estabelecimentos.id_tipo_estabelecimento', '=', 'tipo_estabelecimentos.id_tipo_estabelecimento')
        ->select('estabelecimentos.*', 'tipo_estabelecimentos.nome_tipo_estab')
        ->get();
// dd($dados);
        return view('estabelecimento.index', [
            'estabelecimentos' => $dados
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposEstabelecimentos = DB::table('tipo_estabelecimentos')->get();

        return view('estabelecimento.create',[
            'tipoEstabelecimento' =>$tiposEstabelecimentos
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

            Estabelecimento::create($dados);

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
}
