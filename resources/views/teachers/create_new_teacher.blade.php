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
			<div class="col-md-1"></div><!-- offset -->
			<div class="form-container col-md-10">
				<form method="post" action="{{route('teachers.store')}}">
				@csrf
				<legend>اضافة معلمة جديدة</legend>
				<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label><span style="color:red">*</span>اسم المعلمة</label>
					<input  name="full_name" type="text" class="form-control text-right" required placeholder="اضف اسم المعلمة">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label><span style="color:red">*</span> الرقم القومي</label>
					<input name="ssn" type="text" class="form-control text-right" required placeholder="اضف الرقم القومي للمعلمة">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label><span style="color:red">*</span> تاريخ الميلاد</label>
					<input name="birth_date" type="text" class="form-control text-right birth-date-input-field" required placeholder="اضف تاريخ الميلاد">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label><span style="color:red">*</span>الديانة</label>
					<select name="religion" class="form-control text-right">
					  <option value="مسلمة" class="text-right">مسلمة</option>
					  <option value="مسيحية" class="text-right">مسيحية</option>
					</select>
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label>المستوي التعليمي</label>
					<select name="education[]" class="form-control text-right" required>
					  <option value="مؤهل عالي" class="text-right">مؤهل عالي</option>
					  <option value="مؤهل متوسط" class="text-right">مؤهل متوسط</option>
					  <option value="مؤهل فوق المتوسط" class="text-right">مؤهل فوق المتوسط</option>
					  <option value="دبلوم" class="text-right">دبلوم</option>
					</select>
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label><span style="color:red">*</span> اسم المؤهل</label>
					<input name="education[]" type="text" class="form-control text-right" required placeholder="المؤهل">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label>الحالة الاجتماعية</label>
					<select name="social_status" class="form-control text-right">
					  <option value="غير متزوجة" class="text-right">غير متزوجة</option>
					  <option value="متزوجة" class="text-right">متزوجة</option>
					</select>
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label>تاريخ التعيين</label>
					<input name="hiring_date"  class="form-control text-right birth-date-input-field" placeholder=" تاريخ التعيين">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label>الراتب</label>
					<input name="salary"  class="form-control text-right" placeholder=" الراتب">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label>سنوات الخبرة</label>
					<input name="experience_years"  class="form-control text-right" placeholder="ادخل سنوات الخبرة">
				  </div><!-- /.form-group -->

				  <!-- the column in the table is not selected yet -->
				  <div class="form-group">
					<label><span style="color:red">*</span>الجهة التي تدفع الراتب</label>
					<select name="" class="form-control text-right teacher_payrole" data-name="investor">
					  <option value="وزارة التربية و التعليم">
						وزارة التربية و التعليم
					  </option>
					  <option value="investor">
						جهة داعمة
					  </option>
					</select>
				  </div><!-- /.form-group -->

				  <div class="form-group teacher_payrole_investor">
					<label><span style="color:red">*</span> الجهة الداعمة</label>
					<select  name="salary_investor_id" class="form-control text-right" data-name="investor">
					  <option  selected value=""> -- select an option -- </option>
					  @foreach($technical_users as $technical_user)
						<option value="{{$technical_user->id}}">{{$technical_user->full_name}}</option>
					  @endforeach
					</select>
				  </div><!-- /.form-group -->
				  <!-- end of the teacher_payrole_investor -->

				  <div class="form-group">
					<label><span style="color:red">*</span>نوع التعين</label>
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
				</div><!-- /.col-md-6 -->


				<div class="col-md-6">
				  <!-- div class="form-group">
					<label><span style="color:red">*</span> النوع</label>
					<select name="sex"  required="required" class="form-control text-right">
					  <option value="ذكر" class="text-right">ذكر</option>
					  <option value="انثي" class="text-right">انثي</option>
					</select>
				  </div> /.form-group -->

				  <div class="form-group">
					<label><span style="color:red">*</span>رقم الهاتف</label>
					<input name="phone" type="text" class="form-control text-right" placeholder="ادخل الرقم القومي للمعلمة">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label> البريد الالكتروني</label>
					<input name="email" type="email" class="form-control text-right" placeholder="ادخل البريد الالكتروني ان وجد">
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
							<input value="{{$school->id}}" name="school_id" type="radio" required>
						  </td>
						  <td class="text-right">
							{{$school->name}}
						  </td>
						  <td class="text-right">
							1
						  </td>
						</tr>
					  @endforeach
					</table>
				  </div><!-- form-group -->

				  <div class="form-group">
					<label><span style="color:red">*</span> العنوان</label>
					<textarea name="address" rows="5" class="form-control text-right" style="resize: none;" required placeholder="العنوان بالتفصيل"></textarea>
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label><span style="color:red">*</span> اسم الدخول</label>
					<input name="account_name" type="text" class="form-control text-right" required placeholder="اسم الدخول">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label><span style="color:red">*</span> كلمة السر</label>
					<input name="password" type="password" class="form-control text-right" required placeholder="كلمة السر">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label><span style="color:red">*</span> اعاد كتابة كلمة السر</label>
					<input name="password" type="password" class="form-control text-right" required placeholder="كلمة السر">
				  </div><!-- /.form-group -->
				</div><!-- /.col-md-6 -->

			</div><!-- /.row -->

          <input type="submit" class="btn btn-primary pull-left" value="حفظ">

        </form>
      </div><!-- /.form-container -->

	  </div><!-- /.row -->
  </div><!-- /.container -->
  <!-- End Project Main Page -->
@endsection
