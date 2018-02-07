<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DummyData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $lipsum = new \joshtronic\LoremIpsum();

        // add some dummy data and dummy users
        for ($i = 0; $i < 15; $i++) {

            // Add a user
            $user = \App\User::create(['name' => $lipsum->word(), 'email' => uniqid().'@test.com', 'password' => bcrypt('password')]);

            // add some posts for the user
            $limit = rand(5, 10);
            for ($i2 = 0; $i2 < $limit; $i2++) {

                \App\BlogPost::create(['title' => $lipsum->words(rand(2,5)), 'content' => $lipsum->paragraphs(rand(1,20)), 'user_id' => $user->id]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
