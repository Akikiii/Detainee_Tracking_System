<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('office_address');
            $table->string('contact_number');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('education_qualifications')->nullable();
            $table->string('practice_areas')->nullable();
            $table->text('work_experience')->nullable();
            $table->string('professional_affiliations')->nullable();
            $table->text('cases_handled')->nullable();
            $table->string('language_spoken');
            $table->time('office_hours_open')->nullable();
            $table->time('office_hours_close')->nullable();
            $table->string('profile_picture')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'office_address',
                'contact_number',
                'gender',
                'education_qualifications',
                'practice_areas',
                'work_experience',
                'professional_affiliations',
                'cases_handled',
                'language_spoken',
                'office_hours_open',
                'office_hours_close',
            ]);
        });
    }
}
