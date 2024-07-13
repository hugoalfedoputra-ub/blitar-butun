<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anjungan;


/**
 * Description of AnjunganController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnjunganController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Anjungan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Anjungan  $anjungan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $anjungan = Anjungan::find($id);
        if ($anjungan) {
            return response()->json($anjungan);
        }
        return response()->json(['message' => 'Anjungan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.anjungan.create', [
            'model' => new Anjungan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Anjungan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Anjungan saved successfully');
            return redirect()->route('anjungan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Anjungan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Anjungan  $anjungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Anjungan $anjungan)
    {

        return view('pages.anjungan.edit', [
            'model' => $anjungan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Anjungan  $anjungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Anjungan $anjungan)
    {
        $anjungan->fill($request->all());

        if ($anjungan->save()) {
            
            session()->flash('app_message', 'Anjungan successfully updated');
            return redirect()->route('anjungan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Anjungan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Anjungan  $anjungan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Anjungan $anjungan)
    {
        if ($anjungan->delete()) {
                session()->flash('app_message', 'Anjungan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Anjungan');
            }

        return redirect()->back();
    }
}
