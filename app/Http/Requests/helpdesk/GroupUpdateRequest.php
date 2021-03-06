<?php

namespace App\Http\Requests\helpdesk;

use App\Http\Requests\Request;

/**
 * GroupRequest.
 *
 * @author  Ladybird <info@ladybirdweb.com>
 */
class GroupUpdateRequest extends Request
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
         'name'   => 'required|max:30|unique:groups,name,'.$this->segment(2),
            // 'name' => 'required|max:30',
        ];
    }
}
