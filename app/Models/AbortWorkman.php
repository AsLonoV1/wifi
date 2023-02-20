<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbortWorkman extends Model
{
    use HasFactory;
    protected $table = 'abort_workmen';
    
    protected $primaryKey = 'id';

    protected $fillable = [
       'address',
       'company_name',
       'product_title',
       'amout',
       'count',
       'meter',
       'comment'
    ];
}
