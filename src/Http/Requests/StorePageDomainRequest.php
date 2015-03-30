<?php namespace Gbrock\Pages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gbrock\Pages\Models\PageDomain;

class StorePageDomainRequest extends FormRequest {

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
            'name' => 'required|alpha_num|max:64',
            'default_meta_description' => 'sometimes|max:150',
            'slug' => $this->getSlugRules(),
            'templates' => 'sometimes|array|exists:page_templates,id',
        ];
    }

    public function messages()
    {
        return [
            'slug.required' => 'Required, because a domain with an empty slug already exists.',
        ];
    }

    /**
     * Get the validation rules specifically applying to this domain's slug.
     * @return string
     */
    private function getSlugRules()
    {
        // One domain with a blank slug is allowed.  Check if it exists
        $hasEmptySlugDomain = PageDomain::where('slug', '=', null)->first() ? true : false;

        // Initialize the array of slug rules
        $slugRules = ['sometimes'];

        if($hasEmptySlugDomain)
        {
            // We already have one blank domain, so reinitialize our rules
            $slugRules = ['required'];
        }

        // Check the slug's characters
        $slugRules[] = 'regex:/^[a-z0-9\/-_]+$/';

        // Check that the slug is unique
        $uniquenessRule = 'unique:page_domains,slug';

        if($this->route('page_domain'))
        {
            // If we are editing a pre-existing domain, our uniqueness rule should ignore itself
            $uniquenessRule .= ',' . $this->route('page_domain')->id;
        }

        $slugRules[] = $uniquenessRule;

        $slugRules[] = 'max:64';

        return implode('|', $slugRules);
    }
}
