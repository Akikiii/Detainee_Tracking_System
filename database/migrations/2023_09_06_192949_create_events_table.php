<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('case_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id'); // Foreign key to reference cases table
            $table->string('event_type');
            $table->date('event_date');
            $table->text('description');
            $table->string('related_entity');
            $table->string('event_location');
            $table->string('event_outcome');
            $table->text('event_notes')->nullable();
            $table->timestamps();

            // Define the foreign key relationship
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('case_events');
    }
}
