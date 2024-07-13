<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefSyaratSuratModel;


/**
 * Description of RefSyaratSuratController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefSyaratSuratController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_syarat_surat.index', ['records' => RefSyaratSuratModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefSyaratSuratModel  $refsyaratsuratmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefSyaratSuratModel $refsyaratsuratmodel)
    {
        return view('pages.ref_syarat_surat.show', [
                'record' =>$refsyaratsuratmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_syarat_surat.create', [
            'model' => new RefSyaratSuratModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefSyaratSuratModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefSyaratSuratModel saved successfully');
            return redirect()->route('ref_syarat_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefSyaratSuratModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefSyaratSuratModel  $refsyaratsuratmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefSyaratSuratModel $refsyaratsuratmodel)
    {

        return view('pages.ref_syarat_surat.edit', [
            'model' => $refsyaratsuratmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefSyaratSuratModel  $refsyaratsuratmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefSyaratSuratModel $refsyaratsuratmodel)
    {
        $refsyaratsuratmodel->fill($request->all());

        if ($refsyaratsuratmodel->save()) {
            
            session()->flash('app_message', 'RefSyaratSuratModel successfully updated');
            return redirect()->route('ref_syarat_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefSyaratSuratModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefSyaratSuratModel  $refsyaratsuratmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefSyaratSuratModel $refsyaratsuratmodel)
    {
        if ($refsyaratsuratmodel->delete()) {
                session()->flash('app_message', 'RefSyaratSuratModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefSyaratSuratModel');
            }

        return redirect()->back();
    }
}
