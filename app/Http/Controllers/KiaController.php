<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kia;


/**
 * Description of KiaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KiaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Kia::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Kia  $kia
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $kia = Kia::find($id);
        if ($kia) {
            return response()->json($kia);
        }
        return response()->json(['message' => 'Kia not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kia.create', [
            'model' => new Kia,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Kia;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Kia saved successfully');
            return redirect()->route('kia.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Kia');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Kia  $kia
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kia $kia)
    {

        return view('pages.kia.edit', [
            'model' => $kia,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Kia  $kia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Kia $kia)
    {
        $kia->fill($request->all());

        if ($kia->save()) {
            
            session()->flash('app_message', 'Kia successfully updated');
            return redirect()->route('kia.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Kia');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Kia  $kia
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Kia $kia)
    {
        if ($kia->delete()) {
                session()->flash('app_message', 'Kia successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Kia');
            }

        return redirect()->back();
    }
}
