<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_modules', function (Blueprint $table) {
            $table->increments('test_module_id');
            $table->string('name');
            $table->string('title');
            $table->string('email');
            $table->string('status');
            $table->date('created_date');
            $table->date('updated_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_modules');
    }
}
