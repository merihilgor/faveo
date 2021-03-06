<?php

namespace App\Http\Requests\helpdesk;

use App\Http\Requests\Request;

/**
 * DepartmentUpdate.
 *
 * @author  Ladybird <info@ladybirdweb.com>
 */
class DepartmentUpdate extends Request
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
         'name'   => 'required|max:50|unique:department,name,'.$this->segment(2),
            // 'name' => 'required|max:30',
        ];
    }
}
