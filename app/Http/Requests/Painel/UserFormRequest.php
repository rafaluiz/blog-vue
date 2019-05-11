<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name'          => 'required|min:3|max:100',
            'email'         => "required|min:3|max:100|email|unique:users,email,{$this->segment(3)},id",
            'password'      => 'required|min:3|max:20|confirmed',
            'matricula'      => 'required',
            'datanascimento'       => 'required',
            'cep'        => 'required',
            'logradouro'          'required',
            'numero'  => 'required',
            'complemento'         => 'required',
            'bairro'  => 'required',
            'cidade'  => 'required',
            'uf'  => 'required',
            'naturalidade'  => 'required',
            'nacionalidade'  => 'required',
            'sexo'  => 'required',
            'cpf'  => 'required',
            'telefone'  => 'required',
            'teleftwo'  => 'required',
            'celular'  => 'required',
            'tipo'  => 'required',
        ];
    }
}
