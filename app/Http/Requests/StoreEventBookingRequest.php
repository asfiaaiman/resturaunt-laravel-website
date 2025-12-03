<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_id' => ['required', 'exists:events,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'time' => ['nullable'],
            'people' => ['nullable', 'integer', 'min:1'],
            'message' => ['nullable', 'string'],
        ];
    }
}


