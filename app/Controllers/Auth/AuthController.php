<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\Eloquent\User;
use Respect\Validation\Validator as v;

use Slim\Views\Twig as View;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class AuthController extends Controller
{
	protected $container;
	

	public function getSignOut($request, $response)
	{

		// sign out
		$this->auth->logout();
		
		// redirect
		return $response->withRedirect( $this->router->pathFor('auth.signin') );
	}

	public function getSignIn($request, $response)
	{
		$project = $this->container['settings']['project'];
		return $this->view->render($response, '/auth/signin.twig', ['project' => $project]);
	}

	public function postSignIn($request, $response)
	{
		//var_dump( $request->getParam('email'), $request->getParam('password') );


		$validation = $this->validator->validate($request,[
			'userid' => v::noWhitespace()->notEmpty()->alnum(),
			'password' => v::noWhitespace()->notEmpty(),
		]);

		if($validation->failed()){
			// redirect back
			return $response->withRedirect( $this->router->pathFor('auth.signin') );
		}

		$auth = $this->auth->attempt(
			$request->getParam('userid'),
			$request->getParam('password')
		);
		
		//var_dump($auth);
		//die();

		if( !$auth ){

			$this->flash->addMessage('error', '로그인실패. 입력정보를 확인하여 주십시오.');

			return $response->withRedirect( $this->router->pathFor('auth.signin') );
		}

		return $response->withRedirect( $this->router->pathFor('home') );
	}

	public function getSignUp($request, $response)
	{
		//var_dump($this->csrf->getTokenNameKey()); // nameKey
		//var_dump($this->csrf->getTokenValueKey()); // valueKey
		//var_dump($request->getAttribute('csrf_value')); // value

		return $this->view->render($response, '/auth/signup.twig');
	}

	public function postSignUp($request, $response)
	{
		//var_dump($request->getParams());

		$validation = $this->validator->validate($request,[
			'userid' => v::noWhitespace()->notEmpty()->alnum(),
			'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
			'name' => v::noWhitespace()->notEmpty(),//->alpha(),
			'password' => v::noWhitespace()->notEmpty(),
		]);

		if($validation->failed()){
			// redirect back
			return $response->withRedirect( $this->router->pathFor('auth.signup') );
		}

		$user = User::create([
			'userid' => $request->getParam('userid'),
			'email' => $request->getParam('email'),
			'name' => $request->getParam('name'),
			'password' => password_hash( $request->getParam('password'), PASSWORD_DEFAULT )
		]);

		$this->flash->addMessage('info', 'You have been signed up!');
	

		// 중요! 로그인 조합 = 아이디 && 패스워드
		// App\Auth\user.name => navifation.twig 에서 이름 가져감
		$this->auth->attempt($user->userid, $request->getParam('password')); 

		return $response->withRedirect( $this->router->pathFor('home') );
	}


}