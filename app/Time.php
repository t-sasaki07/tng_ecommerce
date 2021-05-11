<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //
    protected $table = 'timesale';

    protected $fiilable = [
        'start',
        'finish'

    ];
}
