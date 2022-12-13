<?php

namespace App\Http\Controllers;

use App\Models\tb_m_client;
use Illuminate\Http\Request;

class TbMClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index',[
             'tb_m_clients' =>tb_m_client::latest()->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create',[
            'tb_m_clients' =>tb_m_client::all()

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
        $validatedData=$request->validate([
            'client_name' => 'required',
            'client_address'=>'required',
        ]);

        tb_m_client::create($validatedData);
        return redirect('/client')->with('pesan','Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_m_client  $tb_m_client
     * @return \Illuminate\Http\Response
     */
    public function show(tb_m_client $tb_m_client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_m_client  $tb_m_client
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_m_client $tb_m_client, $id)
    {
         return view('client.edit', [
            'tb_m_clients' =>$tb_m_client::find($id),
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_m_client  $tb_m_client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_m_client $tb_m_client, $id)
    {
        $validatedData=$request->validate([
             'client_name' =>'required',
            'client_address' =>'required'
        ]);

        tb_m_client::where('id',$id)->update($validatedData);
        return redirect('/client')->with('pesan','Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_m_client  $tb_m_client
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_m_client $tb_m_client, $id)
    {
        tb_m_client::destroy($id);
        return redirect('/client')->with('pesan','data berhasil dihapus');
    }
}
