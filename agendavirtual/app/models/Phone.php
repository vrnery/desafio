<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model{
    protected $table = 'phones';
    protected $fillable = ['id', 'phone', 'whatsapp'];

    public function users(){
        return $this->hasMany('Models\User');
    }
}