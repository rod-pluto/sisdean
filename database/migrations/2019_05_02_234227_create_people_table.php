<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birthdate');
            $table->string('voterid'); // título de leitor
            $table->string('state'); // estado -> vai ter que ser pego baseado no cep
            $table->string('street'); // rua -> vai ter que ser pego baseado no cep
            $table->string('neighborhood'); // bairro
            $table->string('city'); // cidade
            $table->string('zipcode'); // cep
            $table->longText('signature'); // assinatura em formato base64
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
        Schema::dropIfExists('people');
    }
}
