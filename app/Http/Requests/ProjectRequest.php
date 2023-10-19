<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "titolo" => "nullable|string|max:255",
            "descrizione" => "required|string",
            "link_git" => "nullable|string",
            "image" => "nullable|image|max:6000",
            "categorie_id" => "nullable|exists:categories,id",
            "techs" => "nullable"
        ];
    }
}
