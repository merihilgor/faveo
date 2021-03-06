<?php

namespace App\Plugins\ServiceDesk\Requests;

use App\Http\Requests\Request;

class CreateCabupdateRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
             'name'   => 'required|max:50|unique:sd_cab,name,'.$this->segment(3 ),

            
        ];
    }

    public function messages() {
        return [
            //'name' => 'Staus Required',
         
        ];
    }

}
