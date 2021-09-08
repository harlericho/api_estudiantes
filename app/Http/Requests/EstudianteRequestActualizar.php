<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequestActualizar extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'dni' => 'required|min:10|max:10|unique:estudiantes,dni,' . $this->route('estudiante')->id,
            'nombres' => 'required',
            'correo' => 'required|email|unique:estudiantes,correo,' . $this->route('estudiante')->id,
            'telefono' => 'required|min:10|max:10|unique:estudiantes,telefono,' . $this->route('estudiante')->id,
            'direccion' => 'required',
        ];
    }
}
