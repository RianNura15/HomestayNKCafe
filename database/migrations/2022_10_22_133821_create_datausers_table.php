<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatausersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datausers', function (Blueprint $table) {
            $table->id('id_datauser');
            $table->foreignId('user_id')->nullable()->constrained('users', 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('no_telp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('ktp')->nullable();
            $table->string('gambar_ktp')->nullable();
            $table->string('alamat_user')->nullable();
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
        Schema::dropIfExists('datausers');
    }
}
