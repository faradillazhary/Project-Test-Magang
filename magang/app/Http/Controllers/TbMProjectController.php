<?php

namespace App\Http\Controllers;

use App\Models\tb_m_project;
use App\Models\tb_m_client;
use Illuminate\Http\Request;

class TbMProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.index',[
             'tb_m_projects' =>tb_m_project::latest()->paginate(7)
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create',[
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
            'project_name' => 'required',
            'client_id'=>'required',
            'project_start'=>'required',
            'project_end'=>'required',
            'project_status'=>'required'
        ]);

        tb_m_project::create($validatedData);
        return redirect('/project')->with('pesan','Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */
    public function show(tb_m_project $tb_m_project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_m_project $tb_m_project, $id)
    {
       
        return view('project.edit',[
            'tb_m_project'=>$tb_m_project::find($id),
           'tb_m_clients'=>tb_m_client::all()
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_m_project $tb_m_project, $id)
    {

        $validateData =$request->validate([
            'project_name' =>'required',
            'client_id' =>'required',
            'project_start' =>'required',
            'project_end' =>'required',
            'project_status' =>'required'

       ]);

        tb_m_project::where('id',$id)->update($validateData);
       return redirect('/project')->with('pesan','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */

    public function destroy(tb_m_project $tb_m_project,$id)
    {
         tb_m_project::destroy($id);
         return redirect('/project')->with('pesan','Data berhasil dihapus');
    }
}
