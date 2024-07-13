<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;


/**
 * Description of PengaduanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PengaduanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pengaduan.index', ['records' => PengaduanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PengaduanModel  $pengaduanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PengaduanModel $pengaduanmodel)
    {
        return view('pages.pengaduan.show', [
                'record' =>$pengaduanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pengaduan.create', [
            'model' => new PengaduanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PengaduanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PengaduanModel saved successfully');
            return redirect()->route('pengaduan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PengaduanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PengaduanModel  $pengaduanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PengaduanModel $pengaduanmodel)
    {

        return view('pages.pengaduan.edit', [
            'model' => $pengaduanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PengaduanModel  $pengaduanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PengaduanModel $pengaduanmodel)
    {
        $pengaduanmodel->fill($request->all());

        if ($pengaduanmodel->save()) {
            
            session()->flash('app_message', 'PengaduanModel successfully updated');
            return redirect()->route('pengaduan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PengaduanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PengaduanModel  $pengaduanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PengaduanModel $pengaduanmodel)
    {
        if ($pengaduanmodel->delete()) {
                session()->flash('app_message', 'PengaduanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PengaduanModel');
            }

        return redirect()->back();
    }
}
