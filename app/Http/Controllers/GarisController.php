<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Garis;


/**
 * Description of GarisController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class GarisController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Garis::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Garis  $garis
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $garis = Garis::find($id);
        if ($garis) {
            return response()->json($garis);
        }
        return response()->json(['message' => 'Garis not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.garis.create', [
            'model' => new Garis,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Garis;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Garis saved successfully');
            return redirect()->route('garis.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Garis');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Garis  $garis
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Garis $garis)
    {

        return view('pages.garis.edit', [
            'model' => $garis,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Garis  $garis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Garis $garis)
    {
        $garis->fill($request->all());

        if ($garis->save()) {
            
            session()->flash('app_message', 'Garis successfully updated');
            return redirect()->route('garis.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Garis');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Garis  $garis
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Garis $garis)
    {
        if ($garis->delete()) {
                session()->flash('app_message', 'Garis successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Garis');
            }

        return redirect()->back();
    }
}
