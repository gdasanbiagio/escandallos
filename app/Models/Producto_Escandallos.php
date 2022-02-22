<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_Escandallos extends Model
{
    use HasFactory;

    public function findEscandallos(int $productoId, float $totalGeneral)
    {

        echo "<br>totalGeneral::::::".$totalGeneral;
        $escandallos= Producto_Escandallos::where('Producto_id_padre', '=', $productoId)->get();

        foreach ($escandallos as $escandallo) {

            $subproducto=Productos::find($escandallo->Producto_id_hijo);

            $Total=$escandallo->Cantidad * $subproducto->PrecioCosto/$subproducto->Cantidad;
            $totalGeneral=floatval($totalGeneral)+floatval($Total);
            echo "<br>                tiene: ".$escandallo->Producto_id_hijo. " cant: ".$escandallo->Cantidad. " coste: ".$subproducto->PrecioCosto. " total: ".$Total;
           $totalGeneral=$this->findEscandallos($escandallo->Producto_id_hijo,$totalGeneral);
        }
        return $totalGeneral;
    }
}
