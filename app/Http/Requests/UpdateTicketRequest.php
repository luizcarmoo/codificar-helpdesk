<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

        public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'priority' => ['required'],
            'status' => ['required'],

            'responsible_id' => [
                'nullable',
                'exists:responsibles,id'
            ],
        ];
    }
}