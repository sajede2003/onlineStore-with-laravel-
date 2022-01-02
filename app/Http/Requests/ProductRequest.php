<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title'=>'required',
            'description' => 'required',
            'pic' => 'required|mimes:jpg,png,jpeg|max:5048',
            'price' => 'required',
            'count' => 'required',
            'category_id' => 'required',
        ];
    }

    public function createProduct($product)
    {
        $validData = (object) $this->validated();
        $newImageName = time() . '_' . $validData->title . '.' .
            $validData->pic->extension();
        $validData->pic->move(public_path('images') , $newImageName);

        $product->create([
            'title'=>$validData->title,
            'description'=>$validData->description,
            'price'=>$validData->price,
            'count'=>$validData->count,
            'pic'=> $newImageName,
            'category_id'=>$validData->category_id,
        ]);
    }
}
