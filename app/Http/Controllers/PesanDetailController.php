<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PesanDetail;


/**
 * Description of PesanDetailController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PesanDetailController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pesan_detail.index', ['records' => PesanDetail::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PesanDetail  $pesandetail
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PesanDetail $pesandetail)
    {
        return view('pages.pesan_detail.show', [
                'record' =>$pesandetail,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pesan_detail.create', [
            'model' => new PesanDetail,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PesanDetail;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PesanDetail saved successfully');
            return redirect()->route('pesan_detail.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PesanDetail');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PesanDetail  $pesandetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PesanDetail $pesandetail)
    {

        return view('pages.pesan_detail.edit', [
            'model' => $pesandetail,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PesanDetail  $pesandetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PesanDetail $pesandetail)
    {
        $pesandetail->fill($request->all());

        if ($pesandetail->save()) {
            
            session()->flash('app_message', 'PesanDetail successfully updated');
            return redirect()->route('pesan_detail.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PesanDetail');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PesanDetail  $pesandetail
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PesanDetail $pesandetail)
    {
        if ($pesandetail->delete()) {
                session()->flash('app_message', 'PesanDetail successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PesanDetail');
            }

        return redirect()->back();
    }
}
