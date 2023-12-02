<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBailsTable extends Migration
{
    public function up()
    {
        Schema::create('bails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detainee_id');
            $table->foreign('detainee_id')
            ->references('detainee_id')
            ->on('detainees')
            ->onDelete('cascade');

            $table->unsignedBigInteger('case_id');
             $table->foreign('case_id')->references('case_id')->on('cases')->onDelete('cascade');

            $table->enum('bail_type', ['Cash', 'Property', 'Surety Bond', 'Waiver of Payment']);
            $table->decimal('amount', 10, 2);

            // Add other fields as needed

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bails');
    }
}
