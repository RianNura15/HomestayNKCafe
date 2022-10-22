<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sewas', function (Blueprint $table) {
            $table->id('id_sewa');
            $table->foreignId('user_id')->nullable()->constrained('users', 'id')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->foreignId('homestay_id')->nullable()->constrained('homestays', 'id_homestay')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->integer('hargasewa')->nullable();
            $table->time('expired')->nullable();
            $table->date('tanggal_sewa')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->integer('totalhari')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('konfirmasi')->nullable();
            $table->integer('total')->nullable();
            $table->enum('status', [0, 1])->default(1);
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
        Schema::dropIfExists('data_sewas');
    }
}
