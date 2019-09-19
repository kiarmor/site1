<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class GetPostRequest extends FormRequest
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
            'query' => ['string', 'min: 1'],
            'user_id' => ['integer', 'min: 1']
        ];
    }
}
