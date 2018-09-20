<?php

namespace Modules\Wine\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateWineRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'type' => 'required|',
            'price' => 'required|numeric',
            'identifier' => 'required|numeric|min:1',
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
