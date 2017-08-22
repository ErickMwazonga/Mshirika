<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class InstitutionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if ( ! Auth::check() )
       {
           return false;
       }

      return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'PATCH')
        {
          return [
            'name' => 'required|string|max:255',
            'status' => 'required',
            'cname' => 'required|string',
            'phone' => 'required|alpha_num',
            'email' => 'required|email|unique:institutions,email,' . $this->id,
          ];
        }
        else{
          return [
            'name' => 'required|string|max:255',
            'status' => 'required',
            'cname' => 'required|string|max:255',
            'phone' => 'required|min:10|alpha_num',
            'email' => 'required|string|email|max:255|unique:institutions,email',
          ];
        }
    }
}
