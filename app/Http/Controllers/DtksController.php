<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dtks;
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
        return Dtks::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $dtks = Dtks::find($id);
        if ($dtks) {
            return response()->json($dtks);
        }
        return response()->json(['message' => 'Dtks not found'], 404);
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
            'model' => new Dtks,
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
        $model=new Dtks;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Dtks saved successfully');
            return redirect()->route('dtks.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Dtks');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Dtks $dtks)
    {
		$tweb_rtm = TwebRtm::all(['id']);
		$tweb_keluarga = TwebKeluarga::all(['id']);

        return view('pages.dtks.edit', [
            'model' => $dtks,
			"tweb_rtm" => $tweb_rtm,
			"tweb_keluarga" => $tweb_keluarga,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Dtks  $dtks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Dtks $dtks)
    {
        $dtks->fill($request->all());

        if ($dtks->save()) {
            
            session()->flash('app_message', 'Dtks successfully updated');
            return redirect()->route('dtks.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Dtks');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Dtks  $dtks
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Dtks $dtks)
    {
        if ($dtks->delete()) {
                session()->flash('app_message', 'Dtks successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Dtks');
            }

        return redirect()->back();
    }
}
