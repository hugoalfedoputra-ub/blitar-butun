<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pembangunan;


/**
 * Description of PembangunanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PembangunanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pembangunan.index', ['records' => Pembangunan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pembangunan $pembangunan)
    {
        return view('pages.pembangunan.show', [
                'record' =>$pembangunan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pembangunan.create', [
            'model' => new Pembangunan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Pembangunan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Pembangunan saved successfully');
            return redirect()->route('pembangunan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Pembangunan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Pembangunan $pembangunan)
    {

        return view('pages.pembangunan.edit', [
            'model' => $pembangunan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pembangunan $pembangunan)
    {
        $pembangunan->fill($request->all());

        if ($pembangunan->save()) {
            
            session()->flash('app_message', 'Pembangunan successfully updated');
            return redirect()->route('pembangunan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Pembangunan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Pembangunan $pembangunan)
    {
        if ($pembangunan->delete()) {
                session()->flash('app_message', 'Pembangunan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Pembangunan');
            }

        return redirect()->back();
    }
}
