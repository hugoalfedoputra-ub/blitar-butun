<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelapak;


/**
 * Description of PelapakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PelapakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pelapak.index', ['records' => Pelapak::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Pelapak  $pelapak
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pelapak $pelapak)
    {
        return view('pages.pelapak.show', [
                'record' =>$pelapak,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pelapak.create', [
            'model' => new Pelapak,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Pelapak;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Pelapak saved successfully');
            return redirect()->route('pelapak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Pelapak');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Pelapak  $pelapak
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Pelapak $pelapak)
    {

        return view('pages.pelapak.edit', [
            'model' => $pelapak,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Pelapak  $pelapak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pelapak $pelapak)
    {
        $pelapak->fill($request->all());

        if ($pelapak->save()) {
            
            session()->flash('app_message', 'Pelapak successfully updated');
            return redirect()->route('pelapak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Pelapak');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Pelapak  $pelapak
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Pelapak $pelapak)
    {
        if ($pelapak->delete()) {
                session()->flash('app_message', 'Pelapak successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Pelapak');
            }

        return redirect()->back();
    }
}
