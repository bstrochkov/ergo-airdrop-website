<?php namespace Ergo\Airdrop\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateWinnersTable extends Migration
{
    public function up()
    {
        Schema::create('ergo_airdrop_winners', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('participant_id');
            $table->integer('coin_count');
            $table->unique('participant_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ergo_airdrop_winners');
    }
}
