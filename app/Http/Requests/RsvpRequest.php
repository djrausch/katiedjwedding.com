<?php namespace App\Http\Requests;

class RsvpRequest extends Request
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

        foreach ($this->request->get('firstName') as $key => $val) {
            $rules['firstName.' . $key] = 'required|min:2';
            $rules['lastName.' . $key] = 'required|min:2';
            $rules['email.0'] = 'required|email';
            $rules['phone_number.0'] = 'required|min:10';

        }
        $rules['g-recaptcha-response'] = 'recaptcha';

        return $rules;
    }

}
