<?php namespace App\Http\Requests;

class RsvpEditRequest extends Request
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
        $rules = [];
        $firstId = key($this->request->get('firstName'));

        foreach ($this->request->get('firstName') as $key => $val) {
            $rules['firstName.' . $key] = 'required|min:2';
            $rules['lastName.' . $key] = 'required|min:2';
            $rules['email.' . $firstId] = 'required|email';
            $rules['phone_number.' . $firstId] = 'required|min:10';
            $rules['food.' . $key] = 'required';
        }
        return $rules;
    }

}
