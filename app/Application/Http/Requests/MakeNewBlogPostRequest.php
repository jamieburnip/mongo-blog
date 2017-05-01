<?php

namespace Blog\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MakeNewBlogPostRequest
 *
 * @package Blog\Application\Http\Requests
 */
class MakeNewBlogPostRequest extends FormRequest
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
            'title' => 'required|string',
            'body' => 'required|string|',
        ];
    }
}
