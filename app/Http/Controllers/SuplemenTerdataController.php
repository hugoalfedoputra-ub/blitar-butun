<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuplemenTerdataModel;
use App\Models\Supleman;


/**
 * Description of SuplemenTerdataController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SuplemenTerdataController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.suplemen_terdata.index', ['records' => SuplemenTerdataModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SuplemenTerdataModel  $suplementerdatamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SuplemenTerdataModel $suplementerdatamodel)
    {
        return view('pages.suplemen_terdata.show', [
                'record' =>$suplementerdatamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$suplemen = Supleman::all(['id']);

        return view('pages.suplemen_terdata.create', [
            'model' => new SuplemenTerdataModel,
			"suplemen" => $suplemen,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SuplemenTerdataModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SuplemenTerdataModel saved successfully');
            return redirect()->route('suplemen_terdata.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SuplemenTerdataModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SuplemenTerdataModel  $suplementerdatamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SuplemenTerdataModel $suplementerdatamodel)
    {
		$suplemen = Supleman::all(['id']);

        return view('pages.suplemen_terdata.edit', [
            'model' => $suplementerdatamodel,
			"suplemen" => $suplemen,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SuplemenTerdataModel  $suplementerdatamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SuplemenTerdataModel $suplementerdatamodel)
    {
        $suplementerdatamodel->fill($request->all());

        if ($suplementerdatamodel->save()) {
            
            session()->flash('app_message', 'SuplemenTerdataModel successfully updated');
            return redirect()->route('suplemen_terdata.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SuplemenTerdataModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SuplemenTerdataModel  $suplementerdatamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SuplemenTerdataModel $suplementerdatamodel)
    {
        if ($suplementerdatamodel->delete()) {
                session()->flash('app_message', 'SuplemenTerdataModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SuplemenTerdataModel');
            }

        return redirect()->back();
    }
}
