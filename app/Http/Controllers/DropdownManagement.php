<?php

namespace App\Http\Controllers;

use App\Models\Dropdown;
use App\Models\Module;
use App\Models\UserLevel;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use URL;
use DB;
use \Carbon\Carbon;

class DropdownManagement extends Controller
{
    public function index(){
        $pageData = [
            'modal'=>'includes.apsysmodal',
            'title'=>'Dropdown Form',
            'getRawUrl'=>URL::to('getDropdownRaw'),
            'content' => [
                'new'=>'dropdown.new',
                'view'=>'dropdown.view',
                'search'=>'dropdown.search',
                'sampleImport'=>'dropdown.sampleimport',
            ],
            'action' => [
                'new'=>array('class'=>'btn btn-primary btn-xs', 'id'=>'new', 'data-toggle'=>'modal', 'data-target'=>'#newModal'),
                'edit'=>array('class'=>'btn btn-warning btn-xs', 'id'=>'edit', 'data-toggle'=>'modal', 'data-target'=>'#newModal'),
                'view'=>array('class'=>'btn btn-info btn-xs', 'id'=>'view', 'data-toggle'=>'modal', 'data-target'=>'#viewModal'),
                'delete'=>array('class'=>'btn btn-danger btn-xs'),
                'sampleImport'=>array('class'=>'btn btn-success btn-xs', 'data-toggle'=>'modal', 'data-target'=>'#sampleImportModal'),
            ],
            'propsData' => [
                'th' => ['dropdown_slug', 'sqltext','value_field','option_field','multiple','dropdown_name'],
                'tdata' => Dropdown::all('id', 'dropdown_slug', 'sqltext','value_field','option_field','multiple','dropdown_name')->sortByDesc('id')->toArray()
            ],
        ];
        return view('dropdown.list',compact('pageData'));
    }

    public function store(Request $request){
        $rules = [
            'dropdown_slug' => 'required|unique:sys_dropdowns,dropdown_slug,"' . $request->id . '"'
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'message' => $validated->errors()]);
        }
        try {
            if ($request->id > 0) {
                $record = Dropdown::findOrFail($request->id);
                $record->dropdown_slug = $request->dropdown_slug;
                $record->sqltext = $request->sqltext;
                $record->value_field = $request->value_field;
                $record->option_field = $request->option_field;
                $record->multiple = $request->multiple;
                $record->dropdown_name = $request->dropdown_name;
                $record->description = $request->description;
                $record->save();
                return response()->json(['status' => 'success', 'message' => 'Data Successfully updated']);
            } else {
                $record = new Dropdown();
                $record->dropdown_slug = $request->dropdown_slug;
                $record->sqltext = $request->sqltext;
                $record->value_field = $request->value_field;
                $record->option_field = $request->option_field;
                $record->multiple = $request->multiple;
                $record->dropdown_name = $request->dropdown_name;
                $record->description = $request->description;
                $record->created_by = Auth::id();
                $record->save();
                $dpId = DB::getPdo()->lastInsertId();
                return response()->json(['status' => 'success', 'message' => 'Data Successfully added']);
            }
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function getDropdownRaw(Request $request)
    {
        return response()->json(Dropdown::find($request->id));
    }

    public function destroy($id)
    {
        //
    }
}
