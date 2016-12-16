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
        $type_code = [
            'id' => 'idfamilia',
            'cod' => 'codfamilia',
            'des' => 'desfamilia'
        ];
        if($request->get('search')){
            if($request->get('type'))
                $type = $type_code[$request->get('type')];
            else
                $type = $type_code['des'];
            $items = DB::table('familia')
                ->select('*')
                ->where($type, "LIKE", "%{$request->get('search')}%")
                ->paginate(5);
        }else{
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
        $new_id = DB::select('select max(idfamilia) as maximo from familia LIMIT 1')[0]['maximo'];
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
        if(DB::table('familia')
            ->where('idfamilia', $id)
            ->update([
                'codfamilia' => $request->get('codigo'),
                'desfamilia' => $request->get('descripcion')
            ])
        ){
            return \Response::json(['codigo'=>'200']);
        }else{
            return \Response::json(['codigo'=>'300']);
        };
         
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
    public function delete($id){
        DB::table('familia')->where('idfamilia', '=', $id)->delete();
        return \Response::json(['codigo'=>'200']);
    }
    public function crear(Request $request){
        $id = $request->get('id');
        $cod = $request->get('codigo');
        $des = $request->get('descripcion');
        DB::table('familia')->insert([
            'idfamilia' => $id,
            'codfamilia' => $cod,
            'desfamilia' => $des
        ]);
        return \Response::json(['codigo'=>'200']);
    }
}
