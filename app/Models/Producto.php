<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Producto
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $precio
 * @property int $stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $imagen
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereImagen($value)
 */
class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','descripcion','precio','stock'];

    public function getFotoForDisplay()
    {
        $foto = $this->imagen;
        if ($foto == null || $foto == "") {
            $foto = "0.jpg";
        }

        return $foto;
    }
}
