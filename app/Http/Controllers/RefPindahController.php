<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPindah;


/**
 * Description of RefPindahController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPindahController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefPindah::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPindah  $refpindah
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPindah $refpindah)
    {
        return view('pages.ref_pindah.show', [
                'record' =>$refpindah,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_pindah.create', [
            'model' => new RefPindah,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPindah;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPindah saved successfully');
            return redirect()->route('ref_pindah.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPindah');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPindah  $refpindah
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPindah $refpindah)
    {

        return view('pages.ref_pindah.edit', [
            'model' => $refpindah,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPindah  $refpindah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPindah $refpindah)
    {
        $refpindah->fill($request->all());

        if ($refpindah->save()) {
            
            session()->flash('app_message', 'RefPindah successfully updated');
            return redirect()->route('ref_pindah.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPindah');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPindah  $refpindah
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPindah $refpindah)
    {
        if ($refpindah->delete()) {
                session()->flash('app_message', 'RefPindah successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPindah');
            }

        return redirect()->back();
    }
}
