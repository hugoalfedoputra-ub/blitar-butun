<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelompokMaster;


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
        return KelompokMaster::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokMaster  $kelompokmaster
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $kelompokmaster = KelompokMaster::find($id);
        if ($kelompokmaster) {
            return response()->json($kelompokmaster);
        }
        return response()->json(['message' => 'KelompokMaster not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kelompok_master.create', [
            'model' => new KelompokMaster,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KelompokMaster;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KelompokMaster saved successfully');
            return redirect()->route('kelompok_master.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KelompokMaster');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokMaster  $kelompokmaster
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KelompokMaster $kelompokmaster)
    {

        return view('pages.kelompok_master.edit', [
            'model' => $kelompokmaster,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KelompokMaster  $kelompokmaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KelompokMaster $kelompokmaster)
    {
        $kelompokmaster->fill($request->all());

        if ($kelompokmaster->save()) {
            
            session()->flash('app_message', 'KelompokMaster successfully updated');
            return redirect()->route('kelompok_master.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KelompokMaster');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KelompokMaster  $kelompokmaster
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KelompokMaster $kelompokmaster)
    {
        if ($kelompokmaster->delete()) {
                session()->flash('app_message', 'KelompokMaster successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KelompokMaster');
            }

        return redirect()->back();
    }
}
