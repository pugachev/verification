<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';
    // protected $primaryKey = '';
    // protected $created_at = '';
    // protected $updated_at = '';
    protected $fillable = ['targetDate', 'money','result','imgpath'];
    // public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
    
    // public function setUpdatedAt($value)
    // {
    //     return $this;
    // }
    
    // public function setCreatedAt($value)
    // {
    //     return $this;
    // }
}