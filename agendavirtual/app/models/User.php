<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table = 'users';
    protected $fillable = ['username', 'email', 'password'];

    public function address() {
        return $this->belongsTo(Adresse, 'adresse_id');
    }

    public function telephone(){
        return $this->belongsTo(Phone, 'telephone_id');
    }

    public function cellphone(){
        return $this->belongsTo(Phone, 'cellphone_id');
    }
}