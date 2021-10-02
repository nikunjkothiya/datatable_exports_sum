<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $trim = true;

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'donnor_name' => 'required',
            'benefactor_name' => 'required',
            'amount' => 'required|numeric',
            'address' => 'required',
            'contact' => 'required|numeric'
        ];
    }
}
