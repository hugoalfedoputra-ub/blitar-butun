<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPeruntukanTanahKasModel;


/**
 * Description of RefPeruntukanTanahKasController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPeruntukanTanahKasController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_peruntukan_tanah_kas.index', ['records' => RefPeruntukanTanahKasModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPeruntukanTanahKasModel  $refperuntukantanahkasmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPeruntukanTanahKasModel $refperuntukantanahkasmodel)
    {
        return view('pages.ref_peruntukan_tanah_kas.show', [
                'record' =>$refperuntukantanahkasmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_peruntukan_tanah_kas.create', [
            'model' => new RefPeruntukanTanahKasModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPeruntukanTanahKasModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPeruntukanTanahKasModel saved successfully');
            return redirect()->route('ref_peruntukan_tanah_kas.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPeruntukanTanahKasModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPeruntukanTanahKasModel  $refperuntukantanahkasmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPeruntukanTanahKasModel $refperuntukantanahkasmodel)
    {

        return view('pages.ref_peruntukan_tanah_kas.edit', [
            'model' => $refperuntukantanahkasmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPeruntukanTanahKasModel  $refperuntukantanahkasmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPeruntukanTanahKasModel $refperuntukantanahkasmodel)
    {
        $refperuntukantanahkasmodel->fill($request->all());

        if ($refperuntukantanahkasmodel->save()) {
            
            session()->flash('app_message', 'RefPeruntukanTanahKasModel successfully updated');
            return redirect()->route('ref_peruntukan_tanah_kas.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPeruntukanTanahKasModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPeruntukanTanahKasModel  $refperuntukantanahkasmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPeruntukanTanahKasModel $refperuntukantanahkasmodel)
    {
        if ($refperuntukantanahkasmodel->delete()) {
                session()->flash('app_message', 'RefPeruntukanTanahKasModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPeruntukanTanahKasModel');
            }

        return redirect()->back();
    }
}
