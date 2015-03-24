<?php namespace Gbrock\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageTemplateRequest extends FormRequest {

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
}
