<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\DiscountCode;
class CheckDiscountCode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $discount_codess = DiscountCode::where('discount_code',$value)->get();
        foreach($discount_codess as $u){
            if($u->discount_code == $value){
                return true;
            }
         
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Discount Code Not Match.';
    }
}
