<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('representative_name');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('email')->unique();
            $table->text('address');
            $table->decimal('opening_balance', 15,2)->default(0);
            $table->dateTime('starting_date');
            $table->dateTime('ending_date');
            $table->enum('status', ['active', 'inactive', 'disabled']);
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
        Schema::dropIfExists('companies');
    }
}
