<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create a table with the following columns
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //Create a variable and assign an array
        //Loop through the array of each assosicated array item
        //access the class of role and create an array with a parameter called "name"
        //the associated array "name" contains all the looped data from roles
        $roles = ['User', 'Administrator', 'Publisher'];
        foreach ($roles as $role) {
            \App\Role::create(['name' => $role]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
