<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPendudukBidangModel;


/**
 * Description of RefPendudukBidangController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPendudukBidangController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_penduduk_bidang.index', ['records' => RefPendudukBidangModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukBidangModel  $refpendudukbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPendudukBidangModel $refpendudukbidangmodel)
    {
        return view('pages.ref_penduduk_bidang.show', [
                'record' =>$refpendudukbidangmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_penduduk_bidang.create', [
            'model' => new RefPendudukBidangModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPendudukBidangModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPendudukBidangModel saved successfully');
            return redirect()->route('ref_penduduk_bidang.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPendudukBidangModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukBidangModel  $refpendudukbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPendudukBidangModel $refpendudukbidangmodel)
    {

        return view('pages.ref_penduduk_bidang.edit', [
            'model' => $refpendudukbidangmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPendudukBidangModel  $refpendudukbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPendudukBidangModel $refpendudukbidangmodel)
    {
        $refpendudukbidangmodel->fill($request->all());

        if ($refpendudukbidangmodel->save()) {
            
            session()->flash('app_message', 'RefPendudukBidangModel successfully updated');
            return redirect()->route('ref_penduduk_bidang.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPendudukBidangModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPendudukBidangModel  $refpendudukbidangmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPendudukBidangModel $refpendudukbidangmodel)
    {
        if ($refpendudukbidangmodel->delete()) {
                session()->flash('app_message', 'RefPendudukBidangModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPendudukBidangModel');
            }

        return redirect()->back();
    }
}
