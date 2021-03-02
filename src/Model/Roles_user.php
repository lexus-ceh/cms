<?php


namespace App\Model;


class Roles_user extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $fillable = ['users_id', 'roles_id'];
}