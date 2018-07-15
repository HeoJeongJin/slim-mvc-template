<?php

namespace App\Models;

use App\Models\Eloquent\User;

class Model 
{
	protected $container;
	
	//
	const _TEST = 0; // 1, 0

	protected $PDO;
	protected $EQ;

	public function __construct($container)
	{
		$this->container = $container;
		
		$this->getPDO();
		$this->getEloquent();
	}

	private function getPDO()
	{
		//
		$this->PDO = $this->container->get('pdo');
		
		//
		if( !empty(self::_TEST) ){
			$st = $this->PDO->prepare("select * from user");
			$st->execute();
			var_dump( $st->fetch() );
		}
	}

	private function getEloquent()
	{
		//
		$this->EQ = $this->container['eloquent'];

		//
		if( !empty(self::_TEST) ){

			$user = User::where('user_id', 'admin')->first();
			$user['name'];
			$company = Company::where('COMPANY_IDX', 1)->first();
			$company['COMPANY_NAME'];

			$users = $this->EQ::table('user')->get();
			var_dump( $users );
			
		}
	}
}
