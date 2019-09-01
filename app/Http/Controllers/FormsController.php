<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Exception;

class FormsController extends Controller
{

    /**
     * Display a listing of the forms.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $forms = Form::with('form')->paginate(25);

        return view('forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new form.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $forms = Form::pluck('name', 'id')->all();
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();

        return view('forms.create', compact('forms', 'creators', 'updaters'));
    }

    /**
     * Store a new form in the storage.
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
            Form::create($data);

            return redirect()->route('forms.form.index')
                ->with('success_message', 'Form was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified form.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $form = Form::with('form', 'creator', 'updater')->findOrFail($id);

        return view('forms.show', compact('form'));
    }

    /**
     * Show the form for editing the specified form.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $form = Form::findOrFail($id);
        $forms = Form::pluck('name', 'id')->all();
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();

        return view('forms.edit', compact('form', 'forms', 'creators', 'updaters'));
    }

    /**
     * Update the specified form in the storage.
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
            $form = Form::findOrFail($id);
            $form->update($data);

            return redirect()->route('forms.form.index')
                ->with('success_message', 'Form was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified form from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $form = Form::findOrFail($id);
            $form->delete();

            return redirect()->route('forms.form.index')
                ->with('success_message', 'Form was successfully deleted!');

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
            'name' => 'required|string|min:1|max:100',
            'form_title' => 'required|string|min:1|max:100',
            'form_subtitle' => 'nullable|string|min:0|max:255',
            'form_target' => 'nullable|string|min:0|max:40',
            'encType' => 'nullable|string|min:0|max:20',
            'sub_form_of' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'is_innerForm' => 'boolean|nullable',
            'method' => 'required|string|min:1|max:10',
            'number_of_col' => 'required|numeric|min:-2147483648|max:2147483647',
            'form_id' => 'nullable',
            'form_class' => 'nullable|string|min:0|max:100',
            'additional_attr' => 'nullable',
            'created_by' => 'required',
            'updated_by' => 'nullable',
            'details' => 'nullable',
            'submit_for' => 'nullable|string|min:0|max:10',
            'status' => 'boolean|nullable',

        ];

        $data = $request->validate($rules);

        $data['is_innerForm'] = $request->has('is_innerForm');
        $data['status'] = $request->has('status');

        return $data;
    }

}
