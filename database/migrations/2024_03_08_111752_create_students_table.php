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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricule')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->enum('sexe',['F','G']);
            $table->string('date_nais');
            $table->string('lieu_nais');
            $table->string('lieu_residence');
            $table->string('etablissement_origine')->nullable();
            $table->string('annee_entree');
            $table->string('avatar')->nullable();
            $table->string('nom_prenom_pere')->nullable();
            $table->string('profession_pere')->nullable();
            $table->string('contact_pere')->nullable();
            $table->string('nom_prenom_mere')->nullable();
            $table->string('profession_mere')->nullable();
            $table->string('contact_mere')->nullable();
            $table->string('nom_prenom_tuteur')->nullable();
            $table->string('profession_tuteur')->nullable();
            $table->string('contact_tuteur')->nullable();
            $table->foreignIdFor(App\Models\Nationality::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('students');
    }
};
