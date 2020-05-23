<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
            return [
                'category_id'=>'required',
                'sub_category_id'    =>'required',
                'name'=>'required',
                'description'    =>'required',
                'actual_price'    =>'required',
                'sell_price'    =>'required',
                'description'    =>'required',
                'skunumber'    =>'required',
             
            ];
      
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
