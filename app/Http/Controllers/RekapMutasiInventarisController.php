<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RekapMutasiInventaris;


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
        return RekapMutasiInventaris::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RekapMutasiInventaris  $rekapmutasiinventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RekapMutasiInventaris $rekapmutasiinventaris)
    {
        return view('pages.rekap_mutasi_inventaris.show', [
                'record' =>$rekapmutasiinventaris,
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
            'model' => new RekapMutasiInventaris,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RekapMutasiInventaris;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RekapMutasiInventaris saved successfully');
            return redirect()->route('rekap_mutasi_inventaris.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RekapMutasiInventaris');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RekapMutasiInventaris  $rekapmutasiinventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RekapMutasiInventaris $rekapmutasiinventaris)
    {

        return view('pages.rekap_mutasi_inventaris.edit', [
            'model' => $rekapmutasiinventaris,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RekapMutasiInventaris  $rekapmutasiinventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RekapMutasiInventaris $rekapmutasiinventaris)
    {
        $rekapmutasiinventaris->fill($request->all());

        if ($rekapmutasiinventaris->save()) {
            
            session()->flash('app_message', 'RekapMutasiInventaris successfully updated');
            return redirect()->route('rekap_mutasi_inventaris.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RekapMutasiInventaris');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RekapMutasiInventaris  $rekapmutasiinventaris
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RekapMutasiInventaris $rekapmutasiinventaris)
    {
        if ($rekapmutasiinventaris->delete()) {
                session()->flash('app_message', 'RekapMutasiInventaris successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RekapMutasiInventaris');
            }

        return redirect()->back();
    }
}
