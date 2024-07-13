<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DtksRefLampiranModel;
use App\Models\Dtk;
use App\Models\DtksLampiran;


/**
 * Description of DtksRefLampiranController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DtksRefLampiranController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.dtks_ref_lampiran.index', ['records' => DtksRefLampiranModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DtksRefLampiranModel  $dtksreflampiranmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DtksRefLampiranModel $dtksreflampiranmodel)
    {
        return view('pages.dtks_ref_lampiran.show', [
                'record' =>$dtksreflampiranmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$dtks = Dtk::all(['id']);
		$dtks_lampiran = DtksLampiran::all(['id']);

        return view('pages.dtks_ref_lampiran.create', [
            'model' => new DtksRefLampiranModel,
			"dtks" => $dtks,
			"dtks_lampiran" => $dtks_lampiran,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DtksRefLampiranModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DtksRefLampiranModel saved successfully');
            return redirect()->route('dtks_ref_lampiran.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DtksRefLampiranModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DtksRefLampiranModel  $dtksreflampiranmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DtksRefLampiranModel $dtksreflampiranmodel)
    {
		$dtks = Dtk::all(['id']);
		$dtks_lampiran = DtksLampiran::all(['id']);

        return view('pages.dtks_ref_lampiran.edit', [
            'model' => $dtksreflampiranmodel,
			"dtks" => $dtks,
			"dtks_lampiran" => $dtks_lampiran,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DtksRefLampiranModel  $dtksreflampiranmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DtksRefLampiranModel $dtksreflampiranmodel)
    {
        $dtksreflampiranmodel->fill($request->all());

        if ($dtksreflampiranmodel->save()) {
            
            session()->flash('app_message', 'DtksRefLampiranModel successfully updated');
            return redirect()->route('dtks_ref_lampiran.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DtksRefLampiranModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DtksRefLampiranModel  $dtksreflampiranmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DtksRefLampiranModel $dtksreflampiranmodel)
    {
        if ($dtksreflampiranmodel->delete()) {
                session()->flash('app_message', 'DtksRefLampiranModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DtksRefLampiranModel');
            }

        return redirect()->back();
    }
}
