<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

Class User extends Model
{
    protected $table = 'user';

    protected $fillable = [

        'id',
        'userid',
        'name',
        'email',
        'password'
    ];

    public function setPassword($password)
    {
        $this->update([
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
}