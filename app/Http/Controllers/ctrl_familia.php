<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ctrl_familia extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('search')){
            $items = DB::table('familia')
                ->select('*')
                ->where("desfamilia", "LIKE", "%{$request->get('search')}%")
                ->paginate(5);
        }else{
		  //$items = Item::paginate(5);
          $items = DB::table('familia')->paginate(5);
        }

        return response($items);

        //return \Response::json(\DB::table('familia')->paginate(25));
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
    	$input = $request->all();
        //$create = DB::table('familia')->create($input);
        //return response($create);
        $new_id = DB::select('select max(idfamilia) from familia LIMIT 1')[0]++;
        return [$input, $new_id];
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
    public function buscar(Request $request){
        //return \Response::json($request);
        return \Response::json(['data' => print_r($request, true)]);
        /*
        $desfamilia = $request->input('desfamilia');

        print_r(DB::select('SELECT * FROM familia WHERE desfamilia like "%ACERO%"'));
        */
    }
}
