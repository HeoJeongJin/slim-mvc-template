<?php


namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator
{
	
	protected $errors;

	public function validate($request, array $rules)
	{

		//var_dump($rules);
		//die();
		
		foreach ($rules as $field => $rule){

			try{
			
				$rule->setName(ucfirst($field))->assert( $request->getParam($field) );
			} catch ( NestedValidationException $e){
				
				// 2018.06.29 localize override : 원래 localizing이 이렇게 좀 불편한가?...
				$e->findMessages(array(
					'noWhitespace'        => '{{name}} 공백이 포함되어있습니다',
					'notEmpty'       => '{{name}} 값을 입력해주세요',
					'email'	=> '{{name}} 올바른 이메일 형식이 아닙니다',
					'alpha' => '{{name}} 영문자만 가능합니다',
					'alnum' => '{{name}} 영문자와 숫자만 가능합니다',
					'digit' => '{{name}} 숫자만 가능합니다'
				));
				
				$this->errors[$field] = $e->getMessages();

			}

		}

		//var_dump( $this->errors );
		//die();

		$_SESSION['errors'] = $this->errors;

		return $this;

	}

	public function failed()
	{
		
		return !empty($this->errors);

	}


}