<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminUserField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add an admin field to user
        Schema::table('users', function($table) {
            $table->boolean('admin')->default(false);
        });

        // Add a default admin user
        $adminUser = \App\User::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('admin')]);
        // admin field is not mass assignable
        $adminUser->admin = 1;
        $adminUser->save();
    }

    /**
     * Rollback the migration
     *
     * @return void
     */
    public function down()
    {
        // remove field on down
        Schema::table('users', function($table) {
            $table->dropColumn('admin');
        });
    }
}
