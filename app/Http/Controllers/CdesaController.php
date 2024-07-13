<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cdesa;


/**
 * Description of CdesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class CdesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Cdesa::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Cdesa  $cdesa
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $cdesa = Cdesa::find($id);
        if ($cdesa) {
            return response()->json($cdesa);
        }
        return response()->json(['message' => 'Cdesa not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.cdesa.create', [
            'model' => new Cdesa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Cdesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Cdesa saved successfully');
            return redirect()->route('cdesa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Cdesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Cdesa  $cdesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Cdesa $cdesa)
    {

        return view('pages.cdesa.edit', [
            'model' => $cdesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Cdesa  $cdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cdesa $cdesa)
    {
        $cdesa->fill($request->all());

        if ($cdesa->save()) {
            
            session()->flash('app_message', 'Cdesa successfully updated');
            return redirect()->route('cdesa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Cdesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Cdesa  $cdesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Cdesa $cdesa)
    {
        if ($cdesa->delete()) {
                session()->flash('app_message', 'Cdesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Cdesa');
            }

        return redirect()->back();
    }
}
