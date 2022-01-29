<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class AddRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->default(1);
            $table->foreign('role_id')->references('id')->on('roles');
        });
    
     
       User::where('is_admin', 1)->update(['role_id' => 2]);

        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('is_admin');
        });
        //this table is already created in the add_is_admin_to_users_table

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function (Blueprint $table) {
         //
         });
    }
}
