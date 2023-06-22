<?php

namespace App\Http\Requests\Api\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer|exists:authors,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необходимо указать название книги',
            'title.string' => 'Название книги должно быть строкой',
            'title.max' => 'Название книги не длиннее 255',

            'author_id.required' => 'Необходимо указать автора книги',
            'author_id.integer' => 'author_id должно быть типа integer',
            'author_id.exists' => 'Указанного автора не существуетт',
        ];
    }
}
