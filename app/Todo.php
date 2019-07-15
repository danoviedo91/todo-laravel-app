<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Todo extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    // The function below will allow auto creation of uuid

    public static function boot()
    {
         parent::boot();
         self::creating(function($model){
             $model->id = self::generateUuid();
         });
    }
    public static function generateUuid()
    {
         return Uuid::uuid4();
    }

}
