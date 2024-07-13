<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posyandu;


/**
 * Description of PosyanduController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PosyanduController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Posyandu::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $posyandu = Posyandu::find($id);
        if ($posyandu) {
            return response()->json($posyandu);
        }
        return response()->json(['message' => 'Posyandu not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.posyandu.create', [
            'model' => new Posyandu,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Posyandu;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Posyandu saved successfully');
            return redirect()->route('posyandu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Posyandu');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Posyandu $posyandu)
    {

        return view('pages.posyandu.edit', [
            'model' => $posyandu,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Posyandu $posyandu)
    {
        $posyandu->fill($request->all());

        if ($posyandu->save()) {
            
            session()->flash('app_message', 'Posyandu successfully updated');
            return redirect()->route('posyandu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Posyandu');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Posyandu $posyandu)
    {
        if ($posyandu->delete()) {
                session()->flash('app_message', 'Posyandu successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Posyandu');
            }

        return redirect()->back();
    }
}
