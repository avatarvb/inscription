
<form wire:submit.prevent="store" >
    @csrf
        @if (session()->has('message'))
            <div class="toast toast-success">
                <span class="btn btn-clear float-right"></span>
                {{ session('message') }}
            </div>
        @endif

        @if ($stepper==1)
            <h1>معلومات شخصية</h1>
            <section id="step-a" >
                <div class="columns">
                    <div class="column col-3">
                        <div class="form-group @error('fname') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.fname') }} @error('fname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="fname" id="fname" name="fname">
                        </div>
                    </div>

                    <div class="column col-3">
                        <div class="form-group @error('lname') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.lname') }} @error('lname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="lname" id="lname" name="lname">
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('gender') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.gender') }} @error('gender') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <select class="form-select" wire:model.lazy="gender">
                                <option>الرجاء التحديد</option>
                                <option value="homme">رجل</option>
                                <option value="femme">إمرأة</option>
                            </select>
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('pro_situation') has-error @enderror">
                            <label class="form-label" for="input-example-1 ">{{ __('words.pro_situation') }} @error('pro_situation') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <select class="form-select" wire:model.lazy="pro_situation">
                                <option>الرجاء التحديد</option>
                                <option value="avec">نشط</option>
                                <option value="sans">بدون </option>
                            </select>
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('date_of_birth') has-error @enderror" >
                            <label class="form-label" for="input-example-1">{{ __('words.date_of_birth') }} @error('date_of_birth') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="date" wire:model.lazy="date_of_birth" id="date_of_birth" name="date_of_birth" >
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('nationality') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.nationality') }} @error('nationality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <select class="form-select" wire:model.lazy="nationality" wire:change="selectNationality($event.target.value)">
                                <option value='' selected>الرجاء التحديد</option>
                                @foreach ($countries as $c)
                                    <option value='{{$c->country_code}}'>{{$c->country_arName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('cin_or_n_passport') has-error @enderror">
                            <label class="form-label" for="input-example-1"> {{ $passport_or_cin ? $passport_or_cin : 'رقم البطاقة الوطنية' }}   @error('cin_or_n_passport') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="cin_or_n_passport" id="cin_or_n_passport" name="cin_or_n_passport">
                        </div>
                    </div>

                    <div class="column col-8">
                        <div class="form-group @error('address') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.address') }} @error('address') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="address" id="address" name="address">
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('phone') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.phone') }} @error('phone') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="phone" id="phone" name="phone">
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('mobile') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.mobile') }} @error('mobile') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="mobile" id="mobile" name="mobile">
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('email') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.email') }} @error('email') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="email" wire:model.lazy="email" id="email" name="email">
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column col-2">
                        <div class="form-group @error('father_fname') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.father_fname') }} @error('father_fname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="father_fname" wire:model.lazy="father_fname" id="father_fname" name="father_lname">
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('father_lname') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.father_lname') }} @error('father_lname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="father_lname" wire:model.lazy="father_lname" id="father_lname" name="father_lname">
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('mother_fname') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.mother_fname') }} @error('mother_fname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="mother_fname" wire:model.lazy="mother_fname" id="mother_fname" name="mother_fname">
                        </div>
                    </div>

                    <div class="column col-2">
                        <div class="form-group @error('mother_lname') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.mother_lname') }} @error('mother_lname') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="mother_lname" id="mother_lname" name="mother_lname">
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if ($stepper===2)
            <h1>المسار الدراسي</h1>
            <section id="step-b">
                <div class="columns">
                    <div class="column col-1">
                        <div class="form-group @error('cne') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.cne') }} @error('cne') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="cne" id="cne" name="cne">
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column col-3">
                        <div class="form-group @error('bac_intitu') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.bac_intitu') }} @error('bac_intitu') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="bac_intitu" id="bac_intitu" name="bac_intitu">
                        </div>
                    </div>
                    <div class="column col-2">
                        <div class="form-group @error('bac_year') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.bac_year') }} @error('bac_year') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="date" wire:model.lazy="bac_year" id="bac_year" name="bac_year">
                        </div>
                    </div>
                    <div class="column col-3">
                        <div class="form-group @error('bac_speciality') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.bac_speciality') }} @error('bac_speciality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="bac_speciality" id="bac_speciality" name="bac_speciality">
                        </div>
                    </div>
                    <div class="column col-2">
                        <div class="form-group @error('bac_mention') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.bac_mention') }} @error('bac_mention') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="bac_mention" id="bac_mention" name="bac_mention">
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column col-3">
                        <div class="form-group @error('deug_intitu') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.deug_intitu') }} @error('deug_intitu') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="deug_intitu" id="deug_intitu" name="deug_intitu">
                        </div>
                    </div>
                    <div class="column col-2">
                        <div class="form-group @error('deug_year') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.deug_year') }} @error('deug_year') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="date" wire:model.lazy="deug_year" id="deug_year" name="deug_year">
                        </div>
                    </div>
                    <div class="column col-3">
                        <div class="form-group @error('deug_speciality') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.deug_speciality') }} @error('deug_speciality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="deug_speciality" id="deug_speciality" name="deug_speciality">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('deug_mention_s1') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.deug_mention_s1') }} @error('deug_mention_s1') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="deug_mention_s1" id="deug_mention_s1" name="deug_mention_s1">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('deug_mention_s2') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.deug_mention_s2') }} @error('deug_mention_s2') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="deug_mention_s2" id="deug_mention_s2" name="deug_mention_s2">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('deug_mention_s3') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.deug_mention_s3') }} @error('deug_mention_s3') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="deug_mention_s3" id="deug_mention_s3" name="deug_mention_s3">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('deug_mention_s4') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.deug_mention_s4') }} @error('deug_mention_s4') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="deug_mention_s4" id="deug_mention_s4" name="deug_mention_s4">
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column col-3">
                        <div class="form-group @error('licence_intitu') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.licence_intitu') }} @error('licence_intitu') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="licence_intitu" id="licence_intitu" name="licence_intitu">
                        </div>
                    </div>
                    <div class="column col-2">
                        <div class="form-group @error('licence_year') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.licence_year') }} @error('licence_year') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="date" wire:model.lazy="licence_year" id="licence_year" name="licence_year">
                        </div>
                    </div>
                    <div class="column col-3">
                        <div class="form-group @error('licence_speciality') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.licence_speciality') }}  @error('licence_speciality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="licence_speciality" id="licence_speciality" name="licence_speciality">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('licence_mention_s5') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.licence_mention_s5') }} @error('licence_mention_s5') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="licence_mention_s5" id="licence_mention_s5" name="licence_mention_s5">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('licence_mention_s6') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.licence_mention_s6') }} @error('licence_mention_s6') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="licence_mention_s6" id="licence_mention_s6" name="licence_mention_s6">
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column col-3">
                        <div class="form-group @error('master_intitu') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.master_intitu') }} @error('master_intitu') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="master_intitu" id="master_intitu" name="master_intitu">
                        </div>
                    </div>
                    <div class="column col-2">
                        <div class="form-group @error('master_year') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.master_year') }} @error('master_year') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="date" wire:model.lazy="master_year" id="master_year" name="master_year">
                        </div>
                    </div>
                    <div class="column col-3">
                        <div class="form-group @error('master_speciality') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.master_speciality') }} @error('master_speciality') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="master_speciality" id="master_speciality" name="master_speciality">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('master_mention_s7') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.master_mention_s7') }} @error('master_mention_s7') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="master_mention_s7" id="master_mention_s7" name="master_mention_s7">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('master_mention_s8') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.master_mention_s8') }} @error('master_mention_s8') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="master_mention_s8" id="master_mention_s8" name="master_mention_s8">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('master_mention_s9') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.master_mention_s9') }} @error('master_mention_s9') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="master_mention_s9" id="master_mention_s9" name="master_mention_s9">
                        </div>
                    </div>
                    <div class="column col-1">
                        <div class="form-group @error('master_mention_s10') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.master_mention_s10') }} @error('master_mention_s10') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="number" max="20" min="0" wire:model.lazy="master_mention_s10" id="master_mention_s10" name="master_mention_s10">
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column col-3">
                        <div class="form-group @error('doctoral_training') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.doctoral_training') }} @error('doctoral_training') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="doctoral_training" id="doctoral_training" name="doctoral_training">
                        </div>
                    </div>
                    <div class="column col-3">
                        <div class="form-group @error('research_focus') has-error @enderror">
                            <label class="form-label" for="input-example-1">{{ __('words.research_focus') }} @error('research_focus') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="research_focus" id="research_focus" name="research_focus">
                        </div>
                    </div>
                    <div class="column col-3 @error('labo') has-error @enderror">
                        <div class="form-group">
                            <label class="form-label" for="input-example-1">{{ __('words.labo') }} @error('labo') <span class="form-input-hint float-right">{{$message}}.</span> @enderror</label>
                            <input class="form-input" type="text" wire:model.lazy="labo" id="labo" name="labo">
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if ($stepper==3)
            <h1>المسار الدراسي</h1>
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
                        <div class="form-group @error('master_mention_s9') has-error @enderror">
                            <label class="form-label" for="input-example-1 text-right">{{ __('words.files') }}</label>
                            <input class="form-input" id="input-example-16" wire:model.lazy="files" type="file" multiple>
                        </div>
                    </div>
                </div>
            </section>

        @endif


        <div class="columns" id="step-submit">
            <div class="column col-12">
                <button class="btn btn-primary float-right" wire:loading.class="loading" wire:target="store" type="submit" {{ $stepper < 3 ? 'd-invisible disabled' : '' }}>إرسال</button>
                <button class="btn btn-primary" wire:click.prevent="formDown" {{ $stepper == 1 ? 'disabled' : '' }}>السابق</button>
                <button class="btn btn" wire:click.prevent="formUp" {{ $stepper == 3 ? 'disabled' : '' }}>التالى</button>
            </div>
        </div>

</form>







<div class="row">



    {{-- <div class="input-field col s2">
        <input wire:model.lazy="cne" id="cne" name="cne" type="text" class="validate">
        <label for="cne">* {{ __('words.cne') }}</label>
    </div>


    <div class="input-field col s12">
        <input type="file" name="files" id="" wire:model="files" multiple>
        <label for="files">المرفقات</label>
    </div> --}}

</div>
