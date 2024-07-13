<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebAsetModel;


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
        return view('pages.tweb_aset.index', ['records' => TwebAsetModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebAsetModel  $twebasetmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebAsetModel $twebasetmodel)
    {
        return view('pages.tweb_aset.show', [
                'record' =>$twebasetmodel,
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
            'model' => new TwebAsetModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebAsetModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebAsetModel saved successfully');
            return redirect()->route('tweb_aset.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebAsetModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebAsetModel  $twebasetmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebAsetModel $twebasetmodel)
    {

        return view('pages.tweb_aset.edit', [
            'model' => $twebasetmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebAsetModel  $twebasetmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebAsetModel $twebasetmodel)
    {
        $twebasetmodel->fill($request->all());

        if ($twebasetmodel->save()) {
            
            session()->flash('app_message', 'TwebAsetModel successfully updated');
            return redirect()->route('tweb_aset.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebAsetModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebAsetModel  $twebasetmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebAsetModel $twebasetmodel)
    {
        if ($twebasetmodel->delete()) {
                session()->flash('app_message', 'TwebAsetModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebAsetModel');
            }

        return redirect()->back();
    }
}
