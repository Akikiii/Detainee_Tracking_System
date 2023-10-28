<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeSpouseNameNullableInDetaineeDetails extends Migration
{
    public function up()
    {
        Schema::table('detainee_details', function (Blueprint $table) {
            $table->string('spouse_name')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('detainee_details', function (Blueprint $table) {
            $table->string('spouse_name')->change();
        });
    }
}
