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
        Schema::create('schoolings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(App\Models\Level::class)->constrained()->cascadeOnDelete();
            $table->string('mtnt_affecte');
            $table->string('mtnt_non_affecte');
            $table->enum('actif',[0,1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolings');
    }
};
