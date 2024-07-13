<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPersilKelasModel;


/**
 * Description of RefPersilKelasController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPersilKelasController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_persil_kelas.index', ['records' => RefPersilKelasModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPersilKelasModel  $refpersilkelasmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPersilKelasModel $refpersilkelasmodel)
    {
        return view('pages.ref_persil_kelas.show', [
                'record' =>$refpersilkelasmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_persil_kelas.create', [
            'model' => new RefPersilKelasModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPersilKelasModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPersilKelasModel saved successfully');
            return redirect()->route('ref_persil_kelas.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPersilKelasModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPersilKelasModel  $refpersilkelasmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPersilKelasModel $refpersilkelasmodel)
    {

        return view('pages.ref_persil_kelas.edit', [
            'model' => $refpersilkelasmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPersilKelasModel  $refpersilkelasmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPersilKelasModel $refpersilkelasmodel)
    {
        $refpersilkelasmodel->fill($request->all());

        if ($refpersilkelasmodel->save()) {
            
            session()->flash('app_message', 'RefPersilKelasModel successfully updated');
            return redirect()->route('ref_persil_kelas.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPersilKelasModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPersilKelasModel  $refpersilkelasmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPersilKelasModel $refpersilkelasmodel)
    {
        if ($refpersilkelasmodel->delete()) {
                session()->flash('app_message', 'RefPersilKelasModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPersilKelasModel');
            }

        return redirect()->back();
    }
}
