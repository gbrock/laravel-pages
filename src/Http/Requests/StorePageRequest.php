<?php namespace Gbrock\Pages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest {

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
            'domain_id' => 'required|exists:page_domains,id',
            'slug' => 'sometimes|max:255',
            // Only validate the title if a publish was attempted
            'title' => (Input::get('publish_at') ? 'sometimes|' : '') . 'max:128',
            'default_meta_description' => 'sometimes|max:150',
            'template_id' => 'required|exists:page_templates,id',
            'content' => '',
            'publish_at' => 'sometimes|date_format:Y-m-d H:i:s',
        ];
    }
}
