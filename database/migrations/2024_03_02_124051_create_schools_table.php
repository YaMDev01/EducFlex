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
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->enum('statut', ['prive', 'public', 'semi-prive']);
            $table->string('name');
            $table->string('abrege')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('telephon');
            $table->string('city');
            $table->string('dren');
            $table->longText('descriptif')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('actif',[0,1])->default(1);
            $table->foreignIdFor(App\Models\Licence::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
