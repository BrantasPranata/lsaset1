<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merk', 100);
            $table->string('tipe_barang', 100);
            $table->string('kode_barang', 20);
            $table->year('tahun_perolehan');
            $table->string('nup', 50);
            $table->enum('bast',['Ada','Tidak']);
            $table->enum('kondisi',['Baik','Rusak']);
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
        Schema::dropIfExists('asets');
    }
}
