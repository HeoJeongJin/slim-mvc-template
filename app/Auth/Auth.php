<?php

namespace App\Auth;

use App\Models\Eloquent\User;

class Auth
{

    public function attempt($userid, $password)
    {	

		//var_dump($userid, $password );
		//die();

        // grab the user by userid
        $user = User::where('userid', $userid)->first();

        // if [ !user ] return false
        if( !$user ){
            return false;
        }
        
        // verify password for that user
        if( password_verify($password, $user->password ) )
        {
            // set into session
            $_SESSION['id'] = $user->id;

            return true;
        }

        return false;
    }

    public function user()
    {
        return User::where('id', $_SESSION['id'])->first();
    }

    public function check()
    {
        return isset( $_SESSION['id'] );
    }

    public function logout()
    {        
        unset($_SESSION['id']);
    }
}