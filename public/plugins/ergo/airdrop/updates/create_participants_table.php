<?php namespace Ergo\Airdrop\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateParticipantsTable extends Migration
{
    public function up()
    {
        Schema::create('ergo_airdrop_participants', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->integer('balance');
            $table->timestamps();

            $table->unique('address');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ergo_airdrop_participants');
    }
}
