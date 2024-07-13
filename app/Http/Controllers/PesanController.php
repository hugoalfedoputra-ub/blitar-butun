<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pesan;


/**
 * Description of PesanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PesanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Pesan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pesan $pesan)
    {
        return view('pages.pesan.show', [
                'record' =>$pesan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pesan.create', [
            'model' => new Pesan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Pesan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Pesan saved successfully');
            return redirect()->route('pesan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Pesan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Pesan $pesan)
    {

        return view('pages.pesan.edit', [
            'model' => $pesan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pesan $pesan)
    {
        $pesan->fill($request->all());

        if ($pesan->save()) {
            
            session()->flash('app_message', 'Pesan successfully updated');
            return redirect()->route('pesan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Pesan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Pesan  $pesan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Pesan $pesan)
    {
        if ($pesan->delete()) {
                session()->flash('app_message', 'Pesan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Pesan');
            }

        return redirect()->back();
    }
}
