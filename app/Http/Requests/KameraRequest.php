<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KameraRequest extends FormRequest
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
            'tanggal_rilis' => 'required',
            'deskripsi' => 'required',
            'shutter_count' => 'required',
            'tipe_sensor' => 'required',
            'jumlah_piksel' => 'required',
            'baterai' => 'required',
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
            'deskripsi.required' => 'Deskripsi produk harus diisi!',
            'shutter_count.required' => 'SC produk harus diisi!',
            'tipe_sensor.required' => 'Tipe sensor produk harus diisi!',
            'jumlah_piksel.required' => 'Jumlah piksel harus diisi!',
            'baterai.required' => 'Daya baterai harus diisi!',
            'mounting.required' => 'Pilih mounting produk!',
        ];
    }
}
