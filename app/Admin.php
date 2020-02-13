<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
}
//DB::table('admins')->insert(['email'=>'a@gmail.com','password'=>Hash::make('123456789')])