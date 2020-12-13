<form action="#">
    @csrf

    @if (session()->has('message'))
        <div class="toast toast-success">
            <span class="btn btn-clear float-right"></span>
            {{ session('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="toast toast-error">
            <span class="btn btn-clear float-left"></span>
            <h2>جميع الحقول إلزامية</h2>
            <h6>من فضلك افحص استمارة التسجيل مجددا</h6>
            {{-- @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach --}}
        </div>
    @endif

    @if ($currentStep==1)
    <h1 class="">{{ __('words.title_step_1') }}</h1>
    <section >
        <div class="columns">
            <div class="column col-3">
                <div class="form-group @error('fname_ar') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.fname_ar') }}</label>
                    <input class="form-input" type="text" wire:model.lazy="fname_ar" id="fname_ar" name="fname_ar">
                    @error('fname_ar') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-3">
                <div class="form-group @error('lname_ar') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.lname_ar') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="lname_ar" id="lname_ar" name="lname_ar">
                    @error('lname_ar') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-3">
                <div class="form-group @error('fname') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.fname') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="fname" id="fname" name="fname">
                    @error('fname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-3">
                <div class="form-group @error('lname') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.lname') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="lname" id="lname" name="lname">
                    @error('lname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-3">
                <div class="form-group @error('place_of_birth_ar') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.place_of_birth_ar') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="place_of_birth_ar" id="place_of_birth_ar" name="place_of_birth_ar">
                    @error('place_of_birth_ar') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-3">
                <div class="form-group @error('place_of_birth') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.place_of_birth') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="place_of_birth" id="place_of_birth" name="place_of_birth">
                    @error('place_of_birth') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('date_of_birth') has-error @enderror" >
                    <label class="form-label" for="input-example-1">{{ __('words.date_of_birth') }} </label>
                    <input class="form-input" type="date" wire:model.lazy="date_of_birth" id="date_of_birth" name="date_of_birth" >
                    @error('date_of_birth') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('gender') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.gender') }} </label>
                    <select class="form-select" wire:model.lazy="gender">
                        <option>الرجاء التحديد</option>
                        <option value="homme">ذكر</option>
                        <option value="femme">أنثى</option>
                    </select>
                    @error('gender') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('familly_situation') has-error @enderror">
                    <label class="form-label" for="input-example-1 ">{{ __('words.familly_situation') }} </label>
                    <select class="form-select" wire:model.lazy="familly_situation">
                        <option>الرجاء التحديد</option>
                        <option value="celibataire">عازب(ة) </option>
                        <option value="marie">متزوج(ة)</option>
                    </select>
                    @error('familly_situation') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('nationality') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.nationality') }} </label>
                    <select class="form-select" wire:model.lazy="nationality" wire:change="selectNationality($event.target.value)">
                        <option value=''>الرجاء التحديد</option>
                        @foreach ($countries as $c)
                            <option value='{{$c->country_code}}'>{{$c->country_arName}}</option>
                        @endforeach
                    </select>
                    @error('nationality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('cin_or_n_passport') has-error @enderror">
                    <label class="form-label" for="input-example-1"> {{ $passport_or_cin ? $passport_or_cin : 'رقم البطاقة الوطنية' }} </label>
                    <input class="form-input" type="text" wire:model.lazy="cin_or_n_passport" id="cin_or_n_passport" name="cin_or_n_passport">
                    @error('cin_or_n_passport') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-8">
                <div class="form-group @error('address') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.address') }}</label>
                    <input class="form-input" type="text" wire:model.lazy="address" id="address" name="address">
                    @error('address') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('phone') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.phone') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="phone" id="phone" name="phone">
                    @error('phone') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('mobile') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.mobile') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="mobile" id="mobile" name="mobile">
                    @error('mobile') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-4">
                <div class="form-group @error('email') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.email') }} </label>
                    <input class="form-input" type="email" wire:model.lazy="email" id="email" name="email">
                    @error('email') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('pro_situation') has-error @enderror">
                    <label class="form-label" for="input-example-1 ">{{ __('words.pro_situation') }} </label>
                    <select class="form-select" wire:model.lazy="pro_situation">
                        <option>الرجاء التحديد</option>
                        <option value="sans">بدون </option>
                        <option value="ajir">أجير</option>
                        <option value="employé">موظف </option>
                    </select>
                    @error('pro_situation') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column col-2">
                <div class="form-group @error('father_fname') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.father_fname') }}</label>
                    <input class="form-input" type="father_fname" wire:model.lazy="father_fname" id="father_fname" name="father_lname">
                    @error('father_fname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('father_lname') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.father_lname') }}</label>
                    <input class="form-input" type="father_lname" wire:model.lazy="father_lname" id="father_lname" name="father_lname">
                    @error('father_lname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('father_profession') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.father_profession') }}</label>
                    <input class="form-input" type="father_profession" wire:model.lazy="father_profession" id="father_profession" name="father_profession">
                    @error('father_profession') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
        </div>

        <div class="columns">

            <div class="column col-2">
                <div class="form-group @error('mother_fname') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.mother_fname') }} </label>
                    <input class="form-input" type="mother_fname" wire:model.lazy="mother_fname" id="mother_fname" name="mother_fname">
                    @error('mother_fname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('mother_lname') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.mother_lname') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="mother_lname" id="mother_lname" name="mother_lname">
                    @error('mother_lname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

            <div class="column col-2">
                <div class="form-group @error('mother_profession') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.mother_profession') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="mother_profession" id="mother_profession" name="mother_profession">
                    @error('mother_profession') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>

        </div>

        <div id="step-submit">
            <button class="btn btn-primary" wire:click.prevent="firstStepSubmit()" >التالى</button>
            <button class="btn btn-link" type="button"> {{$currentStep}} خطوة</button>
            <button class="btn btn-primary" type="button" wire:click.prevent="back(1)"> <i class="icon icon-arrow-left"></i> </button>
        </div>
    </section>
    @endif


    @if ($currentStep==2)
    <h1>{{ __('words.title_step_2') }}</h1>
    <section id="step-b">
        <div class="columns">
            <div class="column col-3">
                <div class="form-group @error('cne') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.cne') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="cne" id="cne" name="cne">
                    @error('cne') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
        </div>
        <br>
        <div class="divider text-right" data-content="البكالوريا"></div>
        <div class="columns">
            <div class="column col-3">
                <div class="form-group @error('bac_intitu') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.bac_intitu') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="bac_intitu" id="bac_intitu" name="bac_intitu">
                    @error('bac_intitu') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-2">
                <div class="form-group @error('bac_year') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.bac_year') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="bac_year" id="bac_year" name="bac_year">
                    @error('bac_year') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-3">
                <div class="form-group @error('bac_speciality') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.bac_speciality') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="bac_speciality" id="bac_speciality" name="bac_speciality">
                    @error('bac_speciality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-2">
                <div class="form-group @error('bac_mention') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.bac_mention') }} </label>
                    <select class="form-select" wire:model.lazy="bac_mention" id="bac_mention" name="bac_mention">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('bac_mention') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
        </div>
        <br>
        <div class="divider text-right" data-content="شهادة الدراسات الجامعية العامة"></div>
        <div class="columns">
            <div class="column col-3">
                <div class="form-group @error('deug_intitu') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.deug_intitu') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="deug_intitu" id="deug_intitu" name="deug_intitu">
                    @error('deug_intitu') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-2">
                <div class="form-group @error('deug_year') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.deug_year') }}</label>
                    <input class="form-input" type="text" wire:model.lazy="deug_year" id="yearPicker" name="deug_year" >
                    @error('deug_year') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-3">
                <div class="form-group @error('deug_speciality') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.deug_speciality') }}</label>
                    <input class="form-input" type="text" wire:model.lazy="deug_speciality" id="deug_speciality" name="deug_speciality">
                    @error('deug_speciality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('deug_mention_s1') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.deug_mention_s1') }} </label>
                    <select class="form-select" wire:model.lazy="deug_mention_s1" id="deug_mention_s1" name="deug_mention_s1">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('deug_mention_s1') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('deug_mention_s2') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.deug_mention_s2') }} </label>
                    <select class="form-select" wire:model.lazy="deug_mention_s2" id="deug_mention_s2" name="deug_mention_s2">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('deug_mention_s2') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('deug_mention_s3') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.deug_mention_s3') }} </label>
                    <select class="form-select" wire:model.lazy="deug_mention_s3" id="deug_mention_s3" name="deug_mention_s3">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('deug_mention_s3') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('deug_mention_s4') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.deug_mention_s4') }} </label>
                    <select class="form-select" wire:model.lazy="deug_mention_s4" id="deug_mention_s4" name="deug_mention_s4">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('deug_mention_s4') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
        </div>
        <br>
        <div class="divider text-right" data-content="الإجازة"></div>
        <div class="columns">
            <div class="column col-3">
                <div class="form-group @error('licence_intitu') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.licence_intitu') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="licence_intitu" id="licence_intitu" name="licence_intitu">
                    @error('licence_intitu')<span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-2">
                <div class="form-group @error('licence_year') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.licence_year') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="licence_year" id="licence_year" name="licence_year">
                    @error('licence_year') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-3">
                <div class="form-group @error('licence_speciality') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.licence_speciality') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="licence_speciality" id="licence_speciality" name="licence_speciality">
                    @error('licence_speciality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('licence_mention_s5') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.licence_mention_s5') }} </label>
                    <select class="form-select" wire:model.lazy="licence_mention_s5" id="licence_mention_s5" name="licence_mention_s5">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('licence_mention_s5') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('licence_mention_s6') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.licence_mention_s6') }} </label>
                    <select class="form-select" wire:model.lazy="licence_mention_s6" id="licence_mention_s6" name="licence_mention_s6">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('licence_mention_s6') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
        </div>
        <br>
        <div class="divider text-right" data-content="الماستر"></div>
        <div class="columns">
            <div class="column col-3">
                <div class="form-group @error('master_intitu') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.master_intitu') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="master_intitu" id="master_intitu" name="master_intitu">
                    @error('master_intitu') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-2">
                <div class="form-group @error('master_year') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.master_year') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="master_year" id="master_year" name="master_year">
                    @error('master_year') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-3">
                <div class="form-group @error('master_speciality') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.master_speciality') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="master_speciality" id="master_speciality" name="master_speciality">
                    @error('master_speciality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('master_mention_s7') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.master_mention_s7') }}</label>
                    <select class="form-select" wire:model.lazy="master_mention_s7" id="master_mention_s7" name="master_mention_s7">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('master_mention_s7') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('master_mention_s8') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.master_mention_s8') }} </label>
                    <select class="form-select" wire:model.lazy="master_mention_s8" id="master_mention_s8" name="master_mention_s8">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('master_mention_s8') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('master_mention_s9') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.master_mention_s9') }}</label>
                    <select class="form-select" wire:model.lazy="master_mention_s9" id="master_mention_s9" name="master_mention_s9">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('master_mention_s9') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-1">
                <div class="form-group @error('master_mention_s10') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.master_mention_s10') }} </label>
                    <select class="form-select" wire:model.lazy="master_mention_s10" id="master_mention_s10" name="master_mention_s10">
                        <option>الرجاء التحديد</option>
                        <option value="passable">مقبول </option>
                        <option value="a_bien">مستحسن</option>
                        <option value="bien">حسن </option>
                        <option value="t_bien">حسن جدا </option>
                    </select>
                    @error('master_mention_s10') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
        </div>
        <br>
        <div class="divider text-right" data-content="الدكتوراه"></div>
        <div class="columns">
            <div class="column col-3">
                <div class="form-group @error('doctoral_training') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.doctoral_training') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="doctoral_training" id="doctoral_training" name="doctoral_training">
                    @error('doctoral_training') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-3">
                <div class="form-group @error('axe') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.axe') }} </label>
                    <select class="form-select" wire:model.lazy="axe" id="research_focus" name="axe">
                        <option>الرجاء التحديد</option>
                        <option value="passable">Discourse, Creativity, Society and Religions </option>
                        <option value="a_bien">Langue, Littérature, lmaginaire et Esthétique</option>
                        <option value="bien">التاريخ، العلوم الشرعية واللغات </option>
                        <option value="t_bien">الدراسات الأدبية واللسانية وعلوم الإعلام والتواصل  </option>
                        <option value="t_bien">العلوم الدينية والإنسانية وقضايا المجتمع  </option>
                        <option value="t_bien">المجال، التاريخ، الدينامية و التنمية المستدامة  </option>
                        <option value="t_bien">Langues, Littérature et Traduction  </option>
                    </select>
                    @error('axe') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-3 @error('labo') has-error @enderror">
                <div class="form-group">
                    <label class="form-label" for="input-example-1">{{ __('words.labo') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="labo" id="labo" name="labo">
                    @error('labo') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
            <div class="column col-3">
                <div class="form-group @error('research_focus') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.research_focus') }} </label>
                    <input class="form-input" type="text" wire:model.lazy="research_focus" id="research_focus" name="research_focus">
                    @error('research_focus') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column col-12">
                <div class="form-group @error('project') has-error @enderror">
                    <label class="form-label" for="input-example-1">{{ __('words.project') }} </label>
                    <textarea class="form-input" id="input-example-6" rows="2"  wire:model.lazy="project" wire:keydown="count()" id="project" name="project"></textarea>
                    @error('project') <span class="form-input-hint float-right">{{$message}}.</span> @enderror
                    <span class="form-input-hint btn-danger float-left">{{$countLen}}</span>
                </div>
            </div>
        </div>

        <div id="step-submit">
            <button class="btn btn-primary" type="button" wire:click.prevent="back(1)"> <i class="icon icon-arrow-right"></i> </button>
            <button class="btn btn-link" type="button"> {{$currentStep}} خطوة</button>
            <button class="btn btn-primary" wire:click.prevent="secondStepSubmit()" >التالى</button>
        </div>
    </section>
    @endif

    @if ($currentStep==3)
    <h1>{{ __('words.title_step_3') }}</h1>
    <section id="step-c">
        <div class="columns">
            <div class="column col-12">
                <div class="toast toast-warning text-right">
                    <button class="btn btn-clear float-left "></button>
                    شكرًا لك على إرسال جميع المستندات إلينا :
                    <ul>
                        <li>نسخة من بطاقة الهوية الوطنية</li>
                        <li>نسخة من شهادة الميلاد</li>
                        <li>نسخ من جميع الشهادات المكتسبة (شهادة البكالوريا...)</li>
                        <li></li>
                    </ul>
                </div>
                <div class="form-group @error('files') has-error @enderror">
                    <label class="form-label" for="input-example-1 text-right">{{ __('words.files') }}</label>
                    <input class="form-input" id="input-files" wire:model="files" type="file" multiple>
                    @error('files') <span class="error">{{ $message }}</span> @enderror
                </div>
                {{-- تحميل الملف قيد التقدم. --}}
                <div wire:loading.class="loading loading-lg" wire:target="files"></div>

            </div>
            @if ($files)
                <div class="column col-12">
                    المرفقات:
                    <ul>
                    @foreach ($files as $c)
                        <li><span ><a href="{{ $c->temporaryUrl() }}">file </a><span></li>
                    @endforeach
                    </ul>
                </div>
            @endif

        </div>

        <div id="step-submit">
            <button class="btn btn-primary" type="button" wire:click.prevent="back(1)"> <i class="icon icon-arrow-left"></i> </button>
            <button class="btn btn-primary" wire:click.prevent="submitForm()" wire:loading.class="loading" >valider</button>
        </div>
    </section>
    @endif

    @if ($currentStep==4)
        <div class="toast toast-success">
            <span class="btn btn-clear float-right"></span>
            <h2>. 👍 تم إرسال البيانات بنجاح ، شكرا لك </h2>
        </div>
    @endif
</form>
