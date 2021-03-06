<?php

namespace Blog\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateBlogPostRequest
 *
 * @package Blog\Application\Http\Requests
 */
class CreateBlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'body' => 'required|string',
            'publish' => 'required|boolean',
        ];
    }
}
