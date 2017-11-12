<?php

namespace Ergo\Airdrop\Updates;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateParticipantsTable extends Migration
{
    public function up()
    {
        Schema::create('ergo_airdrop_participants', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->number('balance');
        });
    }

    public function down()
    {
        Schema::drop('ergo_airdrop_participants');
    }
}