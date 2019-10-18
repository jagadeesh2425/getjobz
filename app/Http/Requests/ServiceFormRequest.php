<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class ServiceFormRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT':
            case 'POST': {

                    $id = (int) $this->input('id', 0);
                    $unique_id = ($id > 0) ? ',' . $id : '';

                    return [
                        "service_title" => "required",
                        "service_description" => "required",
                        "service_price" => "required",
                        "service_num_days" => "required",
                        "service_num_listings" => "required",
                        "service_for" => "required",
                    ];
                }
            default:break;
        }
    }
}
