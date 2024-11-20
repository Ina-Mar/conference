<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceRequest extends FormRequest
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

                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'date' => 'required|date',
                'location' => 'required|string',
                'contact_person' => 'string|required|max:70',
                'contact_email' => 'email|required',
                'photo'=>'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
                'lecturers'=>'array|nullable',
                'programme'=>'array|nullable',

        ];
    }
}