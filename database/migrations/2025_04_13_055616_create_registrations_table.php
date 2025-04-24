<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Name field
            $table->string('email')->unique();  // Email field (unique)
            $table->string('contact_number');  // Contact number field
            $table->string('gender');  // Gender field
            $table->string('year');  // Year field
            $table->string('domain');  // Domain / Department field
            $table->string('country');  // Country field
            $table->string('college');  // College field
            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
