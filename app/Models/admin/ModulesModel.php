<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulesModel extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the default naming convention
    protected $table = 'public.modules';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'module_id';

    

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'module_name',
        'status_flag',
    ];
    public $timestamps = false;
}
