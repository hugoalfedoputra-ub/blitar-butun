<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefJabatan;


/**
 * Description of RefJabatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefJabatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefJabatan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefJabatan  $refjabatan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $refjabatan = RefJabatan::find($id);
        if ($refjabatan) {
            return response()->json($refjabatan);
        }
        return response()->json(['message' => 'RefJabatan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_jabatan.create', [
            'model' => new RefJabatan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefJabatan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefJabatan saved successfully');
            return redirect()->route('ref_jabatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefJabatan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefJabatan  $refjabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefJabatan $refjabatan)
    {

        return view('pages.ref_jabatan.edit', [
            'model' => $refjabatan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefJabatan  $refjabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefJabatan $refjabatan)
    {
        $refjabatan->fill($request->all());

        if ($refjabatan->save()) {
            
            session()->flash('app_message', 'RefJabatan successfully updated');
            return redirect()->route('ref_jabatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefJabatan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefJabatan  $refjabatan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefJabatan $refjabatan)
    {
        if ($refjabatan->delete()) {
                session()->flash('app_message', 'RefJabatan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefJabatan');
            }

        return redirect()->back();
    }
}
