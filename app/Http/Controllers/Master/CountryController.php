<?php

namespace App\Http\Controllers\Master;

use App\Helpers\ApsysHelper;
use App\Models\Master\Country;
use Illuminate\Http\Request;
use Validator;
use Auth;
use URL;
use DB;

class CountryController extends Controller
{
    /********************************************
     * Create listing                           *
     *******************************************/

    public function index()
    {
        $pageData = [
            'propsData' => [
                'th' => ['country_id', 'country_name', 'description', 'status'],
                'tdata' => Country::all('country_id', 'country_name', 'description', 'status')->sortByDesc('countrys_id')->toArray()
            ],

        ];

        return view('Master.Country.list', compact('pageData'));
    }

    /********************************************
     * Add Form                                 *
     *******************************************/

    public function create()
    {
        return view('Master.Country.create');
    }

    /********************************************
     * Store Data                               *
     *******************************************/

    public function store(Request $request)
    {
        $rules = [
            'country_id' => 'required',
            'country_name' => 'required',
            'description' => 'required',

        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'message' => $validated->errors()]);
        }
        try {
            if ($request->id > 0) {
                $record = Country::findOrFail($request->id);
                $record->country_id = $request->country_id;
                $record->country_name = $request->country_name;
                $record->description = $request->description;

                $record->save();
                return response()->json(['status' => 'success', 'message' => 'Data Successfully updated']);
            } else {
                $record = new Country();
                $record->country_id = $request->country_id;
                $record->country_name = $request->country_name;
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
        $records = Country::find($id);
        return view('Master.Country.edit', compact('records'));
    }

    /********************************************
     * Delete record                            *
     *******************************************/

    public function destroy($id)
    {
        $Country = Country::find($id);
        $Country->delete();

        return redirect('/')->with('success', 'Record deleted!');
    }
}
