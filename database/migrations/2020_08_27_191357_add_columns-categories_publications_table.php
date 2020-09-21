<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsCategoriesPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->string('category')->after('description');
            $table->string('subcategory')->nullable()->after('category');
            $table->string('subsubcategory')->nullable()->after('subcategory');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('subcategory');
            $table->dropColumn('subsubcategory');
        });
    }
}
