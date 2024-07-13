<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPersilMutasi;


/**
 * Description of RefPersilMutasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPersilMutasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefPersilMutasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPersilMutasi  $refpersilmutasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPersilMutasi $refpersilmutasi)
    {
        return view('pages.ref_persil_mutasi.show', [
                'record' =>$refpersilmutasi,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_persil_mutasi.create', [
            'model' => new RefPersilMutasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPersilMutasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPersilMutasi saved successfully');
            return redirect()->route('ref_persil_mutasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPersilMutasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPersilMutasi  $refpersilmutasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPersilMutasi $refpersilmutasi)
    {

        return view('pages.ref_persil_mutasi.edit', [
            'model' => $refpersilmutasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPersilMutasi  $refpersilmutasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPersilMutasi $refpersilmutasi)
    {
        $refpersilmutasi->fill($request->all());

        if ($refpersilmutasi->save()) {
            
            session()->flash('app_message', 'RefPersilMutasi successfully updated');
            return redirect()->route('ref_persil_mutasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPersilMutasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPersilMutasi  $refpersilmutasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPersilMutasi $refpersilmutasi)
    {
        if ($refpersilmutasi->delete()) {
                session()->flash('app_message', 'RefPersilMutasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPersilMutasi');
            }

        return redirect()->back();
    }
}
