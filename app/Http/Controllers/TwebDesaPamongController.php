<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebDesaPamong;


/**
 * Description of TwebDesaPamongController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebDesaPamongController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebDesaPamong::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebDesaPamong  $twebdesapamong
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebdesapamong = TwebDesaPamong::find($id);
        if ($twebdesapamong) {
            return response()->json($twebdesapamong);
        }
        return response()->json(['message' => 'TwebDesaPamong not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_desa_pamong.create', [
            'model' => new TwebDesaPamong,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebDesaPamong;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebDesaPamong saved successfully');
            return redirect()->route('tweb_desa_pamong.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebDesaPamong');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebDesaPamong  $twebdesapamong
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebDesaPamong $twebdesapamong)
    {

        return view('pages.tweb_desa_pamong.edit', [
            'model' => $twebdesapamong,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebDesaPamong  $twebdesapamong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebDesaPamong $twebdesapamong)
    {
        $twebdesapamong->fill($request->all());

        if ($twebdesapamong->save()) {
            
            session()->flash('app_message', 'TwebDesaPamong successfully updated');
            return redirect()->route('tweb_desa_pamong.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebDesaPamong');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebDesaPamong  $twebdesapamong
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebDesaPamong $twebdesapamong)
    {
        if ($twebdesapamong->delete()) {
                session()->flash('app_message', 'TwebDesaPamong successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebDesaPamong');
            }

        return redirect()->back();
    }
}
