<?php

namespace App\Http\Controllers\Master;

use App\Helpers\ApsysHelper;
use App\Models\Master\[module];
use Illuminate\Http\Request;
use Validator;
use Auth;
use URL;
use DB;

class [module]Controller extends Controller
{
    /********************************************
     * Create listing                           *
     *******************************************/

    public function index()
    {
        $pageData = [
            'propsData' => [
                'th' => [[th]],
                'tdata' => [tdata]
            ],
            [dropdown]
        ];

        return view('Master.[module].list', compact('pageData'));
    }

    /********************************************
     * Add Form                                 *
     *******************************************/

    public function create()
    {
        return view('Master.[module].create');
    }

    /********************************************
     * Store Data                               *
     *******************************************/

    public function store( Request $request )
    {
        $rules = [
            [rules]
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'message' => $validated->errors()]);
        }
        try {
            if ($request->id > 0) {
                $record = [module]::findOrFail($request->id);
                [save_data]
                $record->save();
                return response()->json(['status' => 'success', 'message' => 'Data Successfully updated']);
            } else {
                $record = new [module]();
                [save_data]
                $record->created_at = date('Y-m-d');
                $record->created_by = Auth::id();
                $record->save();
                return response()->json(['status' => 'success', 'message' => 'Data Successfully added']);
            }
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /********************************************
     * Edit Form with single raw data           *
     *******************************************/

    public function edit( $id )
    {
        $records = [module]::find($id);
        return view('Master.[module].edit', compact('records'));
    }

    /********************************************
     * Delete record                            *
     *******************************************/

    public function destroy( $id )
    {
        $[module] = [module]::find($id);
        $[module]->delete();

        return redirect('/')->with('success', 'Record deleted!');
    }
}
