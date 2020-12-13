<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->increments("id");
            $table->string("fname");
            $table->string("lname");
            $table->string("fname_ar");
            $table->string("lname_ar");
            $table->string("place_of_birth");
            $table->string("place_of_birth_ar");
            $table->string("gender");
            $table->string("nationality");
            $table->string("cin_or_n_passport");
            $table->string("date_of_birth");
            $table->string("address");
            $table->string("phone");
            $table->string("mobile");
            $table->string("email");
            $table->string("familly_situation");
            $table->string("father_profession");
            $table->string("mother_profession");
            $table->string("pro_situation");
            $table->string("father_fname");
            $table->string("father_lname");
            $table->string("mother_fname");
            $table->string("mother_lname");

            $table->string("cne");
            $table->string("bac_intitu");
            $table->string("bac_year");
            $table->string("bac_speciality");
            $table->string("bac_mention");

            $table->string("deug_intitu");
            $table->string("deug_year");
            $table->string("deug_speciality");
            $table->string("deug_mention_s1");
            $table->string("deug_mention_s2");
            $table->string("deug_mention_s3");
            $table->string("deug_mention_s4");

            $table->string("licence_intitu");
            $table->string("licence_year");
            $table->string("licence_speciality");
            $table->string("licence_mention_s5");
            $table->string("licence_mention_s6");

            $table->string("master_intitu");
            $table->string("master_year");
            $table->string("master_speciality");
            $table->string("master_mention_s7");
            $table->string("master_mention_s8");
            $table->string("master_mention_s9");
            $table->string("master_mention_s10");

            $table->string("doctoral_training");
            $table->string("research_focus");
            $table->string("labo");
            $table->string("axe");
            $table->string("project");


            $table->json("files");
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidats');
    }
}
