<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebGolonganDarahModel;


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
        return view('pages.tweb_golongan_darah.index', ['records' => TwebGolonganDarahModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebGolonganDarahModel  $twebgolongandarahmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebGolonganDarahModel $twebgolongandarahmodel)
    {
        return view('pages.tweb_golongan_darah.show', [
                'record' =>$twebgolongandarahmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_golongan_darah.create', [
            'model' => new TwebGolonganDarahModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebGolonganDarahModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebGolonganDarahModel saved successfully');
            return redirect()->route('tweb_golongan_darah.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebGolonganDarahModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebGolonganDarahModel  $twebgolongandarahmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebGolonganDarahModel $twebgolongandarahmodel)
    {

        return view('pages.tweb_golongan_darah.edit', [
            'model' => $twebgolongandarahmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebGolonganDarahModel  $twebgolongandarahmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebGolonganDarahModel $twebgolongandarahmodel)
    {
        $twebgolongandarahmodel->fill($request->all());

        if ($twebgolongandarahmodel->save()) {
            
            session()->flash('app_message', 'TwebGolonganDarahModel successfully updated');
            return redirect()->route('tweb_golongan_darah.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebGolonganDarahModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebGolonganDarahModel  $twebgolongandarahmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebGolonganDarahModel $twebgolongandarahmodel)
    {
        if ($twebgolongandarahmodel->delete()) {
                session()->flash('app_message', 'TwebGolonganDarahModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebGolonganDarahModel');
            }

        return redirect()->back();
    }
}
