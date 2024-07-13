<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPersilKelas;


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
        return view('pages.ref_persil_kelas.index', ['records' => RefPersilKelas::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPersilKelas  $refpersilkelas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPersilKelas $refpersilkelas)
    {
        return view('pages.ref_persil_kelas.show', [
                'record' =>$refpersilkelas,
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
            'model' => new RefPersilKelas,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPersilKelas;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPersilKelas saved successfully');
            return redirect()->route('ref_persil_kelas.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPersilKelas');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPersilKelas  $refpersilkelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPersilKelas $refpersilkelas)
    {

        return view('pages.ref_persil_kelas.edit', [
            'model' => $refpersilkelas,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPersilKelas  $refpersilkelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPersilKelas $refpersilkelas)
    {
        $refpersilkelas->fill($request->all());

        if ($refpersilkelas->save()) {
            
            session()->flash('app_message', 'RefPersilKelas successfully updated');
            return redirect()->route('ref_persil_kelas.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPersilKelas');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPersilKelas  $refpersilkelas
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPersilKelas $refpersilkelas)
    {
        if ($refpersilkelas->delete()) {
                session()->flash('app_message', 'RefPersilKelas successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPersilKelas');
            }

        return redirect()->back();
    }
}
