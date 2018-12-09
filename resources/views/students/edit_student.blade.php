@extends("default")
<!--
		#Create new student Page
		-This Page is to create a new student account,
		the user need to have a privilege to see this page, the same page will be used to edit an account.
    -There is another functionality to load students to the system by importing files
  -->

<!-- Start Project Main Page -->
@section("content")
    <div class="container">
        <div class="row text-right">
            <div class="col-md-1"></div><!-- offset1 -->
            <div class="form-container col-md-10">
                <form method="post" action="{{route('students.update',$student->id)}}">
                    @method('PUT')
                    @csrf

                    <legend>تعديل بيانات الطالب <b>{{$student->full_name}}</B></legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span style="color:red">*</span>اسم الطالب</label>
                                <input value="{{$student->full_name}}" type="text" name="full_name" required="required" class="form-control text-right" placeholder="ادخل اسم الطالب">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> تاريخ الميلاد</label>
                                <input value="{{$student->birth_date}}" type="text" name="birth_date" required="required"
                                       class="form-control text-right birth-date-input-field" placeholder="">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> الديانة</label>
                                <select name="religion" class="form-control text-right" required="required">
                                    <option @if($student->religion=="مسلم") {{"selected=selected"}} @endif value="مسلم"
                                            class="text-right">مسلم
                                    </option>
                                    <option @if($student->religion=="مسيحي") {{"selected=selected"}} @endif value="مسيحي"
                                            class="text-right">مسيحي
                                    </option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> تعليم سابق </label>
                                <select name="educate" required="required" class="form-control text-right">
                                    <option @if($student->educate=="المرحلة الابتدائية") {{"selected=selected"}} @endif  value="المرحلة الابتدائية"
                                            class="text-right">اولي الابتدائية
                                    </option>
                                    <option @if($student->educate=="تانية الابتدائية") {{"selected=selected"}} @endif value="تانية الابتدائية"
                                            class="text-right">تانية الابتدائية
                                    </option>
                                    <option @if($student->educate=="تالتة الابتدائية") {{"selected=selected"}} @endif value="تالتة الابتدائية"
                                            class="text-right">تالتة الابتدائية
                                    </option>
                                    <option @if($student->educate=="رابعة الابتدائية") {{"selected=selected"}} @endif value="رابعة الابتدائية"
                                            class="text-right">رابعة الابتدائية
                                    </option>
                                    <option @if($student->educate=="خامسة الابتدائية") {{"selected=selected"}} @endif value="خامسة الابتدائية"
                                            class="text-right">خامسة الابتدائية
                                    </option>
                                    <option @if($student->educate=="ستة الابتدائية") {{"selected=selected"}} @endif value="ستة الابتدائية"
                                            class="text-right">ستة الابتدائية
                                    </option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> النوع</label>
                                <select name="sex" required="required" class="form-control text-right">
                                    <option @if($student->sex=="ذكر") {{"selected=selected"}} @endif value="ذكر" class="text-right">ذكر</option>
                                    <option @if($student->sex=="انثي") {{"selected=selected"}} @endif value="انثي" class="text-right">انثي</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>الحالة التعليمية </label>
                                <select name="current_state" required="required" class="form-control text-right">
                                    <option @if($student->current_state=="متسرب") {{"selected=selected"}} @endif value="متسرب" class="text-right">متسرب</option>
                                    <option @if($student->current_state=="منقطع") {{"selected=selected"}} @endif value="منقطع" class="text-right"> منقطع</option>
                                    <option @if($student->current_state=="مقيد") {{"selected=selected"}} @endif value="مقيد" class="text-right">مقيد</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>الحالة الاجتماعية</label>
                                <select name="social_status" class="form-control text-right child_state_options" required="required">
                                    <option @if($student->social_status=="الاباء احياء") {{"selected=selected"}} @endif value="الاباء احياء"
                                            class="text-right">الاباء احياء
                                    </option>
                                    <option @if($student->social_status=="يتيم الاب") {{"selected=selected"}} @endif value="يتيم الاب"
                                            class="text-right">يتيم الاب
                                    </option>
                                    <option @if($student->social_status=="يتيم الام") {{"selected=selected"}} @endif value="يتيم الام"
                                            class="text-right">يتيم الام
                                    </option>
                                    <option @if($student->social_status=="يتيم الوالدين") {{"selected=selected"}} @endif value="يتيم الوالدين"
                                            class="text-right">يتيم الوالدين
                                    </option>
                                </select>
                            </div><!-- /.form-group -->

                            <!-- Start child family state -->
                            <div class="child-family-state">
                                <div class="form-group">
                                    <label>اسم ولي الامر</label>
                                    <input type="text" class="form-control" value="{{$student->relation[1]}}" name="relation[]" placeholder="ادخل اسم ولي الامر">
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label><span style="color:red">*</span>درجة القرابة</label>
                                    <select name="relation[]" required="required" class="form-control text-right">
                                        <option @if($student->relation[0]=="تانية") {{"selected=selected"}} @endif value="تانية" class="text-right">تانية</option>
                                        <option @if($student->relation[0]=="تالتة") {{"selected=selected"}} @endif value="تالتة" class="text-right">تالتة</option>
                                        <option @if($student->relation[0]=="رابعة") {{"selected=selected"}} @endif  value="رابعة" class="text-right">رابعة</option>
                                        <option @if($student->relation[0]=="خامسة") {{"selected=selected"}} @endif  value="خامسة" class="text-right">خامسة</option>
                                    </select>
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label>رقم الهاتف ولي الامر</label>
                                    <input type="text" class="form-control" value="{{$student->relation[2]}}" name="relation[]" placeholder="ادخل رقم الهاتف لولي الامر">
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label>متوسط الدخل</label>
                                    <input type="text" class="form-control" value="{{$student->relation[3]}}" name="relation[]" placeholder="ادخل متوسط دخل ولي الامر">
                                </div><!-- /.form-group -->
                            </div><!-- /.child_state_options -->
                            <!-- Start child family state -->
                        </div><!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span style="color:red">*</span> تاريخ دخول المدرسة </label>
                                <input value="{{$student->entry_date}}" class="form-control" name="entry_date">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>نقاط </label>
                                <input value="{{$student->points}}" class="form-control" name="points">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> المجتمع </label>
                                <select name="society" required="required" class="form-control text-right">
                                    <option @if($student->society=="حضري") {{"selected=selected"}} @endif  value="حضري" class="text-right">حضري</option>
                                    <option @if($student->society=="ريفي") {{"selected=selected"}} @endif value="ريفي" class="text-right"> ريفي</option>
                                    <option @if($student->society=="قبلي") {{"selected=selected"}} @endif value="قبلي" class="text-right">قبلي</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> الحالة الصحية</label>
                                <select name="health_state" class="form-control text-right" required="required">
                                    <option @if($student->health_state=="سليم") {{"selected=selected"}} @endif value="سليم"
                                            class="text-right">سليم
                                    </option>
                                    <option @if($student->health_state=="اعاقة جسدية") {{"selected=selected"}} @endif value="اعاقة جسدية"
                                            class="text-right">اعاقة جسدية
                                    </option>
                                    <option @if($student->health_state=="اعاقة عقلية") {{"selected=selected"}} @endif value="اعاقة عقلية"
                                            class="text-right">اعاقة عقلية
                                    </option>
                                    <option @if($student->health_state=="مريض") {{"selected=selected"}} @endif  value="مريض"
                                            class="text-right">مريض
                                    </option>
                                    <option @if($student->health_state==">مرض مزمن") {{"selected=selected"}} @endif value=">مرض مزمن"
                                            class="text-right">مرض مزمن
                                    </option>
									<option class="text-right">الحصبه</option>
									<option class="text-right">الجديرى</option>
									<option class="text-right">الضرن</option>
									<option class="text-right">التيفود</option>
									<option class="text-right">الباراتيفود</option>
									<option class="text-right">حميات الجهاز الهضمى</option>
									<option class="text-right">الالتهاب المزمن بالعين</option>
									<option class="text-right">الالتهاب المزمن بالحلق واللوزتين</option>
									<option class="text-right">العيوب الخلقيه </option>
									<option class="text-right">الشفه الأرنبيه</option>
									<option class="text-right">تشوهات الجهاز العضلى الحركى</option>
									<option class="text-right">السكر</option>
									<option class="text-right">تشوهات الساقين</option>
									<option class="text-right">السرطان</option>
									<option class="text-right">سوء تغذيه</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> رقم شهادة الميلاد</label>
                                <input value="{{$student->ssn}}" name="ssn" type="text" class="form-control text-right"
                                       required="required" placeholder="ادخل رقم شهادة ميلاد الطالب">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label>موهبة الطالب</label>
                                <select name="talent" class="form-control text-right" id="talent-multie-select"
                                        multiple="multiple">
                                    <option @if($student->talent=="غناء") {{"selected=selected"}} @endif value="غناء"
                                            class="text-right">غناء
                                    </option>
                                    <option @if($student->talent=="تمثيل") {{"selected=selected"}} @endif value="تمثيل"
                                            class="text-right">تمثيل
                                    </option>
                                    <option @if($student->talent=="شعر") {{"selected=selected"}} @endif value="شعر"
                                            class="text-right">شعر
                                    </option>
                                    <option @if($student->talent=="رياضة") {{"selected=selected"}} @endif value="رياضة"
                                            class="text-right">رياضة
                                    </option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> العنوان</label>
                                <textarea name="address" rows="5" class="form-control" required="required"
                                          placeholder="ادخل العنوان بالتفصيل"
                                          style="resize: none;">{{$student->address}}</textarea>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> الجهة الداعمة</label>
                                <select name="investor" class="form-control text-right" data-name="investor"
                                        required="required">
                                    @foreach($technical_users as $technical_user)
                                        <option value="{{$technical_user->id}}">{{$technical_user->full_name}}</option>
                                    @endforeach
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> اسم الدخول</label>
                                <input value="{{$student->account_name}}" name="account_name" type="text"
                                       class="form-control text-right" required="required" placeholder="اسم الدخول">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span> كلمة السر</label>
                                <input type="password" value="{{$student->password}}" name="password"
                                       class="form-control text-right" required="required" placeholder="كلمة السر">
                            </div><!-- /.form-group -->


                            <div class="form-group">
                                <label><span style="color:red">*</span> اعاد كتابة كلمة السر</label>
                                <input type="password" class="form-control text-right" required="required"
                                       placeholder="كلمة السر">
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->

                    <input type="submit" class="btn btn-primary" value="حفظ">

                </form>
            </div><!-- /.form-container -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <!-- End Project Main Page -->
@endsection
