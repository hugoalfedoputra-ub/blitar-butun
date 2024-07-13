<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterInventaris;


/**
 * Description of MasterInventarisController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MasterInventarisController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return MasterInventaris::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MasterInventaris  $masterinventaris
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $masterinventaris = MasterInventaris::find($id);
        if ($masterinventaris) {
            return response()->json($masterinventaris);
        }
        return response()->json(['message' => 'MasterInventaris not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.master_inventaris.create', [
            'model' => new MasterInventaris,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MasterInventaris;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MasterInventaris saved successfully');
            return redirect()->route('master_inventaris.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MasterInventaris');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MasterInventaris  $masterinventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MasterInventaris $masterinventaris)
    {

        return view('pages.master_inventaris.edit', [
            'model' => $masterinventaris,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MasterInventaris  $masterinventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MasterInventaris $masterinventaris)
    {
        $masterinventaris->fill($request->all());

        if ($masterinventaris->save()) {
            
            session()->flash('app_message', 'MasterInventaris successfully updated');
            return redirect()->route('master_inventaris.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MasterInventaris');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MasterInventaris  $masterinventaris
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MasterInventaris $masterinventaris)
    {
        if ($masterinventaris->delete()) {
                session()->flash('app_message', 'MasterInventaris successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MasterInventaris');
            }

        return redirect()->back();
    }
}
