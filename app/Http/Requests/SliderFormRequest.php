<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:100',
            'link' => '',
            'link_button' => ''
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'To pole jest wymagane',
            'title.max.string' => 'Maksymalna ilość znaków: 100',
            'title.min.string' => 'Minimalna ilość znaków: 5'
        ];
    }
}
