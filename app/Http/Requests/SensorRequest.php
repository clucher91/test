<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SensorRequest extends FormRequest
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
            'point_name' => ['string', 'max:191'],
            'point_x' => ['required', 'integer'],
            'point_y' => ['required', 'integer']
        ];
    }

    public function attributes()
    {
        return $this->only([
            'point_name',
            'point_x',
            'point_y'
        ]);
    }
}
