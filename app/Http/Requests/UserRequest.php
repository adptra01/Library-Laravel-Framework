<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        'noId' => 'required|integer|digits_between:8,13|unique:users,noId,'.$this->id,
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'password'=> 'min:5',
        'isAdmin' => 'required|integer',
        'birthday' => 'required',
        'gender'  => 'required|integer',
        'address' => 'required|min:5',
        'telp' => 'required|string|digits_between:11,12',
        'status' => 'required|integer',
        ];
    }
}
