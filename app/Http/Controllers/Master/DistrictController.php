<?php

namespace App\Http\Controllers\Master;

use App\Helpers\ApsysHelper;
use App\Models\Master\District;
use Illuminate\Http\Request;
use Validator;
use Auth;
use URL;
use DB;

class DistrictController extends Controller
{
    /********************************************
     * Create listing                           *
     *******************************************/

    public function index()
    {
        $pageData = [
            'propsData' => [
                'th' => ['district_id', 'countrys_id', 'district_name', 'description', 'status'],
                'tdata' => District::all('district_id', 'countrys_id', 'district_name', 'description', 'status')->sortByDesc('districts_id')->toArray()
            ],

        ];

        return view('Master.District.list', compact('pageData'));
    }

    /********************************************
     * Add Form                                 *
     *******************************************/

    public function create()
    {
        return view('Master.District.create');
    }

    /********************************************
     * Store Data                               *
     *******************************************/

    public function store(Request $request)
    {
        $rules = [
            'district_id' => 'required',
            'countrys_id' => 'required',
            'district_name' => 'required',
            'description' => 'required',

        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'message' => $validated->errors()]);
        }
        try {
            if ($request->id > 0) {
                $record = District::findOrFail($request->id);
                $record->district_id = $request->district_id;
                $record->countrys_id = $request->countrys_id;
                $record->district_name = $request->district_name;
                $record->description = $request->description;

                $record->save();
                return response()->json(['status' => 'success', 'message' => 'Data Successfully updated']);
            } else {
                $record = new District();
                $record->district_id = $request->district_id;
                $record->countrys_id = $request->countrys_id;
                $record->district_name = $request->district_name;
                $record->description = $request->description;

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

    public function edit($id)
    {
        $records = District::find($id);
        return view('Master.District.edit', compact('records'));
    }

    /********************************************
     * Delete record                            *
     *******************************************/

    public function destroy($id)
    {
        $District = District::find($id);
        $District->delete();

        return redirect('/')->with('success', 'Record deleted!');
    }
}
