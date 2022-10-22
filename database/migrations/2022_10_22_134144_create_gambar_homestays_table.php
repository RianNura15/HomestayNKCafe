<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarHomestaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_homestays', function (Blueprint $table) {
            $table->id('id_gambar');
            $table->foreignId('homestay_id')->nullable()->constrained('homestays', 'id_homestay')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->string('filename');
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
        Schema::dropIfExists('gambar_homestays');
    }
}
