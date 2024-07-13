<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelompokMasterModel;


/**
 * Description of KelompokMasterController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KelompokMasterController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kelompok_master.index', ['records' => KelompokMasterModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokMasterModel  $kelompokmastermodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KelompokMasterModel $kelompokmastermodel)
    {
        return view('pages.kelompok_master.show', [
                'record' =>$kelompokmastermodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kelompok_master.create', [
            'model' => new KelompokMasterModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KelompokMasterModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KelompokMasterModel saved successfully');
            return redirect()->route('kelompok_master.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KelompokMasterModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokMasterModel  $kelompokmastermodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KelompokMasterModel $kelompokmastermodel)
    {

        return view('pages.kelompok_master.edit', [
            'model' => $kelompokmastermodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KelompokMasterModel  $kelompokmastermodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KelompokMasterModel $kelompokmastermodel)
    {
        $kelompokmastermodel->fill($request->all());

        if ($kelompokmastermodel->save()) {
            
            session()->flash('app_message', 'KelompokMasterModel successfully updated');
            return redirect()->route('kelompok_master.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KelompokMasterModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KelompokMasterModel  $kelompokmastermodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KelompokMasterModel $kelompokmastermodel)
    {
        if ($kelompokmastermodel->delete()) {
                session()->flash('app_message', 'KelompokMasterModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KelompokMasterModel');
            }

        return redirect()->back();
    }
}
