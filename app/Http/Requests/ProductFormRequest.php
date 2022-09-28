<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|numeric|gt:0'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es obligatorio',
            'description.required' => 'La descripcion es obligatoria',
            'price.required' => 'El precio es obligatorio',
            'category_id.gt' => 'Seleccione una categoria',
        ];
    }
}
