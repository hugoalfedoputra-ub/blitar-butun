<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuplemenTerdata;
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
        return SuplemenTerdata::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SuplemenTerdata  $suplementerdata
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SuplemenTerdata $suplementerdata)
    {
        return view('pages.suplemen_terdata.show', [
                'record' =>$suplementerdata,
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
            'model' => new SuplemenTerdata,
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
        $model=new SuplemenTerdata;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SuplemenTerdata saved successfully');
            return redirect()->route('suplemen_terdata.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SuplemenTerdata');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SuplemenTerdata  $suplementerdata
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SuplemenTerdata $suplementerdata)
    {
		$suplemen = Supleman::all(['id']);

        return view('pages.suplemen_terdata.edit', [
            'model' => $suplementerdata,
			"suplemen" => $suplemen,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SuplemenTerdata  $suplementerdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SuplemenTerdata $suplementerdata)
    {
        $suplementerdata->fill($request->all());

        if ($suplementerdata->save()) {
            
            session()->flash('app_message', 'SuplemenTerdata successfully updated');
            return redirect()->route('suplemen_terdata.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SuplemenTerdata');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SuplemenTerdata  $suplementerdata
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SuplemenTerdata $suplementerdata)
    {
        if ($suplementerdata->delete()) {
                session()->flash('app_message', 'SuplemenTerdata successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SuplemenTerdata');
            }

        return redirect()->back();
    }
}
