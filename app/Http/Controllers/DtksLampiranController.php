<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DtksLampiranModel;
use App\Models\TwebRtm;


/**
 * Description of DtksLampiranController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DtksLampiranController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.dtks_lampiran.index', ['records' => DtksLampiranModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DtksLampiranModel  $dtkslampiranmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DtksLampiranModel $dtkslampiranmodel)
    {
        return view('pages.dtks_lampiran.show', [
                'record' =>$dtkslampiranmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$tweb_rtm = TwebRtm::all(['id']);

        return view('pages.dtks_lampiran.create', [
            'model' => new DtksLampiranModel,
			"tweb_rtm" => $tweb_rtm,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DtksLampiranModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DtksLampiranModel saved successfully');
            return redirect()->route('dtks_lampiran.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DtksLampiranModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DtksLampiranModel  $dtkslampiranmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DtksLampiranModel $dtkslampiranmodel)
    {
		$tweb_rtm = TwebRtm::all(['id']);

        return view('pages.dtks_lampiran.edit', [
            'model' => $dtkslampiranmodel,
			"tweb_rtm" => $tweb_rtm,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DtksLampiranModel  $dtkslampiranmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DtksLampiranModel $dtkslampiranmodel)
    {
        $dtkslampiranmodel->fill($request->all());

        if ($dtkslampiranmodel->save()) {
            
            session()->flash('app_message', 'DtksLampiranModel successfully updated');
            return redirect()->route('dtks_lampiran.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DtksLampiranModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DtksLampiranModel  $dtkslampiranmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DtksLampiranModel $dtkslampiranmodel)
    {
        if ($dtkslampiranmodel->delete()) {
                session()->flash('app_message', 'DtksLampiranModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DtksLampiranModel');
            }

        return redirect()->back();
    }
}
