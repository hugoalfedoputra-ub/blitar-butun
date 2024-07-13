<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HubungWargaModel;
use App\Models\KontakGrup;


/**
 * Description of HubungWargaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class HubungWargaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.hubung_warga.index', ['records' => HubungWargaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  HubungWargaModel  $hubungwargamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HubungWargaModel $hubungwargamodel)
    {
        return view('pages.hubung_warga.show', [
                'record' =>$hubungwargamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$kontak_grup = KontakGrup::all(['id']);

        return view('pages.hubung_warga.create', [
            'model' => new HubungWargaModel,
			"kontak_grup" => $kontak_grup,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new HubungWargaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'HubungWargaModel saved successfully');
            return redirect()->route('hubung_warga.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving HubungWargaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  HubungWargaModel  $hubungwargamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, HubungWargaModel $hubungwargamodel)
    {
		$kontak_grup = KontakGrup::all(['id']);

        return view('pages.hubung_warga.edit', [
            'model' => $hubungwargamodel,
			"kontak_grup" => $kontak_grup,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  HubungWargaModel  $hubungwargamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,HubungWargaModel $hubungwargamodel)
    {
        $hubungwargamodel->fill($request->all());

        if ($hubungwargamodel->save()) {
            
            session()->flash('app_message', 'HubungWargaModel successfully updated');
            return redirect()->route('hubung_warga.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating HubungWargaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  HubungWargaModel  $hubungwargamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, HubungWargaModel $hubungwargamodel)
    {
        if ($hubungwargamodel->delete()) {
                session()->flash('app_message', 'HubungWargaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting HubungWargaModel');
            }

        return redirect()->back();
    }
}
