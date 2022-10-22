<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id('id_fasilitas');
            $table->foreignId('homestay_id')->nullable()->constrained('homestays', 'id_homestay')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->string('nama_fasilitas')->nullable();
            $table->integer('jumlah_fasilitas')->nullable();
            $table->string('desc_fasilitas')->nullable();
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
        Schema::dropIfExists('fasilitas');
    }
}
