<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /* Esta funcion crea la tabla para las categorias de las ofertas */
    public function up()
    {
        Schema::create('offer__categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_categories');
    }
}
