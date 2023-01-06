<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('first', 255);
            $table->string('middle', 255)->nullable();
            $table->string('last', 255);
            $table->date('dob');
            $table->string('gender', 255);
            $table->string('livesWith', 255);
            $table->integer('school_id');
            $table->string('transcript', 255)->nullable();
            $table->string('institution');
            $table->integer('actScore')->nullable();
            $table->string('major', 255);
            $table->string('email', 255)->unique();
            $table->bigInteger('cellPhone')->nullable();
            $table->string('address1', 255);
            $table->string('address1Unit', 255)->nullable();
            $table->string('address1City', 255);
            $table->integer('address1ZIP');
            $table->string('address2', 255)->nullable();
            $table->string('address2Unit', 255)->nullable();
            $table->string('address2City', 255)->nullable();
            $table->integer('address2ZIP')->nullable();
            $table->longText('extracurriculars')->nullable();
            $table->longText('awards')->nullable();
            $table->longText('activities')->nullable();
            $table->integer('guardianIncome');
            $table->string('adultResponsibleForEducation', 255);
            $table->string('guardian1Job', 255);
            $table->string('guardian1Employer', 255);
            $table->string('guardian2Job', 255)->nullable();
            $table->string('guardian2Employer', 255)->nullable();
            $table->string('rentOrOwn', 255);
            $table->integer('homeValue')->nullable();
            $table->integer('homeEquity')->nullable();
            $table->string('additionalLand', 255);
            $table->integer('landValue')->nullable();
            $table->integer('landDebt')->nullable();
            $table->longText('dependents');
            $table->integer('dependentsInCollege');
            $table->longText('unusualCircumstances')->nullable();
            $table->string('isEmployed', 255);
            $table->string('employer', 255)->nullable();
            $table->integer('employmentHours')->nullable();
            $table->longText('workHistory')->nullable();
            $table->string('teacherName', 255);
            $table->string('teacherEmail', 255);
            $table->string('teacherUpload', 255)->nullable();
            $table->string('teacherMonths', 255)->nullable();
            $table->string('teacherRelationship', 255)->nullable();
            $table->integer('teacherRate')->nullable();
            $table->string('referenceName', 255);
            $table->string('referenceEmail', 255);
            $table->string('referenceUpload', 255)->nullable();
            $table->string('headshot', 255);
            $table->string('tax1', 255);
            $table->string('tax2', 255);
            $table->string('essay', 255);
            $table->string('ghs1Reference1', 255)->nullable();
            $table->string('ghs1Reference1Upload', 255)->nullable();
            $table->string('ghs1Reference2', 255)->nullable();
            $table->string('ghs1Reference2Upload', 255)->nullable();
            $table->string('ghs1Essay', 255)->nullable();
            $table->string('ghs2Reference1', 255)->nullable();
            $table->string('ghs2Reference1Upload', 255)->nullable();
            $table->string('ghs2Reference2', 255)->nullable();
            $table->string('ghs2Reference2Upload', 255)->nullable();
            $table->string('ghs2Essay', 255)->nullable();
            $table->string('shs1Reference1', 255)->nullable();
            $table->string('shs1Reference1Upload', 255)->nullable();
            $table->string('educationEssay', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarship_applications');
    }
};
