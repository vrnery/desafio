<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table = 'users';
    protected $fillable = ['username', 'email', 'password'];

    public function adresse() {
        return $this->belongsTo('Models\Adresse', 'adresse_id');
    }

    public function telephone(){
        return $this->belongsTo('Models\Phone', 'telephone_id');
    }

    public function cellphone(){
        return $this->belongsTo('Models\Phone', 'cellphone_id');
    }
}