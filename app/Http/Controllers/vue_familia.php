<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vue_familia extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('search')){
            $items = \DB::table('familia')
                ->select('*')
                ->where("desfamilia", "LIKE", "%{$request->get('search')}%")
                ->paginate(5);
        }else{
          $items = \DB::table('familia')->paginate(5);
        }

        return response($items);
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
        
        \DB::table('familia')->insert($request->all());
        return response('ok');
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
        \DB::table('familia')
            ->where('idfamilia', $id)
            ->update([
                'codfamilia' => $request->all()['params']['codfamilia'],
                'desfamilia' => $request->all()['params']['desfamilia']
            ]);
        
        return response('ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::table('familia')
            ->where('idfamilia', $id)
            ->delete();
        return response("ok");
    }
}
