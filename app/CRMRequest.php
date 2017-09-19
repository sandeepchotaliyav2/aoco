<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CRMRequest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requests';
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'crm_case', 'work_type', 'sub_work_type','case_type','rm_case','email_subject','start_date','due_date','comment'
    ];
    
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
