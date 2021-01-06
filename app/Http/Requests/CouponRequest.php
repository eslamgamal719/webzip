<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'promo_code' => 'required|max:10',
            'discount_type' => 'required|in:percent,value',
            'discount_limit' => 'required|max:8|numeric',
            'discount_value' => 'required|max:8|numeric',
            'user_id' => 'required|numeric',
        ];
    }

}
