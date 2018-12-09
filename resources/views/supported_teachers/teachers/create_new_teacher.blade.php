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

        <div class="form-container col-md-6 col-md-offset-3">
          <form method="post" action="{{route('teachers.store')}}">
            @csrf
            <legend>اضافة معلمة جديدة</legend>
            <div class="form-group">
              <label><span style="color:red">*</span> اسم المعلمة</label>
              <input name="full_name" type="text" class="form-control text-right" placeholder="اضف اسم المعلمة">
            </div><!-- /.form-group -->
            <div class="form-group">
              <label><span style="color:red">*</span> الرقم القومي</label>
              <input name="ssn" type="text" class="form-control text-right" placeholder="اضف الرقم القومي للمعلمة">
            </div><!-- /.form-group -->
            <div class="form-group">
              <label><span style="color:red">*</span> تاريخ الميلاد</label>
              <input name="birth_date" type="text" class="form-control text-right birth-date-input-field" placeholder="اضف تاريخ الميلاد">
            </div><!-- /.form-group -->
            <div class="form-group">
              <label><span style="color:red">*</span> الديانة</label>
              <select name="religion" class="form-control text-right">
                <option value="مسلمة" class="text-right">مسلمة</option>
                <option value="مسيحية" class="text-right">مسيحية</option>
              </select>
            </div><!-- /.form-group -->
            <div class="form-group">
              <label><span style="color:red">*</span> المستوي التعليمي</label>
              <select name="education" class="form-control text-right">
                <option value="شهادة الثانوية" class="text-right">شهادة الثانوية</option>
                <option value="مؤهل عالي" class="text-right">مؤهل عالي</option>
                <option value="مؤهل متوسط" class="text-right">مؤهل متوسط</option>
                <option value="مؤهل فوق المتوسط" class="text-right">مؤهل فوق المتوسط</option>
                <option value="دبلوم" class="text-right">دبلوم</option>
              </select>
            </div><!-- /.form-group -->
            <div class="form-group">
              <label><span style="color:red">*</span> الحالة الاجتماعية</label>
              <select name="social_status" class="form-control text-right">
                <option value="غير متزوجة" class="text-right">غير متزوجة</option>
                <option value="متزوجة" class="text-right">متزوجة</option>
              </select>
            </div><!-- /.form-group -->
            <div class="form-group">
              <label><span style="color:red">*</span> رقم الهاتف</label>
              <input name="phone" type="text" class="form-control text-right" placeholder="ادخل الرقم القومي للمعلمة">
            </div><!-- /.form-group -->
            <div class="form-group">
              <label> البريد الالكتروني</label>
              <input name="email" type="email" class="form-control text-right" placeholder="ادخل البريد الالكتروني ان وجد">
            </div><!-- /.form-group -->

            <!-- Working on -->
            <div class="form-group">
                <label><span style="color:red">*</span> الجهة الداعمة</label>
                <select name="investor" class="form-control text-right" data-name="investor">
                  @foreach($technical_users as $technical_user)
                    <option value="{{$technical_user->id}}">{{$technical_user->full_name}}</option>
                  @endforeach
                </select>
            </div><!-- /.form-group -->

            <div class="form-group custome-mine-table">
                <label class="text-right"><span style="color:red">*</span>اختر المدرسة </label>
                <table class="table table-striped table-condensed">
                    <tr>
                        <th class="text-right">حدد المدرسة</th>
                        <th class="text-right">اسم المدرسة</th>
                        <th class="text-right">#</th>
                    </tr>
                    @foreach($schools as $school)
                    <tr>
                        <td class="text-right">
                            <input value="{{$school->id}}" name="school_id" type="radio">
                        </td>
                        <td class="text-right">
                            {{$school->name}}                        </td>
                        <td class="text-right">
                            1
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div><!-- form-group -->

            <div class="form-group">
              <label><span style="color:red">*</span> العنوان</label>
              <textarea name="address" rows="5" class="form-control text-right" style="resize: none;" placeholder="العنوان بالتفصيل"></textarea>
            </div><!-- /.form-group -->

						<div class="form-group">
              <label><span style="color:red">*</span> الجهة التي تدفع الراتب</label>
              <select name="salary_investor" class="form-control text-right" data-name="investor">
                <option value="وزارة التربية و التعليم">
                  وزارة التربية و التعليم
                </option>
                <option value="جهة داعمة">
                  جهة داعمة
                </option>
              </select>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label><span style="color:red">*</span> نوع التعين</label>
              <select name="job_type" class="form-control text-right" data-name="investor">
                <option value="معين">
                  معين
                </option>
                <option value="مؤقت">
                  مؤقت
                </option>
                <option value="منتدب">
                  منتدب
                </option>
              </select>
            </div><!-- /.form-group -->


          <div class="form-group">
            <label><span style="color:red">*</span> اسم الدخول</label>
            <input name="account_name" type="text" class="form-control text-right" placeholder="اسم الدخول">
          </div><!-- /.form-group -->


          <div class="form-group">
            <label><span style="color:red">*</span> كلمة السر</label>
            <input name="password" type="password" class="form-control text-right" placeholder="كلمة السر">
          </div><!-- /.form-group -->


          <div class="form-group">
            <label><span style="color:red">*</span> اعاد كتابة كلمة السر</label>
            <input name="password" type="password" class="form-control text-right" placeholder="كلمة السر">
          </div><!-- /.form-group -->

          <input type="submit" class="btn btn-primary" value="حفظ">

        </form>
      </div><!-- /.form-container -->
    </div><!-- /.row -->
  </div><!-- /.container -->
  <!-- End Project Main Page -->
@endsection
