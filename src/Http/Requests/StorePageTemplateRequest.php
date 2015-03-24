<?php namespace Gbrock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageTemplateRequest extends FormRequest {

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:64',
            'body' => 'required|valid_html',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     * @return array
     */
    public function messages()
    {
        return [
            'valid_html' => 'The :attribute field must contain valid HTML.',
        ];
    }
}
