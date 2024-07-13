<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPendudukKursus;


/**
 * Description of RefPendudukKursusController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPendudukKursusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefPendudukKursus::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukKursus  $refpendudukkursus
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $refpendudukkursus = RefPendudukKursus::find($id);
        if ($refpendudukkursus) {
            return response()->json($refpendudukkursus);
        }
        return response()->json(['message' => 'RefPendudukKursus not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_penduduk_kursus.create', [
            'model' => new RefPendudukKursus,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPendudukKursus;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPendudukKursus saved successfully');
            return redirect()->route('ref_penduduk_kursus.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPendudukKursus');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukKursus  $refpendudukkursus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPendudukKursus $refpendudukkursus)
    {

        return view('pages.ref_penduduk_kursus.edit', [
            'model' => $refpendudukkursus,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPendudukKursus  $refpendudukkursus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPendudukKursus $refpendudukkursus)
    {
        $refpendudukkursus->fill($request->all());

        if ($refpendudukkursus->save()) {
            
            session()->flash('app_message', 'RefPendudukKursus successfully updated');
            return redirect()->route('ref_penduduk_kursus.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPendudukKursus');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPendudukKursus  $refpendudukkursus
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPendudukKursus $refpendudukkursus)
    {
        if ($refpendudukkursus->delete()) {
                session()->flash('app_message', 'RefPendudukKursus successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPendudukKursus');
            }

        return redirect()->back();
    }
}
