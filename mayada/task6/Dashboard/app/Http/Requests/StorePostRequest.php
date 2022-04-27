<?php

namespace App\Http\Requests;

use App\Http\Controllers\dashboard\productController;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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

            'name_en' => ['required', 'string', 'max:32'],
            'name_ar' => ['required', 'string', 'max:32'],
            'code' => ['required', 'unique:products', 'max:20'],
            'price' => ['required', 'numeric', 'between:1,999999.99'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:99'],
            'desc_ar' => ['required', 'string'],
            'desc_en' => ['required', 'string'],
            'status' => ['nullable', 'in:' . implode(',', array_keys(productController::STATUSES))],
            'barnd_id' => ['nullable', 'integer', 'exists:brands,id'],
            'subcategory_id' => ['required', 'integer', 'exists:subcategories,id'],
            'image' => ['required', 'max:' . productController::MAX_IMAGE_SIZE, 'mimes:' . implode(',', productController::AVALIABLE_EXTENSION)]


        ];
    }
}
