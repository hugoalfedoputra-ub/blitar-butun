<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebStatusKtp;


/**
 * Description of TwebStatusKtpController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebStatusKtpController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebStatusKtp::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebStatusKtp  $twebstatusktp
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebstatusktp = TwebStatusKtp::find($id);
        if ($twebstatusktp) {
            return response()->json($twebstatusktp);
        }
        return response()->json(['message' => 'TwebStatusKtp not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_status_ktp.create', [
            'model' => new TwebStatusKtp,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebStatusKtp;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebStatusKtp saved successfully');
            return redirect()->route('tweb_status_ktp.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebStatusKtp');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebStatusKtp  $twebstatusktp
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebStatusKtp $twebstatusktp)
    {

        return view('pages.tweb_status_ktp.edit', [
            'model' => $twebstatusktp,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebStatusKtp  $twebstatusktp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebStatusKtp $twebstatusktp)
    {
        $twebstatusktp->fill($request->all());

        if ($twebstatusktp->save()) {
            
            session()->flash('app_message', 'TwebStatusKtp successfully updated');
            return redirect()->route('tweb_status_ktp.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebStatusKtp');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebStatusKtp  $twebstatusktp
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebStatusKtp $twebstatusktp)
    {
        if ($twebstatusktp->delete()) {
                session()->flash('app_message', 'TwebStatusKtp successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebStatusKtp');
            }

        return redirect()->back();
    }
}
