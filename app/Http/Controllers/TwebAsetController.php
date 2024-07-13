<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebAset;


/**
 * Description of TwebAsetController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebAsetController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_aset.index', ['records' => TwebAset::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebAset  $twebaset
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebAset $twebaset)
    {
        return view('pages.tweb_aset.show', [
                'record' =>$twebaset,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_aset.create', [
            'model' => new TwebAset,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebAset;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebAset saved successfully');
            return redirect()->route('tweb_aset.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebAset');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebAset  $twebaset
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebAset $twebaset)
    {

        return view('pages.tweb_aset.edit', [
            'model' => $twebaset,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebAset  $twebaset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebAset $twebaset)
    {
        $twebaset->fill($request->all());

        if ($twebaset->save()) {
            
            session()->flash('app_message', 'TwebAset successfully updated');
            return redirect()->route('tweb_aset.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebAset');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebAset  $twebaset
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebAset $twebaset)
    {
        if ($twebaset->delete()) {
                session()->flash('app_message', 'TwebAset successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebAset');
            }

        return redirect()->back();
    }
}
