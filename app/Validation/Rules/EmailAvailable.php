<?php

namespace App\Validation\Rules;

use App\Models\Eloquent\User;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule
{

	public function validate($input)
	{
		//var_dump($input);
		//die();

		//return false;

		return User::where('email', $input)->count() === 0;
	}

}