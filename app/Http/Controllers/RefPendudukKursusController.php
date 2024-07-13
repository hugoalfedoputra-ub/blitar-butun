<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPendudukKursusModel;


/**
 * Description of RefPendudukKursusController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPendudukKursusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_penduduk_kursus.index', ['records' => RefPendudukKursusModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukKursusModel  $refpendudukkursusmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPendudukKursusModel $refpendudukkursusmodel)
    {
        return view('pages.ref_penduduk_kursus.show', [
                'record' =>$refpendudukkursusmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_penduduk_kursus.create', [
            'model' => new RefPendudukKursusModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPendudukKursusModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPendudukKursusModel saved successfully');
            return redirect()->route('ref_penduduk_kursus.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPendudukKursusModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukKursusModel  $refpendudukkursusmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPendudukKursusModel $refpendudukkursusmodel)
    {

        return view('pages.ref_penduduk_kursus.edit', [
            'model' => $refpendudukkursusmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPendudukKursusModel  $refpendudukkursusmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPendudukKursusModel $refpendudukkursusmodel)
    {
        $refpendudukkursusmodel->fill($request->all());

        if ($refpendudukkursusmodel->save()) {
            
            session()->flash('app_message', 'RefPendudukKursusModel successfully updated');
            return redirect()->route('ref_penduduk_kursus.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPendudukKursusModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPendudukKursusModel  $refpendudukkursusmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPendudukKursusModel $refpendudukkursusmodel)
    {
        if ($refpendudukkursusmodel->delete()) {
                session()->flash('app_message', 'RefPendudukKursusModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPendudukKursusModel');
            }

        return redirect()->back();
    }
}
