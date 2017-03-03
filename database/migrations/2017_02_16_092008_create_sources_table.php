<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sources', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('active');
        });

        $sources = array('4shared', 'archive', 'deezer', 'promodj', 'soundcloud', 'vk', 'yandex', 'youtube');
        foreach ($sources as $source) {
            DB::table('sources')->insert(
                    array(
                        'name' => $source,
                        'active' => 1
                    )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('sources');
    }

}