<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        "symbol",
        "coin_id",
        "name",
        "current_price",
        "price_change_percentage_24h",
        "image_url",
        "market_cap",
    ];

    public function getBasicData(){
        return [
            "coin_id" => $this->coin_id,
            "name" => $this->name,
            "image_url" => $this->image_url,
        ];
    }

    public function getRouteKeyName(): string
    {
        return "coin_id";
    }

    public function watchdogs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Watchdog::class);
    }
}
