<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Transaction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            
            'id' => $this->id,
            'supplier_id'=>$this->supplier_id,
            'product_id'=>$this->product_id,
            'month_id'=>$this->month_id,
            'date'=>$this->date,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'supplier'=>$this->supplier->name,
            'product'=>$this->product->name,
            'month'=>$this->month->name,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,


        ];
        
        return parent::toArray($request);
    }
}
