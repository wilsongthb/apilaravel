<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\catalogo;
use App\familia;

class res_catalogo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type_code = [
            'id' => 'idcatalogo',
            'cod' => 'codigo',
            'nom' => 'nombre',
            'pre' => 'precio',
            'con' => 'contiene',
        ];
        if($request->get('search')){
            // if($request->get('type'))
            //     $type = $type_code[$request->get('type')];
            // else
            //     $type = $type_code['des'];
            // $items = DB::table('catalogo')
            //     ->select('*')
            //     ->where($type, "LIKE", "%{$request->get('search')}%")
            //     ->paginate(5);
        }else{
          $items = DB::table('catalogo')
                // ->select('idcatalogo as id','codigo','nombre','idmedida as medida','precio','idfamilia as familia')
                ->select('*')
                ->paginate(5);
        }

        return response($items);
    }
    public function vista(Request $request){
        // $type_code = [
        //     'id' => 'idcatalogo',
        //     'cod' => 'codigo',
        //     'nom' => 'nombre',
        //     'pre' => 'precio',
        //     'con' => 'contiene',
        // ];
        // if($request->get('search')){
        //     if($request->get('type'))
        //         $type = $type_code[$request->get('type')];
        //     else
        //         $type = $type_code['des'];
        //     $items = DB::table('catalogo')
        //         ->select('*')
        //         ->where($type, "LIKE", "%{$request->get('search')}%")
        //         ->paginate(5);
        // }else{
        //   $items = DB::table('catalogo')->paginate(5);
        // }

        // $items = catalogo::paginate(5);
        $items = catalogo::take(5);

        return "<pre>".print_r($items,true);
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
        return \Response::json(['mensaje'=>'GG WP '.$id]);
    }
}
