<?php

namespace App\Models;

use App\Models\CategoryModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $primaryKey = 'id_product';
    protected $fillable = ['id_category', 'name', 'harga_beli', 'harga_jual', 'stok', 'image'];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'id_category', 'id_category');
    }
}
