<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BulananAnak;


/**
 * Description of BulananAnakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class BulananAnakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.bulanan_anak.index', ['records' => BulananAnak::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BulananAnak  $bulanananak
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BulananAnak $bulanananak)
    {
        return view('pages.bulanan_anak.show', [
                'record' =>$bulanananak,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.bulanan_anak.create', [
            'model' => new BulananAnak,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BulananAnak;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BulananAnak saved successfully');
            return redirect()->route('bulanan_anak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BulananAnak');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BulananAnak  $bulanananak
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BulananAnak $bulanananak)
    {

        return view('pages.bulanan_anak.edit', [
            'model' => $bulanananak,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BulananAnak  $bulanananak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BulananAnak $bulanananak)
    {
        $bulanananak->fill($request->all());

        if ($bulanananak->save()) {
            
            session()->flash('app_message', 'BulananAnak successfully updated');
            return redirect()->route('bulanan_anak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BulananAnak');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BulananAnak  $bulanananak
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BulananAnak $bulanananak)
    {
        if ($bulanananak->delete()) {
                session()->flash('app_message', 'BulananAnak successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BulananAnak');
            }

        return redirect()->back();
    }
}
