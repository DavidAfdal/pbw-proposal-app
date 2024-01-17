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
            $table->string("nidn_reviewer");
            $table->string("file");
            $table->string("peneliti");
            $table->string("judul");
            $table->string("tahun");
            $table->string("topik");
            $table->string("bidang_ilmu");
            $table->string("status")->default("Sedang Ditinjau");
            $table->timestamps();


            $table->foreign("nidn_dosen", "cm2_nidn_dosen_foreign")->references("nidn")->on("dosen");
            $table->foreign("nidn_reviewer", "cm2_nidn_reviewer_foreign")->references("nidn")->on("dosen")->nullable()->constrained();
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
