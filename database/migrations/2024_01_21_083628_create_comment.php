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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("nidn_dosen");
            $table->string("riview");
            $table->unsignedBigInteger("id_proposal");
            $table->timestamps();

            $table->foreign("id_proposal")->references("id")->on("proposal");
            $table->foreign("nidn_dosen")->references("nidn")->on("dosen");
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
};
