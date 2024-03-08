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
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('classe');
            $table->string('effectif');
            $table->string('inscrit')->default(0);
            $table->foreignIdFor(App\Models\Level::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(App\Models\Serie::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(App\Models\SchoolYear::class)->constrained()->cascadeOnDelete();
            $table->enum('actif',[0,1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
