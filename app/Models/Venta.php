<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Venta
 *
 * @property int $id
 * @property int $cantidad
 * @property int $precio_venta
 * @property int $precio_total
 * @property int $producto_id
 * @property int $usuario_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Venta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta wherePrecioTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta wherePrecioVenta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereProductoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereUsuarioId($value)
 * @mixin \Eloquent
 */
class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad', 'precio_venta', 'precio_total', 'producto_id', 'usuario_id'];
    public function getProductoForDisplay()
    {
        $producto_id=$this->producto_id;
        if($producto_id==null || $producto_id==""){
            $producto_id="0";
        }
        $producto=Producto::find($producto_id);
        return $producto->nombre;
    }
    public function getClienteForDisplay()
    {
        $cliente_id=$this->usuario_id;
        if($cliente_id==null || $cliente_id==""){
            $cliente_id="0";
        }
        $cliente=User::find($cliente_id);
        return $cliente->name;
    }
}
