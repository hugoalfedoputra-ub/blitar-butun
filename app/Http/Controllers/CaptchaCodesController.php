<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CaptchaCodes;


/**
 * Description of CaptchaCodesController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class CaptchaCodesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.captcha_codes.index', ['records' => CaptchaCodes::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  CaptchaCodes  $captchacodes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CaptchaCodes $captchacodes)
    {
        return view('pages.captcha_codes.show', [
                'record' =>$captchacodes,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.captcha_codes.create', [
            'model' => new CaptchaCodes,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new CaptchaCodes;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'CaptchaCodes saved successfully');
            return redirect()->route('captcha_codes.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving CaptchaCodes');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  CaptchaCodes  $captchacodes
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CaptchaCodes $captchacodes)
    {

        return view('pages.captcha_codes.edit', [
            'model' => $captchacodes,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  CaptchaCodes  $captchacodes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CaptchaCodes $captchacodes)
    {
        $captchacodes->fill($request->all());

        if ($captchacodes->save()) {
            
            session()->flash('app_message', 'CaptchaCodes successfully updated');
            return redirect()->route('captcha_codes.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating CaptchaCodes');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  CaptchaCodes  $captchacodes
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, CaptchaCodes $captchacodes)
    {
        if ($captchacodes->delete()) {
                session()->flash('app_message', 'CaptchaCodes successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting CaptchaCodes');
            }

        return redirect()->back();
    }
}
