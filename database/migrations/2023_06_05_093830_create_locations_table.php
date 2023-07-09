<?php

declare(strict_types=1);

use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(City::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedDecimal('accuracy_km');
            $table->unsignedDecimal('accuracy_mi');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->string('timezone');
            $table->timestamps();
        });
    }
};
