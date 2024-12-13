<?php

namespace Modules\Withdrawal\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'number' => ['required', 'confirmed', 'digits:9'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
