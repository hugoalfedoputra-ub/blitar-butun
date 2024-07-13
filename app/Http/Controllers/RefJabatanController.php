<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefJabatanModel;


/**
 * Description of RefJabatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefJabatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_jabatan.index', ['records' => RefJabatanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefJabatanModel  $refjabatanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefJabatanModel $refjabatanmodel)
    {
        return view('pages.ref_jabatan.show', [
                'record' =>$refjabatanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_jabatan.create', [
            'model' => new RefJabatanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefJabatanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefJabatanModel saved successfully');
            return redirect()->route('ref_jabatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefJabatanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefJabatanModel  $refjabatanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefJabatanModel $refjabatanmodel)
    {

        return view('pages.ref_jabatan.edit', [
            'model' => $refjabatanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefJabatanModel  $refjabatanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefJabatanModel $refjabatanmodel)
    {
        $refjabatanmodel->fill($request->all());

        if ($refjabatanmodel->save()) {
            
            session()->flash('app_message', 'RefJabatanModel successfully updated');
            return redirect()->route('ref_jabatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefJabatanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefJabatanModel  $refjabatanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefJabatanModel $refjabatanmodel)
    {
        if ($refjabatanmodel->delete()) {
                session()->flash('app_message', 'RefJabatanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefJabatanModel');
            }

        return redirect()->back();
    }
}
