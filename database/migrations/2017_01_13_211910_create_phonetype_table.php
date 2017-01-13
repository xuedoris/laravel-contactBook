<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phonetype', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phonetype');
        });

        DB::table('phonetype')->insert([
            ['phonetype' => 'mobile'],
            ['phonetype' => 'home'],
            ['phonetype' => 'work'],
            ['phonetype' => 'other'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phonetype');
    }
}
