<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    // protected $table = 'candidates';


    protected $casts = [
        'files' => 'array'
    ];
    // protected $guarded = ['id'];
    protected $fillable = [
        "files",
        "fname",
        "lname",
        "fname_ar",
        "lname_ar",
        "place_of_birth",
        "place_of_birth_ar",
        "gender",
        "nationality",
        "cin_or_n_passport",
        "date_of_birth",
        "address",
        "phone",
        "mobile",
        "email",
        "pro_situation",
        "father_fname",
        "father_lname",
        "mother_fname",
        "mother_lname",

        "cne",
        "bac_intitu",
        "bac_year",
        "bac_speciality",
        "bac_mention",

        "deug_intitu",
        "deug_year",
        "deug_speciality",
        "deug_mention_s1",
        "deug_mention_s2",
        "deug_mention_s3",
        "deug_mention_s4",

        "licence_intitu",
        "licence_year",
        "licence_speciality",
        "licence_mention_s5",
        "licence_mention_s6",

        "master_intitu",
        "master_year",
        "master_speciality",
        "master_mention_s7",
        "master_mention_s8",
        "master_mention_s9",
        "master_mention_s10",

        "doctoral_training",
        "research_focus",
        "labo",

        'familly_situation',
        'father_profession',
        'mother_profession',
        'axe',
        'project',


    ];
}
