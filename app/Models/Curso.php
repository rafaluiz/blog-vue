<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function rules($id = '')
    {
        return [
            'name'          => 'required|min:3|max:100'
        ];
    }
}
