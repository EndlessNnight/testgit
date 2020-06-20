<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [ 'storage', 'name', 'size', 'type', 'url','ip' ];
}
