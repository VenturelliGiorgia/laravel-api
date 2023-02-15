<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => 'required|max:255',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id',
            'description' => 'required|string',
            'github_link' => 'required|url|regex:/github/',
            'cover_img' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obbligatorio',
            'name.max' => 'Il titolo è troppo lungo, deve avere massimo 255 caratteri',
            'type_id.required' => 'Campo obbligatorio',
            'description.required' => 'Campo obbligatorio',
            'github_link.required' => 'Campo obbligatorio',
            'github_link.url' => 'Inserisci un link',
            'cover_img.required' => 'Campo obbligatorio',
            'cover_img.image' => 'Carica una immagine',
        ];
    }
}
