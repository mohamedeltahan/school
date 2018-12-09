@extends("default")
<!--
    #Create new teacher page::
    -This page is used t add a new teacher to the system
    the user need to have a privilege to see this page, the same page will be used to edit an account.
    -There is another functionality to load teachers to the system by importing files
  -->

<!-- Start Project Main Page -->
@section("content")
    <div class="container">
        <div class="row text-right">

            <div class="form-container col-md-10 col-md-offset-1">
                <form method="post" action="{{route('teachers.update',$teacher->id)}}">
                    @method("PUT")
                    @csrf
                    <legend>تعديل بيانات المدرسة "{{$teacher->full_name}}"</legend>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label><span style="color:red">*</span>اسم المعلمة</label>
                            <input value="{{$teacher->full_name}}" name="full_name" type="text" class="form-control text-right" required placeholder="اضف اسم المعلمة">
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label><span style="color:red">*</span> الرقم القومي</label>
                            <input value="{{$teacher->ssn}}" name="ssn" type="text" class="form-control text-right" required placeholder="اضف الرقم القومي للمعلمة">
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label><span style="color:red">*</span> تاريخ الميلاد</label>
                            <input value="{{$teacher->birth_date}}" name="birth_date" type="text" class="form-control text-right birth-date-input-field" required placeholder="اضف تاريخ الميلاد">
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label><span style="color:red">*</span> الديانة</label>
                            <select name="religion" class="form-control text-right">
                                <option @if($teacher->religion=="مسلمة") {{"selected=selected"}} @endif value="مسلمة"
                                        class="text-right">مسلمة
                                </option>
                                <option @if($teacher->religion=="مسيحية") {{"selected=selected"}} @endif value="مسيحية"
                                        class="text-right">مسيحية
                                </option>
                            </select>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label>المستوي التعليمي</label>
                            <select name="education[]" class="form-control text-right">
                                <option @if(explode(":",$teacher->education)[0]=="مؤهل عالي") {{"selected=selected"}} @endif value="مؤهل عالي"
                                        class="text-right">مؤهل عالي
                                </option>
                                <option @if(explode(":",$teacher->education)[0]=="مؤهل متوسط") {{"selected=selected"}} @endif value="مؤهل متوسط"
                                        class="text-right">مؤهل متوسط
                                </option>
                                <option @if(explode(":",$teacher->education)[0]=="مؤهل فوق المتوسط") {{"selected=selected"}} @endif  value="مؤهل فوق المتوسط"
                                        class="text-right">مؤهل فوق المتوسط
                                </option>
                                <option @if(explode(":",$teacher->education)[0]=="دبلوم") {{"selected=selected"}} @endif value="دبلوم"
                                        class="text-right">دبلوم
                                </option>
                            </select>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label><span style="color:red">*</span>المؤهل</label>
                            <input value="{{explode(":",$teacher->education)[1]}}" name="education[]" type="text" class="form-control text-right" required placeholder="المؤهل">
                        </div>
                        <div class="form-group">
                            <label>الحالة الاجتماعية</label>
                            <select name="social_status" class="form-control text-right">
                                <option @if($teacher->social_status=="غير متزوجة") {{"selected=selected"}} @endif value="غير متزوجة" class="text-right">غير متزوجة</option>
                                <option @if($teacher->social_status=="متزوجة") {{"selected=selected"}} @endif value="متزوجة" class="text-right">متزوجة</option>
                            </select>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label>تاريخ التعيين</label>
                            <input value="{{$teacher->hiring_date}}" name="hiring_date" class="form-control text-right birth-date-input-field" placeholder="تاريخ التعيين">
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label>الراتب</label>
                            <input value="{{$teacher->salary}}" name="salary" class="form-control text-right" placeholder=" الراتب">
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label>سنوات الخبرة</label>
                            <input value="{{$teacher->experience_years}}" name="experience_years" class="form-control text-right" placeholder="سنوات الخبرة">
                        </div><!-- /.form-group -->

                      </div><!-- /.col-md-6 -->


                      <div class="col-md-6">
                        <div class="form-group">
                            <label><span style="color:red">*</span> رقم الهاتف</label>
                            <input value="{{$teacher->phone}}" name="phone" type="text" class="form-control text-right"
                                   placeholder="ادخل الرقم القومي للمعلمة">
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label>البريد الالكتروني</label>
                            <input value="{{$teacher->email}}" name="email" type="email" class="form-control text-right"
                                   placeholder="ادخل البريد الالكتروني ان وجد">
                        </div><!-- /.form-group -->


                        <div class="form-group">
                            <label><span style="color:red">*</span>العنوان</label>
                            <textarea name="address" rows="5" class="form-control text-right" style="resize: none;" required
                                      placeholder="العنوان بالتفصيل">{{$teacher->address}}</textarea>
                        </div><!-- /.form-group -->


                        <div class="form-group">
                            <label><span style="color:red">*</span>اسم الدخول</label>
                            <input value="{{$teacher->account_name}}" name="account_name" type="text" class="form-control text-right" required placeholder="اسم الدخول">
                        </div><!-- /.form-group -->


                        <div class="form-group">
                            <label><span style="color:red">*</span>كلمة السر</label>
                            <input value="{{$teacher->password}}"  name="password" type="password" class="form-control text-right" required placeholder="كلمة السر">
                        </div><!-- /.form-group -->


                        <div class="form-group">
                            <label><span style="color:red">*</span>اعاد كتابة كلمة السر</label>
                            <input name="password" type="password" class="form-control text-right" required placeholder="كلمة السر">
                        </div><!-- /.form-group -->


                        <div class="form-group">
                            <label><span style="color:red">*</span>الجهة التي تدفع الراتب</label>
                            <select name="" class="form-control text-right teacher_payrole" data-name="investor" required>
                                <option @if($teacher->salary_investor_id==null) {{"selected=selected"}} @endif value="وزارة التربية و التعليم">
                                    وزارة التربية و التعليم
                                </option>
                                <option @if($teacher->salary_investor_id!=null) {{"selected=selected"}} @endif value="investor">
                                    جهة داعمة
                                </option>
                            </select>
                        </div><!-- /.form-group -->

                        <!-- Working on -->
                        <div class="form-group teacher_payrole_investor">
                            <label><span style="color:red">*</span>الجهة الداعمة</label>
                            <select name="salary_investor_id" class="form-control text-right" data-name="investor">
                                <option value="" @if($teacher->salary_investor_id=="-1") {{"selected=selected"}} @endif > -- select an option --</option>
                                @foreach($technical_users as $technical_user)
                                <option @if($teacher->salary_investor_id==$technical_user->id) {{"selected=selected"}} @endif value="{{$technical_user->id}}">{{$technical_user->full_name}}</option>
                                @endforeach
                            </select>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label><span style="color:red">*</span>نوع التعين</label>
                            <select  name="job_type" class="form-control text-right" data-name="investor">
                                <option @if($teacher->hiring_type=="معين") {{"selected=selected"}} @endif  value="معين">
                                    معين
                                </option>
                                <option @if($teacher->hiring_type=="مؤقت") {{"selected=selected"}} @endif value="مؤقت">
                                    مؤقت
                                </option>
                                <option @if($teacher->hiring_type=="منتدب") {{"selected=selected"}} @endif value="منتدب">
                                    منتدب
                                </option>
                            </select>
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
