<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefDokumenModel;


/**
 * Description of RefDokumenController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefDokumenController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_dokumen.index', ['records' => RefDokumenModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefDokumenModel  $refdokumenmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefDokumenModel $refdokumenmodel)
    {
        return view('pages.ref_dokumen.show', [
                'record' =>$refdokumenmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_dokumen.create', [
            'model' => new RefDokumenModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefDokumenModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefDokumenModel saved successfully');
            return redirect()->route('ref_dokumen.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefDokumenModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefDokumenModel  $refdokumenmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefDokumenModel $refdokumenmodel)
    {

        return view('pages.ref_dokumen.edit', [
            'model' => $refdokumenmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefDokumenModel  $refdokumenmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefDokumenModel $refdokumenmodel)
    {
        $refdokumenmodel->fill($request->all());

        if ($refdokumenmodel->save()) {
            
            session()->flash('app_message', 'RefDokumenModel successfully updated');
            return redirect()->route('ref_dokumen.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefDokumenModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefDokumenModel  $refdokumenmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefDokumenModel $refdokumenmodel)
    {
        if ($refdokumenmodel->delete()) {
                session()->flash('app_message', 'RefDokumenModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefDokumenModel');
            }

        return redirect()->back();
    }
}
