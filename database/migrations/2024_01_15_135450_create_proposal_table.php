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
        Schema::create('proposal', function (Blueprint $table) {
            $table->id();
            $table->string("nidn_dosen");
            $table->string("nidn_peninjau")->nullable();
            $table->string("file");
            $table->string("peneliti");
            $table->string("judul");
            $table->dateTime("tanggal");
            $table->string("topik");
            $table->string("bidang_ilmu");
            $table->string("skema");
            $table->string("status")->default("Sedang Ditinjau");
            $table->timestamps();

            $table->foreign("nidn_dosen")->references("nidn")->on("dosen");
            $table->foreign("nidn_peninjau")->references("nidn")->on("dosen")->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal');
    }
};
