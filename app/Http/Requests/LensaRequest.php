<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LensaRequest extends FormRequest
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
            'nama_barang' => 'required',
            'kondisi' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'tanggal_rilis' => 'required|date_format:Y-m-d',
            'deskripsi' => 'required',
            'focal_length' => 'required',
            'aperture' => 'required',
            'berat' => 'required',
            'mounting' => 'required',
        ];
    
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama_barang.required' => 'Nama barang harus diisi!',
            'kondisi.required' => 'Pilih kondisi produk!',
            'kategori.required' => 'Pilih kategori produk!',
            'merek.required' => 'Pilih merek produk!',
            'tanggal_rilis.required' => 'Tanggal dirilis produk harus diisi!',
            'tanggal_rilis.date_format' => 'Format Tanggal dirilis salah!',
            'deskripsi.required' => 'Deskripsi produk harus diisi!',
            'focal_length.required' => 'Focal length produk harus diisi!',
            'aperture.required' => 'Aperture harus diisi!',
            'berat.required' => 'Berat harus diisi!',
            'mounting.required' => 'Pilih mounting produk!',
        ];
    }
}
