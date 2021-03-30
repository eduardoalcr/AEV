<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks');
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
        $enunciado = $request->get("enun");
        $materia = $request->get("materia");
        $correcao = $request->get("correcao");

        $qa = $request->get("qa");
        $qb = $request->get("qb");
        $qc = $request->get("qc");
        $qd = $request->get("qd");
        $qe = $request->get("qe");



        DB::table('enunciados')->insert([
            ['enu_nome' => $enunciado, 'enu_correcao' => $correcao, 'enu_mat_codigo' => $materia]
        ]);

        $ultimos = DB::select('SELECT * FROM enunciados ORDER BY enu_codigo DESC LIMIT 1');
        
        foreach ($ultimos as $ultimo) {
             $ultimodos = $ultimo->enu_codigo;
        }
        DB::table('alternativas')->insert([
            ['alt_nome' => $qa, 'alt_enu_codigo' => $ultimodos],['alt_nome' => $qb, 'alt_enu_codigo' => $ultimodos],['alt_nome' => $qc, 'alt_enu_codigo' => $ultimodos],['alt_nome' => $qd, 'alt_enu_codigo' => $ultimodos],['alt_nome' => $qe, 'alt_enu_codigo' => $ultimodos]
       ]); 
        


        return view('dashboard');

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
        DB::table('alternativas')->where('alt_enu_codigo', $id)->delete();
        DB::table('enunciados')->where('enu_codigo', $id)->delete();

        return redirect('/tasks')->with('msg','A questão foi excluída com sucesso!');
    }
}
