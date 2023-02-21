<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $table = 'directors';
    
    protected $primaryKey = 'id';

    protected $fillable = [
       'address',
       'company_name',
       'product_title',
       'amout',
       'count',
       'meter',
    ];
    public function products()
    {
        return $this->hasMany(Product::class,'document_id','document_id');
    }
}
