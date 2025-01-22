<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixModelHasRolesTable extends Migration
{
    public function up()
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('id');
            $table->unsignedBigInteger('model_id')->after('role_id');
            $table->string('model_type')->after('model_id');

            $table->index(['model_id', 'model_type'], 'model_has_roles_model_id_model_type_index');
        });
    }

    public function down()
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->dropColumn('role_id');
            $table->dropColumn('model_id');
            $table->dropColumn('model_type');
        });
    }
}

