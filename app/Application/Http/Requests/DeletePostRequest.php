<?php

namespace Blog\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreatePostRequest
 *
 * @package Blog\Application\Http\Requests
 */
class DeletePostRequest extends FormRequest
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
            'postId' => 'required|string',
        ];
    }
}
