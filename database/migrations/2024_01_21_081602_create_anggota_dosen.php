<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_dosen', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("nidn");
            $table->unsignedBigInteger("id_proposal");
            $table->timestamps();

            $table->foreign("id_proposal")->references("id")->on("proposal");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_dosen');
    }
};
