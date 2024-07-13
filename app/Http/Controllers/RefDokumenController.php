<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefDokumen;


/**
 * Description of RefDokumenController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefDokumenController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefDokumen::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefDokumen  $refdokumen
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $refdokumen = RefDokumen::find($id);
        if ($refdokumen) {
            return response()->json($refdokumen);
        }
        return response()->json(['message' => 'RefDokumen not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_dokumen.create', [
            'model' => new RefDokumen,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefDokumen;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefDokumen saved successfully');
            return redirect()->route('ref_dokumen.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefDokumen');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefDokumen  $refdokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefDokumen $refdokumen)
    {

        return view('pages.ref_dokumen.edit', [
            'model' => $refdokumen,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefDokumen  $refdokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefDokumen $refdokumen)
    {
        $refdokumen->fill($request->all());

        if ($refdokumen->save()) {
            
            session()->flash('app_message', 'RefDokumen successfully updated');
            return redirect()->route('ref_dokumen.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefDokumen');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefDokumen  $refdokumen
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefDokumen $refdokumen)
    {
        if ($refdokumen->delete()) {
                session()->flash('app_message', 'RefDokumen successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefDokumen');
            }

        return redirect()->back();
    }
}
