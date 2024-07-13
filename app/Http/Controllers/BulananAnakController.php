<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BulananAnakModel;


/**
 * Description of BulananAnakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class BulananAnakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.bulanan_anak.index', ['records' => BulananAnakModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BulananAnakModel  $bulanananakmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BulananAnakModel $bulanananakmodel)
    {
        return view('pages.bulanan_anak.show', [
                'record' =>$bulanananakmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.bulanan_anak.create', [
            'model' => new BulananAnakModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BulananAnakModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BulananAnakModel saved successfully');
            return redirect()->route('bulanan_anak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BulananAnakModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BulananAnakModel  $bulanananakmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BulananAnakModel $bulanananakmodel)
    {

        return view('pages.bulanan_anak.edit', [
            'model' => $bulanananakmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BulananAnakModel  $bulanananakmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BulananAnakModel $bulanananakmodel)
    {
        $bulanananakmodel->fill($request->all());

        if ($bulanananakmodel->save()) {
            
            session()->flash('app_message', 'BulananAnakModel successfully updated');
            return redirect()->route('bulanan_anak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BulananAnakModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BulananAnakModel  $bulanananakmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BulananAnakModel $bulanananakmodel)
    {
        if ($bulanananakmodel->delete()) {
                session()->flash('app_message', 'BulananAnakModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BulananAnakModel');
            }

        return redirect()->back();
    }
}
