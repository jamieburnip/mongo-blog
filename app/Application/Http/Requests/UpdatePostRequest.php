<?php

namespace Blog\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'id' => 'required|string|alpha_num',
            'title' => 'required|string',
            'body' => 'required|string',
            'publish' => 'nullable|boolean',
        ];
    }
}
