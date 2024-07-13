<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPendudukSuku;


/**
 * Description of RefPendudukSukuController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPendudukSukuController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_penduduk_suku.index', ['records' => RefPendudukSuku::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukSuku  $refpenduduksuku
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPendudukSuku $refpenduduksuku)
    {
        return view('pages.ref_penduduk_suku.show', [
                'record' =>$refpenduduksuku,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_penduduk_suku.create', [
            'model' => new RefPendudukSuku,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPendudukSuku;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPendudukSuku saved successfully');
            return redirect()->route('ref_penduduk_suku.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPendudukSuku');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukSuku  $refpenduduksuku
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPendudukSuku $refpenduduksuku)
    {

        return view('pages.ref_penduduk_suku.edit', [
            'model' => $refpenduduksuku,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPendudukSuku  $refpenduduksuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPendudukSuku $refpenduduksuku)
    {
        $refpenduduksuku->fill($request->all());

        if ($refpenduduksuku->save()) {
            
            session()->flash('app_message', 'RefPendudukSuku successfully updated');
            return redirect()->route('ref_penduduk_suku.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPendudukSuku');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPendudukSuku  $refpenduduksuku
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPendudukSuku $refpenduduksuku)
    {
        if ($refpenduduksuku->delete()) {
                session()->flash('app_message', 'RefPendudukSuku successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPendudukSuku');
            }

        return redirect()->back();
    }
}
