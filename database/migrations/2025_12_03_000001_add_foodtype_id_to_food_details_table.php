<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFoodtypeIdToFoodDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_details', function (Blueprint $table) {
            if (! Schema::hasColumn('food_details', 'foodtype_id')) {
                $table->foreignId('foodtype_id')
                    ->nullable()
                    ->after('id')
                    ->constrained('foodtypes')
                    ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_details', function (Blueprint $table) {
            if (Schema::hasColumn('food_details', 'foodtype_id')) {
                $table->dropForeign(['foodtype_id']);
                $table->dropColumn('foodtype_id');
            }
        });
    }
}


