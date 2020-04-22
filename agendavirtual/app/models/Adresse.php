<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model{
    protected $table = 'adresses';
    protected $fillable = ['id', 'zipcode', 'street', 'neighborhood', 'city', 'abbreviation'];
    
    public function users(){
        return $this->hasMany('Models\User');
    }
}