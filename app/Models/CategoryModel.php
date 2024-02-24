<?php

namespace App\Models;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_category';
    protected $primaryKey = 'id_category';
    protected $fillable = ['nama'];

}
