<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebSakitMenahun;


/**
 * Description of TwebSakitMenahunController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebSakitMenahunController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebSakitMenahun::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebSakitMenahun  $twebsakitmenahun
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebsakitmenahun = TwebSakitMenahun::find($id);
        if ($twebsakitmenahun) {
            return response()->json($twebsakitmenahun);
        }
        return response()->json(['message' => 'TwebSakitMenahun not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_sakit_menahun.create', [
            'model' => new TwebSakitMenahun,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebSakitMenahun;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebSakitMenahun saved successfully');
            return redirect()->route('tweb_sakit_menahun.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebSakitMenahun');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebSakitMenahun  $twebsakitmenahun
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebSakitMenahun $twebsakitmenahun)
    {

        return view('pages.tweb_sakit_menahun.edit', [
            'model' => $twebsakitmenahun,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebSakitMenahun  $twebsakitmenahun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebSakitMenahun $twebsakitmenahun)
    {
        $twebsakitmenahun->fill($request->all());

        if ($twebsakitmenahun->save()) {
            
            session()->flash('app_message', 'TwebSakitMenahun successfully updated');
            return redirect()->route('tweb_sakit_menahun.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebSakitMenahun');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebSakitMenahun  $twebsakitmenahun
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebSakitMenahun $twebsakitmenahun)
    {
        if ($twebsakitmenahun->delete()) {
                session()->flash('app_message', 'TwebSakitMenahun successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebSakitMenahun');
            }

        return redirect()->back();
    }
}
