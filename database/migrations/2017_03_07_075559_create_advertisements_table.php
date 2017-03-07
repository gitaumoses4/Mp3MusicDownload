<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("advertisements", function (Blueprint $table) {
            $table->string("id", 50)->primary();
            $table->string("code");
            $table->string("size");
            $table->integer("visible");
        });
        $sources = array("top" => "468 x 60", "left" => "120 x 600", "bottom" => "728 x 90", "right" => "120 x 600", "extremeRight" => "160 x 600");
        foreach ($sources as $key => $value) {
            DB::table('advertisements')->insert(
                    array(
                        'id' => $key,
                        'size' => $value,
                        'visible' => 1,
                        'code' => ""
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
        Schema::drop("advertisements");
    }

}
