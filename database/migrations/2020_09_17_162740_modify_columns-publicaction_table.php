<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsPublicactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropColumn(['category', 'subcategory', 'subsubcategory']);
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('subsubcategory_id')->constrained()->onDelete('cascade')->nullable();
        });
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
