<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class QuizzeRequest extends FormRequest
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
        $commons = [

        ];
        return get_request_rules($this, $commons);
    }

//    public function novelComRules()
//    {
//        return [
//            'novel_id' => 'required|exists:novels,id',
//            'member_id' => 'required|exists:members,id',
//            'novel_content' => 'required',
//        ];
//    }
}
