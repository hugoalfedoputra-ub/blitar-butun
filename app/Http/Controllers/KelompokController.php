<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelompok;


/**
 * Description of KelompokController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KelompokController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Kelompok::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $kelompok = Kelompok::find($id);
        if ($kelompok) {
            return response()->json($kelompok);
        }
        return response()->json(['message' => 'Kelompok not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kelompok.create', [
            'model' => new Kelompok,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Kelompok;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Kelompok saved successfully');
            return redirect()->route('kelompok.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Kelompok');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kelompok $kelompok)
    {

        return view('pages.kelompok.edit', [
            'model' => $kelompok,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Kelompok $kelompok)
    {
        $kelompok->fill($request->all());

        if ($kelompok->save()) {
            
            session()->flash('app_message', 'Kelompok successfully updated');
            return redirect()->route('kelompok.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Kelompok');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Kelompok $kelompok)
    {
        if ($kelompok->delete()) {
                session()->flash('app_message', 'Kelompok successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Kelompok');
            }

        return redirect()->back();
    }
}
