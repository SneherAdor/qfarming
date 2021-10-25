<?php

namespace App\Http\Requests\Farmer;

use Illuminate\Foundation\Http\FormRequest;

class FarmerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    public function rules()
    {
        return [
            'name'           => 'required',
            'phone1'         => 'required',
            'email'          => 'email',
            'address'        => 'required',
            'opening_balance'=> 'required|numeric',
            'status'         => 'required',
        ];
    }
}
