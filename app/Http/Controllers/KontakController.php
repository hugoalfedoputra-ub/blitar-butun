<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kontak;


/**
 * Description of KontakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KontakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Kontak::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $kontak = Kontak::find($id);
        if ($kontak) {
            return response()->json($kontak);
        }
        return response()->json(['message' => 'Kontak not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kontak.create', [
            'model' => new Kontak,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Kontak;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Kontak saved successfully');
            return redirect()->route('kontak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Kontak');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kontak $kontak)
    {

        return view('pages.kontak.edit', [
            'model' => $kontak,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Kontak $kontak)
    {
        $kontak->fill($request->all());

        if ($kontak->save()) {
            
            session()->flash('app_message', 'Kontak successfully updated');
            return redirect()->route('kontak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Kontak');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Kontak  $kontak
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Kontak $kontak)
    {
        if ($kontak->delete()) {
                session()->flash('app_message', 'Kontak successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Kontak');
            }

        return redirect()->back();
    }
}
