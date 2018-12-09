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
                <form class="create-new-student" method="post" action="{{route('students.store')}}">
                    @csrf
                    <legend>اضافة طالب جديد</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span style="color:red">*</span>اسم الطالب</label>
                                <input type="text" name="full_name" class="form-control text-right" required="required"
                                       placeholder="ادخل اسم الطالب">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>تاريخ الميلاد</label>
                                <input type="text" name="birth_date"
                                       class="form-control text-right birth-date-input-field" required="required"
                                       placeholder="ادخل تاريخ الميلاد">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>المرحلة التعليمية</label>
                                <select type="text" name="level" required="required" class="form-control text-right">
                                    <option value="المرحلة الابتدائية" class="text-right">اولي الابتدائية</option>
                                    <option value="تانية الابتدائية" class="text-right">تانية الابتدائية</option>
                                    <option value="تالتة الابتدائية" class="text-right">تالتة الابتدائية</option>
                                    <option value="رابعة الابتدائية" class="text-right">رابعة الابتدائية</option>
                                    <option value="خامسة الابتدائية" class="text-right">خامسة الابتدائية</option>
                                    <option value="ستة الابتدائية" class="text-right">ستة الابتدائية</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>الديانة</label>
                                <select name="religion" required="required" class="form-control text-right">
                                    <option value="مسلم" class="text-right">مسلم</option>
                                    <option value="مسيحي" class="text-right">مسيحي</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>تعليم سابق </label>
                                <select name="educate" required="required" class="form-control text-right">
                                    <option value="المرحلة الابتدائية" class="text-right">اولي الابتدائية</option>
                                    <option value="تانية الابتدائية" class="text-right">تانية الابتدائية</option>
                                    <option value="تالتة الابتدائية" class="text-right">تالتة الابتدائية</option>
                                    <option value="رابعة الابتدائية" class="text-right">رابعة الابتدائية</option>
                                    <option value="خامسة الابتدائية" class="text-right">خامسة الابتدائية</option>
                                    <option value="ستة الابتدائية" class="text-right">ستة الابتدائية</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>النوع</label>
                                <select name="sex" required="required" class="form-control text-right">
                                    <option value="ذكر" class="text-right">ذكر</option>
                                    <option value="انثي" class="text-right">انثي</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>الحالة التعليمية</label>
                                <select name="current_state" required="required" class="form-control text-right">
                                    <option value="متسرب" class="text-right">متسرب</option>
                                    <option value="منقطع" class="text-right"> منقطع</option>
                                    <option value="مقيد" class="text-right">مقيد</option>
                                </select>
                            </div><!-- /.form-group -->

                            <!-- edit by Dr.Nashwa -->
                            <!-- Start child family state -->
                            <!--div class="form-group">
                                <label><span style="color:red">*</span>الحالة الاجتماعية</label>
                                <select name="social_status" class="form-control text-right child_state_options">
                                    <option value="الاباء احياء" class="text-right">الاباء احياء</option>
                                    <option value="يتيم الاب" class="text-right" data-child-option='special_case' >يتيم الاب</option>
                                    <option value="يتيم الام" class="text-right">يتيم الام</option>
                                    <option value="يتيم الوالدين" class="text-right" data-child-option='special_case'>يتيم الوالدين</option>
                                </select>
                            </div> --> <!-- /.form-group -->

                            <div class="child-family-state">
                                <div class="form-group">
                                    <label>اسم ولي الامر</label>
                                    <input type="text" class="form-control" name="relation[]"
                                           placeholder="ادخل اسم ولي الامر">
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label><span style="color:red">*</span>درجة القرابة</label>
                                    <select name="relation[]" required="required" class="form-control text-right">
                                        <option value="تانية" class="text-right">تانية</option>
                                        <option value="تالتة" class="text-right">تالتة</option>
                                        <option value="رابعة" class="text-right">رابعة</option>
                                        <option value="خامسة" class="text-right">خامسة</option>
                                    </select>
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label>رقم الهاتف ولي الامر</label>
                                    <input type="text" class="form-control" name="relation[]"
                                           placeholder="ادخل رقم الهاتف لولي الامر">
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label>متوسط الدخل</label>
                                    <input type="text" class="form-control" name="relation[]" placeholder="ادخل متوسط دخل ولي الامر">
                                </div><!-- /.form-group -->
                            </div><!-- /.child-family-state -->
                            <!-- End child family state -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>اسم الدخول</label>
                                <input name="account_name" type="text" class="form-control text-right"
                                       required="required" placeholder="اسم الدخول">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>كلمة السر</label>
                                <input name="password" type="password" class="form-control text-right"
                                       required="required" placeholder="كلمة السر">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>اعاد كتابة كلمة السر</label>
                                <input type="password" class="form-control text-right" required="required"
                                       placeholder="اعد كلمة السر">
                            </div><!-- /.form-group -->

                        </div><!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span style="color:red">*</span> تاريخ دخول المدرسة </label>
                                <input class="form-control birth-date-input-field" name="entry_date"
                                       placeholder="ادخل تاريخ الدخول للطالب">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label>نقاط ان وجد</label>
                                <input class="form-control" name="points" placeholder="ادخل نقاط اداء الطالب">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>المجتمع</label>
                                <select name="society" required class="form-control text-right">
                                    <option value="حضري" class="text-right">حضري</option>
                                    <option value="ريفي" class="text-right"> ريفي</option>
                                    <option value="قبلي" class="text-right">قبلي</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>الحالة الصحية</label>
                                <select name="health_state" required class="form-control text-right">
                                    <option value="سليم" class="text-right">سليم</option>
                                    <option value="اعاقة جسدية" class="text-right">اعاقة جسدية</option>
                                    <option value="اعاقة عقلية" class="text-right">اعاقة عقلية</option>
                                    <option value="مريض" class="text-right">مريض</option>
                                    <option value="مرض مزمن" class="text-right">مرض مزمن</option>
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
                                <label><span style="color:red">*</span>رقم شهادة الميلاد</label>
                                <input name="ssn" type="text" class="form-control text-right" required="required"
                                       placeholder="ادخل رقم شهادة ميلاد الطالب">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label>موهبة الطالب</label>
                                <br>
                                <select name="talent" dir="ltr" class=" text-" id="talent-multie-select"
                                        multiple="multiple">
                                    <option value="غناء" class="text-">غناء</option>
                                    <option value="تمثيل" class="text-">تمثيل</option>
                                    <option value="شعر" class="text-">شعر</option>
                                    <option value="رياضة" class="text-">رياضة</option>
                                    <option value="رسم" class="text-">رسم</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label><span style="color:red">*</span>العنوان بالتفصيل</label>
                                <textarea name="address" rows="5" class="form-control text-right" style="resize: none;"
                                          required placeholder="ادخل العنوان بالتفصيل"></textarea>
                            </div><!-- /.form-group -->

                            <!-- need ajax -->
                            <div class="form-group">
                                <label><span style="color:red">*</span>الجهة الداعمة</label>
                                <select name="investor" class="form-control text-right" data-name="investor">
                                     @foreach($technical_users as $technical_user)
                                        <option value="{{$technical_user->id}}">{{$technical_user->full_name}}</option>

                                       @endforeach
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group custome-mine-table" @if(session()->exists("school_id")) style="display: none" @endif>


                                    <label class="text-right"><span style="color:red">*</span>اختر المدرسة</label>
                                    <table class="table table-striped table-condensed">
                                        <tr>
                                            <th class="text-right">حدد المدرسة</th>
                                            <th class="text-right">اسم المدرسة</th>
                                            <th class="text-right">#</th>
                                        </tr>
                                        @if(session()->exists("school_id"))
                                            <input  checked name="school_id" value="{{$schools->id}}" required
                                                   type="radio">

                                        @else
                                        @foreach($schools as $school)
                                            <tr>
                                                <td class="text-right">
                                                    <input  name="school_id" value="{{$school->id}}" required
                                                            type="radio">
                                                </td>
                                                <td>
                                                    {{$school->name}}
                                                </td>
                                                <td>
                                                    {{$count++}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </table>
                            </div><!-- form-group -->
                            <!-- end need ajax -->

                        </div><!-- /.col-md-6 -->

                    </div><!-- /.row -->

                    <input type="submit" class="btn btn-primary cerate-student-submit" value="حفظ">
                </form>
            </div><!-- /.form-container -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <!-- End Project Main Page -->
    <?php session()->forget("school_id") ?>
@endsection
