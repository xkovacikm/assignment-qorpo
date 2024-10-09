<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            //$table->id();

            $table->uuid("id")->primary();
            $table->string("symbol")->unique();
            $table->string("coin_id")->unique();

            $table->string("name");
            $table->double("current_price")->default(0);
            $table->double("price_change_percentage_24h")->default(0);
            $table->text("image_url")->nullable();
            $table->double("market_cap")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
