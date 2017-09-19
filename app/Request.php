<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requests';
    
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
