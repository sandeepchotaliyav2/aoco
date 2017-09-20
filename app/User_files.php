<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_files extends Model
{
    //

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $fillable = ['user_id', 'request_id', 'file_path', 'file_name', 'outbound_type', 'created','status'];
}
