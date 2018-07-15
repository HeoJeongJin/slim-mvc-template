<?php

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class MatchesPasswordException extends ValidationException
{

	public static $defaultTemplates = [
		
		self::MODE_DEFAULT => [
			
			self::STANDARD => '비밀번호가 일치하지 않습니다',
		],


	];
}
