<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Form;
use App\Models\FormItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Exception;

class FormItemsController extends Controller
{

    /**
     * Display a listing of the form items.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $formItems = FormItem::with('form')->paginate(25);

        return view('form_items.index', compact('formItems'));
    }

    /**
     * Show the form for creating a new form item.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $forms = Form::pluck('name','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        return view('form_items.create', compact('forms','creators','updaters'));
    }

    /**
     * Store a new form item in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            $data['created_by'] = Auth::Id();
            FormItem::create($data);

            return redirect()->route('form_items.form_item.index')
                             ->with('success_message', 'Form Item was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified form item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $formItem = FormItem::with('form','creator','updater')->findOrFail($id);

        return view('form_items.show', compact('formItem'));
    }

    /**
     * Show the form for editing the specified form item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $formItem = FormItem::findOrFail($id);
        $forms = Form::pluck('name','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        return view('form_items.edit', compact('formItem','forms','creators','updaters'));
    }

    /**
     * Update the specified form item in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);
            $data['updated_by'] = Auth::Id();
            $formItem = FormItem::findOrFail($id);
            $formItem->update($data);

            return redirect()->route('form_items.form_item.index')
                             ->with('success_message', 'Form Item was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified form item from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $formItem = FormItem::findOrFail($id);
            $formItem->delete();

            return redirect()->route('form_items.form_item.index')
                             ->with('success_message', 'Form Item was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'forms_id' => 'required',
            'tag' => 'required|string|min:1|max:10',
            'type' => 'required|string|min:1|max:20',
            'label' => 'nullable|string|min:0|max:100',
            'placeholder' => 'nullable|string|min:0|max:100',
            'required' => 'boolean',
            'readonly' => 'nullable|boolean',
            'tagClassName' => 'nullable|string|min:0|max:100',
            'tagName' => 'nullable|string|min:0|max:100',
            'tagId' => 'nullable|string|min:0|max:100',
            'tabIndex' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'additional_attr' => 'nullable',
            'datasource' => 'nullable|string|min:0|max:2147483647',
            'created_by' => 'required',
            'updated_by' => 'nullable',
            'details' => 'nullable',
            'status' => 'boolean|nullable',

        ];

        $data = $request->validate($rules);

        $data['required'] = $request->has('required');
        $data['readonly'] = $request->has('readonly');
        $data['status'] = $request->has('status');

        return $data;
    }

}
