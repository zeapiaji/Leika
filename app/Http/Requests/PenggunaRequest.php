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
            'username' => 'required|min:3|max:12|unique:users,username,'.$this->id,
            'nama_lengkap' => 'required',
            'telp' => 'required|max:14|min:11',
            'usia' => 'required|max:2',
            'alamat' => 'required|min:8',
        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'foto_profil.required' => 'Foto Profil harus diisi!',
            'username.required' => 'Username harus diisi!',
            'username.unique' => 'Username sudah dipakai!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Format email salah!',
            'email.unique' => 'Email sudah dipakai!',
            'nama_lengkap' => 'Nama Lengkap harus diisi!',
            'telp.required' => 'Nomor Telepon harus diisi!',
            'telp.min' => 'Nomor Telepon maksimal 14 digit!',
            'telp.min' => 'Nomor Telepon minimal 11 digit!',
            'usia.required' => 'Usia harus diisi!',
            'usia.max' => 'Usia harus 2 digit!',
            'alamat' => 'Alamat harus diisi!',
        ];
    }
}
