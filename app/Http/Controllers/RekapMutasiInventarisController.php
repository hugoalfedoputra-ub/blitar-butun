<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RekapMutasiInventarisModel;


/**
 * Description of RekapMutasiInventarisController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RekapMutasiInventarisController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.rekap_mutasi_inventaris.index', ['records' => RekapMutasiInventarisModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RekapMutasiInventarisModel  $rekapmutasiinventarismodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RekapMutasiInventarisModel $rekapmutasiinventarismodel)
    {
        return view('pages.rekap_mutasi_inventaris.show', [
                'record' =>$rekapmutasiinventarismodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.rekap_mutasi_inventaris.create', [
            'model' => new RekapMutasiInventarisModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RekapMutasiInventarisModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RekapMutasiInventarisModel saved successfully');
            return redirect()->route('rekap_mutasi_inventaris.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RekapMutasiInventarisModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RekapMutasiInventarisModel  $rekapmutasiinventarismodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RekapMutasiInventarisModel $rekapmutasiinventarismodel)
    {

        return view('pages.rekap_mutasi_inventaris.edit', [
            'model' => $rekapmutasiinventarismodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RekapMutasiInventarisModel  $rekapmutasiinventarismodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RekapMutasiInventarisModel $rekapmutasiinventarismodel)
    {
        $rekapmutasiinventarismodel->fill($request->all());

        if ($rekapmutasiinventarismodel->save()) {
            
            session()->flash('app_message', 'RekapMutasiInventarisModel successfully updated');
            return redirect()->route('rekap_mutasi_inventaris.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RekapMutasiInventarisModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RekapMutasiInventarisModel  $rekapmutasiinventarismodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RekapMutasiInventarisModel $rekapmutasiinventarismodel)
    {
        if ($rekapmutasiinventarismodel->delete()) {
                session()->flash('app_message', 'RekapMutasiInventarisModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RekapMutasiInventarisModel');
            }

        return redirect()->back();
    }
}
