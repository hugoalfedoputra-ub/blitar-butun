<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPeristiwaModel;


/**
 * Description of RefPeristiwaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPeristiwaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_peristiwa.index', ['records' => RefPeristiwaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPeristiwaModel  $refperistiwamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPeristiwaModel $refperistiwamodel)
    {
        return view('pages.ref_peristiwa.show', [
                'record' =>$refperistiwamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_peristiwa.create', [
            'model' => new RefPeristiwaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPeristiwaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPeristiwaModel saved successfully');
            return redirect()->route('ref_peristiwa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPeristiwaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPeristiwaModel  $refperistiwamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPeristiwaModel $refperistiwamodel)
    {

        return view('pages.ref_peristiwa.edit', [
            'model' => $refperistiwamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPeristiwaModel  $refperistiwamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPeristiwaModel $refperistiwamodel)
    {
        $refperistiwamodel->fill($request->all());

        if ($refperistiwamodel->save()) {
            
            session()->flash('app_message', 'RefPeristiwaModel successfully updated');
            return redirect()->route('ref_peristiwa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPeristiwaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPeristiwaModel  $refperistiwamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPeristiwaModel $refperistiwamodel)
    {
        if ($refperistiwamodel->delete()) {
                session()->flash('app_message', 'RefPeristiwaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPeristiwaModel');
            }

        return redirect()->back();
    }
}
