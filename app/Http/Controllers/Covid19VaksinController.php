<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Covid19Vaksin;


/**
 * Description of Covid19VaksinController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class Covid19VaksinController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Covid19Vaksin::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19Vaksin  $covid19vaksin
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $covid19vaksin = Covid19Vaksin::find($id);
        if ($covid19vaksin) {
            return response()->json($covid19vaksin);
        }
        return response()->json(['message' => 'Covid19Vaksin not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.covid19_vaksin.create', [
            'model' => new Covid19Vaksin,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Covid19Vaksin;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Covid19Vaksin saved successfully');
            return redirect()->route('covid19_vaksin.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Covid19Vaksin');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19Vaksin  $covid19vaksin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Covid19Vaksin $covid19vaksin)
    {

        return view('pages.covid19_vaksin.edit', [
            'model' => $covid19vaksin,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Covid19Vaksin  $covid19vaksin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Covid19Vaksin $covid19vaksin)
    {
        $covid19vaksin->fill($request->all());

        if ($covid19vaksin->save()) {
            
            session()->flash('app_message', 'Covid19Vaksin successfully updated');
            return redirect()->route('covid19_vaksin.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Covid19Vaksin');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Covid19Vaksin  $covid19vaksin
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Covid19Vaksin $covid19vaksin)
    {
        if ($covid19vaksin->delete()) {
                session()->flash('app_message', 'Covid19Vaksin successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Covid19Vaksin');
            }

        return redirect()->back();
    }
}
