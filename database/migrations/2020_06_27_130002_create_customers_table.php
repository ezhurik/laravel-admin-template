<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('name','100');
            $table->string('email','256');
            $table->string('password','256');
            $table->text('address');
            $table->enum('gender',['male','female','others']);
            $table->date('dob');
            $table->string('hobbies')->nullable();
            $table->tinyInteger('is_deleted')->comment('0-not deleted, 1 - deleted')->default('0');
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
        Schema::dropIfExists('customers');
    }
}
