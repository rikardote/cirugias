<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AnestesiologosRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'nombres' => 'min:2|max:20|required',
            'apellido_pat' => 'min:2|max:20|required',
            'apellido_mat' => 'min:2|max:20|required',
        ];
    }
}
