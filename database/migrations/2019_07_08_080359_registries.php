<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Registries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Registry', function (Blueprint $table) {
            $table->bigIncrements('reg_refnum');
            $table->date('reg_date');
            $table->string('reg_orsnum');
            $table->string('reg_payee');
            $table->string('reg_rc');
            $table->string('reg_pap');
            $table->string('reg_uacs');
            $table->integer('reg_amount');
            $table->string('reg_particulars');
            $table->integer('reg_subaccode');
            $table->string('reg_remarks');
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
        Schema::dropIfExists('Registry');
    }
}
