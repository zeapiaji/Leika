<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenggunaRequest extends FormRequest
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
        $rules = [
            'email' => 'required|email|unique:users,email,'.$this->id,
            'username' => 'required',
            'nama_lengkap' => 'required',
            'telp' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'foto_profil.required' => 'Foto Profil harus diisi!',
            'username' => 'Username harus diisi!',
            'email' => 'Email harus diisi!',
            'nama_lengkap' => 'Nama Lengkap harus diisi!',
            'telp' => 'Nomor Telepon harus diisi!',
            'usia' => 'Usia harus diisi!',
            'alamat' => 'Alamat harus diisi!',
        ];
    }
}
