<?php

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException
{

	public static $defaultTemplates = [
		
		self::MODE_DEFAULT => [
			
			self::STANDARD => '이미 존재하는 Email 입니다',
		],


	];



}
