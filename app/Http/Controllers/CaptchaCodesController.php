<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CaptchaCodesModel;


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
        return view('pages.captcha_codes.index', ['records' => CaptchaCodesModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  CaptchaCodesModel  $captchacodesmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CaptchaCodesModel $captchacodesmodel)
    {
        return view('pages.captcha_codes.show', [
                'record' =>$captchacodesmodel,
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
            'model' => new CaptchaCodesModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new CaptchaCodesModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'CaptchaCodesModel saved successfully');
            return redirect()->route('captcha_codes.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving CaptchaCodesModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  CaptchaCodesModel  $captchacodesmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CaptchaCodesModel $captchacodesmodel)
    {

        return view('pages.captcha_codes.edit', [
            'model' => $captchacodesmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  CaptchaCodesModel  $captchacodesmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CaptchaCodesModel $captchacodesmodel)
    {
        $captchacodesmodel->fill($request->all());

        if ($captchacodesmodel->save()) {
            
            session()->flash('app_message', 'CaptchaCodesModel successfully updated');
            return redirect()->route('captcha_codes.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating CaptchaCodesModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  CaptchaCodesModel  $captchacodesmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, CaptchaCodesModel $captchacodesmodel)
    {
        if ($captchacodesmodel->delete()) {
                session()->flash('app_message', 'CaptchaCodesModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting CaptchaCodesModel');
            }

        return redirect()->back();
    }
}
