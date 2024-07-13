<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebGolonganDarah;


/**
 * Description of TwebGolonganDarahController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebGolonganDarahController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebGolonganDarah::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebGolonganDarah  $twebgolongandarah
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebgolongandarah = TwebGolonganDarah::find($id);
        if ($twebgolongandarah) {
            return response()->json($twebgolongandarah);
        }
        return response()->json(['message' => 'TwebGolonganDarah not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_golongan_darah.create', [
            'model' => new TwebGolonganDarah,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebGolonganDarah;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebGolonganDarah saved successfully');
            return redirect()->route('tweb_golongan_darah.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebGolonganDarah');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebGolonganDarah  $twebgolongandarah
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebGolonganDarah $twebgolongandarah)
    {

        return view('pages.tweb_golongan_darah.edit', [
            'model' => $twebgolongandarah,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebGolonganDarah  $twebgolongandarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebGolonganDarah $twebgolongandarah)
    {
        $twebgolongandarah->fill($request->all());

        if ($twebgolongandarah->save()) {
            
            session()->flash('app_message', 'TwebGolonganDarah successfully updated');
            return redirect()->route('tweb_golongan_darah.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebGolonganDarah');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebGolonganDarah  $twebgolongandarah
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebGolonganDarah $twebgolongandarah)
    {
        if ($twebgolongandarah->delete()) {
                session()->flash('app_message', 'TwebGolonganDarah successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebGolonganDarah');
            }

        return redirect()->back();
    }
}
