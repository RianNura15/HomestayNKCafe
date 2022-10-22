<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerlengkapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perlengkapans', function (Blueprint $table) {
            $table->id('id_perlengkapan');
            $table->foreignId('homestay_id')->nullable()->constrained('homestays', 'id_homestay')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->string('nama_perlengkapan')->nullable();
            $table->integer('jumlah_perlengkapan')->nullable();
            $table->string('tempat')->nullable();
            $table->string('desc_perlengkapan')->nullable();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('perlengkapans');
    }
}
