<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPersilMutasiModel;


/**
 * Description of RefPersilMutasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPersilMutasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_persil_mutasi.index', ['records' => RefPersilMutasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPersilMutasiModel  $refpersilmutasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPersilMutasiModel $refpersilmutasimodel)
    {
        return view('pages.ref_persil_mutasi.show', [
                'record' =>$refpersilmutasimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_persil_mutasi.create', [
            'model' => new RefPersilMutasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPersilMutasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPersilMutasiModel saved successfully');
            return redirect()->route('ref_persil_mutasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPersilMutasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPersilMutasiModel  $refpersilmutasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPersilMutasiModel $refpersilmutasimodel)
    {

        return view('pages.ref_persil_mutasi.edit', [
            'model' => $refpersilmutasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPersilMutasiModel  $refpersilmutasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPersilMutasiModel $refpersilmutasimodel)
    {
        $refpersilmutasimodel->fill($request->all());

        if ($refpersilmutasimodel->save()) {
            
            session()->flash('app_message', 'RefPersilMutasiModel successfully updated');
            return redirect()->route('ref_persil_mutasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPersilMutasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPersilMutasiModel  $refpersilmutasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPersilMutasiModel $refpersilmutasimodel)
    {
        if ($refpersilmutasimodel->delete()) {
                session()->flash('app_message', 'RefPersilMutasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPersilMutasiModel');
            }

        return redirect()->back();
    }
}
