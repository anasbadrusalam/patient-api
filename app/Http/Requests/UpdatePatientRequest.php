<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Enums\IdType;
use App\Enums\MediumAcquisition;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePatientRequest extends FormRequest
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
            'name'     => ['required', 'string', 'max:255'],
            'id_type'  => ['required', Rule::enum(IdType::class)],
            'id_no'    => [
                'required',
                'string',
                'max:100',
                Rule::unique('users')
                    ->where(fn($query) => $query->where('id_type', $this->id_type))
                    ->ignore($this->route('patient')->user_id),
            ],
            'gender'   => ['required', Rule::enum(Gender::class)],
            'dob'      => [
                'required',
                'date',
                'before:today',
                Rule::date()->format('Y-m-d')
            ],
            'address'  => ['nullable', 'string'],
            'medium_acquisition' => ['required', Rule::enum(MediumAcquisition::class)],
        ];
    }
}
