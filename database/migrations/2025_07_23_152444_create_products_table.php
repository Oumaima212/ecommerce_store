<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2);
            $table->json('variations')->nullable();  // Stocke variations (taille, couleur...) au format JSON
            $table->integer('stock')->default(0);
            $table->decimal('old_price', 8, 2)->nullable();
            $table->unsignedBigInteger('collection_id')->nullable(); // ajouter ici la colonne

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
