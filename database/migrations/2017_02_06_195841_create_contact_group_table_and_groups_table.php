<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactGroupTableAndGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('groupname');
            $table->timestamps();
        });
        // Input some initial value
        DB::table('groups')->insert([
            ['groupname' => 'friend'],
            ['groupname' => 'vip'],
            ['groupname' => 'colleague'],
            ['groupname' => 'family'],
        ]);
        Schema::create('contact_group', function (Blueprint $table) {
            $table->integer('contact_id');
            $table->integer('group_id');
            $table->primary(['contact_id', 'group_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
        Schema::drop('contact_group');
    }
}
