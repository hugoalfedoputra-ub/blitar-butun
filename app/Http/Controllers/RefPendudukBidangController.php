<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPendudukBidang;


/**
 * Description of RefPendudukBidangController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPendudukBidangController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefPendudukBidang::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukBidang  $refpendudukbidang
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $refpendudukbidang = RefPendudukBidang::find($id);
        if ($refpendudukbidang) {
            return response()->json($refpendudukbidang);
        }
        return response()->json(['message' => 'RefPendudukBidang not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_penduduk_bidang.create', [
            'model' => new RefPendudukBidang,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPendudukBidang;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPendudukBidang saved successfully');
            return redirect()->route('ref_penduduk_bidang.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPendudukBidang');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukBidang  $refpendudukbidang
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPendudukBidang $refpendudukbidang)
    {

        return view('pages.ref_penduduk_bidang.edit', [
            'model' => $refpendudukbidang,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPendudukBidang  $refpendudukbidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPendudukBidang $refpendudukbidang)
    {
        $refpendudukbidang->fill($request->all());

        if ($refpendudukbidang->save()) {
            
            session()->flash('app_message', 'RefPendudukBidang successfully updated');
            return redirect()->route('ref_penduduk_bidang.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPendudukBidang');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPendudukBidang  $refpendudukbidang
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPendudukBidang $refpendudukbidang)
    {
        if ($refpendudukbidang->delete()) {
                session()->flash('app_message', 'RefPendudukBidang successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPendudukBidang');
            }

        return redirect()->back();
    }
}
