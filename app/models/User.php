<?php 
namespace App\Model;

class User extends BaseModel {
    protected $table = 'users';
    protected $columns = ['username', 'email', 'password', 'status', 'avatar'];

}