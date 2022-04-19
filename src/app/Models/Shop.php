<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory,SoftDeletes;

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function users()
    {
        return $this->belongsToMany(USer::class);
    }

    public function scopeTenantIdEqual($query,$tenant_id)
    {
        return $query->where('tenant_id',$tenant_id);
    }

    public function scopeShopCodeEqual($query,$shop_code)
    {
        return $query->where('shop_code',$shop_code);
    }
    
}
