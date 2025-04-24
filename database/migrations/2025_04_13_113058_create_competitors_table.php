<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitors', function (Blueprint $table) {
            
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('contact_number');
                $table->string('gender');
                $table->string('country');
                $table->string('college');
                $table->string('year');
                $table->string('domain');
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
        Schema::dropIfExists('competitors');
    }
}
