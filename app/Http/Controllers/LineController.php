<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Line;


/**
 * Description of LineController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LineController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Line::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Line  $line
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $line = Line::find($id);
        if ($line) {
            return response()->json($line);
        }
        return response()->json(['message' => 'Line not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.line.create', [
            'model' => new Line,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Line;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Line saved successfully');
            return redirect()->route('line.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Line');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Line  $line
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Line $line)
    {

        return view('pages.line.edit', [
            'model' => $line,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Line  $line
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Line $line)
    {
        $line->fill($request->all());

        if ($line->save()) {
            
            session()->flash('app_message', 'Line successfully updated');
            return redirect()->route('line.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Line');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Line  $line
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Line $line)
    {
        if ($line->delete()) {
                session()->flash('app_message', 'Line successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Line');
            }

        return redirect()->back();
    }
}
