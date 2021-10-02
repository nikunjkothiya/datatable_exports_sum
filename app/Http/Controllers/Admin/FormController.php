<?php

namespace App\Http\Controllers\Admin;

use App\Models\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreFormRequest;
use App\Http\Requests\Admin\UpdateFormRequest;
use DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $forms = Form::orderByDesc('id')->get();
            return view('admin.form.index', compact('forms'));
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $offer = new Form();
            $offer->donnor_name = $request->donnor_name;
            $offer->benefactor_name = $request->benefactor_name;
            $offer->amount = $request->amount;
            $offer->address = $request->address;
            $offer->contact = $request->contact;
            $offer->save();

            DB::commit();
            return redirect()->back()->with('message', 'Form submit successfully');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $form = Form::find($id);
            return view('admin.form.show', compact('form'));
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $form = Form::find($id);

            return view('admin.form.edit', compact('form'));
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, Form $form)
    {
        DB::beginTransaction();
        try {
            $offer = Form::find($form->id);
            $offer->donnor_name = $request->donnor_name;
            $offer->benefactor_name = $request->benefactor_name;
            $offer->amount = $request->amount;
            $offer->address = $request->address;
            $offer->contact = $request->contact;
            $offer->save();

            DB::commit();
            return redirect()->route('admin.offers.index')->with('message', 'Form update successfully');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $offer = Form::find(request('ids'));
            $offer->delete();
            DB::commit();
            return response()->noContent();
        } catch (\Exception $e) {
            DB::rollback();
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    public function switchUpdate(Request $request)
    {
        try {
            $offer = Form::find($request->ids);
            if (empty($offer->is_active)) {
                $offer->is_active = 1;
            } else {
                $offer->is_active = 0;
            }
            $offer->save();
            return response()->noContent();
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }
}
