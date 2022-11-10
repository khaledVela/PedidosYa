<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoriaProducto
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProducto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProducto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProducto query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $categoria_id
 * @property int $producto_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProducto whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProducto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProducto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProducto whereProductoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProducto whereUpdatedAt($value)
 */
class CategoriaProducto extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_id', 'producto_id'];
    public function getCategoriaForDisplay()
    {
        $categoria_id=$this->categoria_id;
        if($categoria_id==null || $categoria_id==""){
            $categoria_id="0";
        }
        $categoria=Categoria::find($categoria_id);
        return $categoria->nombre;
    }
    public function getProductoForDisplay()
    {
        $producto_id=$this->producto_id;
        if($producto_id==null || $producto_id==""){
            $producto_id="0";
        }
        $producto=Producto::find($producto_id);
        return $producto->nombre;
    }
}
