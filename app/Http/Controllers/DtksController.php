<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DtksModel;
use App\Models\TwebRtm;
use App\Models\TwebKeluarga;


/**
 * Description of DtksController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DtksController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.dtks.index', ['records' => DtksModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DtksModel  $dtksmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DtksModel $dtksmodel)
    {
        return view('pages.dtks.show', [
                'record' =>$dtksmodel,
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
		$tweb_keluarga = TwebKeluarga::all(['id']);

        return view('pages.dtks.create', [
            'model' => new DtksModel,
			"tweb_rtm" => $tweb_rtm,
			"tweb_keluarga" => $tweb_keluarga,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DtksModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DtksModel saved successfully');
            return redirect()->route('dtks.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DtksModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DtksModel  $dtksmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DtksModel $dtksmodel)
    {
		$tweb_rtm = TwebRtm::all(['id']);
		$tweb_keluarga = TwebKeluarga::all(['id']);

        return view('pages.dtks.edit', [
            'model' => $dtksmodel,
			"tweb_rtm" => $tweb_rtm,
			"tweb_keluarga" => $tweb_keluarga,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DtksModel  $dtksmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DtksModel $dtksmodel)
    {
        $dtksmodel->fill($request->all());

        if ($dtksmodel->save()) {
            
            session()->flash('app_message', 'DtksModel successfully updated');
            return redirect()->route('dtks.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DtksModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DtksModel  $dtksmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DtksModel $dtksmodel)
    {
        if ($dtksmodel->delete()) {
                session()->flash('app_message', 'DtksModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DtksModel');
            }

        return redirect()->back();
    }
}
