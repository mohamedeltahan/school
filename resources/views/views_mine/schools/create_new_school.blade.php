@extends("default")
<!--
				#Create new School page::
				-This page is used to add new school to the system,
        the Root-admin, Customized-admins ,and ..
				Technichal-supports (who had a privilege to see and add Schools on the system),
				can add new schools
				-The same template will be used to edit Schools
				-There is another functionality to load schools to the system by importing files
			-->

<!--
    Edit required add the type of the school
    صف واحد, متعوددة المستويات, صديقة الفتيات
-->
<!-- Start Project Main Page -->
@section("content")
	<div class="container">
		<div class="row text-right">
			<div class="form-container col-md-10 col-md-offset-1">
				<form method="post" action="http://localhost/school/public/schools">
					@csrf
					<legend>اضافة مدرسة جديدة</legend>

					<div class="row">
						<div class="col-md-6" style="padding: 25px;">
							<div class="form-group">
								<label><span style="color:red">*</span> المديرية/المحافظة</label>
								<select name="governorate" class="form-control text-right" id="flag-investor">
									<option class="text-right" selected="selected" value="الجيزة">
										الجيزة
									</option>
									<option class="text-right" value="المنيا">
										المنيا
									</option>
									<option class="text-right" value="الاسكندرية">
										الاسكندرية
									</option>
								</select>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label><span style="color:red">*</span> ادارة/مركز</label>
								<select name="Adminstration" class="form-control text-right" id="flag-investor">
									<option class="text-right" selected="selected" value="الجيزة">
										الجيزة
									</option>
									<option class="text-right" value="المنيا">
										المنيا
									</option>
									<option class="text-right" value="الاسكندرية">
										الاسكندرية
									</option>
								</select>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label><span style="color:red">*</span> القرية الام</label>
								<input name="mother_village" type="text" class="form-control text-right" required placeholder="ادخل القرية التابعة لها المدرسة">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>القرية</label>
								<input name="village" type="text" class="form-control text-right" placeholder="ادخل العزبة التابعة لها المدرسة">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>العنوان بالتفصيل</label>
								<textarea name="address" class="form-control text-right" rows="5" style="resize:none;" placeholder="ادخل عنوان المدرسة بالتفصيل"></textarea>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>تسريع التعليم</label>
								<input style="margin-right: 2px;margin-top: 2px;" value="true" type="checkbox" name="education_accelerate">
							</div><!-- /.form-group -->

							<!-- how the school build -->
							<div class="form-group">
								<label><span style="color:red;">*</span> طريقة الانشاء</label>
								<br>
								<label><input value="option1" type="radio" name="created_way_option" required> جهة وزارية</label>
								<label><input value="option2" type="radio" name="created_way_option">جهة داعمة</label>
								<label><input value="option3" type="radio" name="created_way_option">جهة اهلية</label>
							</div><!-- /.form-group -->
							<!-- how the school build -->

							<input type="hidden" class="created_way_select_options created_way_option3" name="" value="جهة اهلية">

							<div class="form-group custome-mine-table created_way_select_options created_way_option2">
								<label class="text-right">اختر الجهات الداعمة</label>
								<table class="table table-striped table-condensed">
									@foreach($technical_users as $technical_user)
										<tr>
											<td class="text-right">
												<input name="investor" type="checkbox" value="{{$technical_user->full_name.":".$technical_user->id}}">
											</td>
											<td class="text-right">
												{{$technical_user->full_name}}
											</td>
										</tr>
									@endforeach
								</table>

							</div><!-- form-group -->

							<div class="form-group created_way_select_options created_way_option1">
								<label>جهات وزارية</label>
								<select class="form-control" name="created_way">
									<option>وزارة التعليم</option>
									<option>وزارة الاتصالات</option>
									<option>وزارة التضامن</option>
								</select>
							</div><!-- /.form-group -->

						</div><!-- /.col-md-6 -->


						<div class="col-md-6" style="border-left: 1px solid #ddd; padding: 25px;">
							<div class="form-group">
								<label><span style="color:red">*</span>اسم المدرسة</label>
								<input name="name" type="text" class="form-control text-right" required="required" placeholder="ادخل اسم المدرسة">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>كود المدرسة ان وجد</label>
								<input name="code" type="text" class="form-control text-right" placeholder="ادخل كود المدرسة">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>وقت الانشاء</label>
								<input name="school_created_at" type="text" class="form-control text-right birth-date-input-field" placeholder="وقت الانشاء">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>الاجازة الموسمية</label>
								<input name="seasonal_vacation" type="text" class="form-control text-right" disabled placeholder="الاجازة الموسمية">
							</div><!-- /.form-grop -->

							<div class="form-group">
								<label>ساعات العمل</label>
								<div class="row">
									<div class="col-xs-6 pull-right">
										<label>من</label>
										<input name="working_hours[]"  style="size: 20px; display: inline-block" type="text" class="form-control text-left timepicker">
									</div><!-- /.col-xs-6 -->
									<div class="col-xs-6 pull-right">
										<label>الي</label>
										<input name="working_hours[]"  style="size: 20px; display: inline-block" type="text" class="form-control text-left timepicker">
									</div><!-- /.col-xs-6 -->
								</div>
							</div><!-- /.form-grop -->

							<div class="form-group">
								<label><span style="color:red">*</span> نوع المدرسة</label>
								<select name="type" class="form-control text-right" required>
									<option value="صف واحد">
										صف واحد
									</option>
									<option value="متعددة المستويات">
										متعددة المستويات
									</option>
									<option value="صديقة الفتيات">
										صديقة الفتيات
									</option>
									<option value="جمعيات اهلية صديقة اطفال">
										جمعيات اهلية صديقة اطفال
									</option>
									<option value="اطفال بلا مأوي">
										اطفال بلا مأوي
									</option>
								</select>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label><span style="color:red">*</span> المرحلة التعليمية</label>
								<select type="text" name="levels"  required="required" class="form-control text-right">
									<option value="المرحلة الابتدائية" class="text-right">اولي الابتدائية</option>
									<option value="تانية الابتدائية" class="text-right">تانية الابتدائية</option>
									<option value="تالتة الابتدائية" class="text-right">تالتة الابتدائية</option>
									<option value="رابعة الابتدائية" class="text-right">رابعة الابتدائية</option>
									<option value="خامسة الابتدائية" class="text-right">خامسة الابتدائية</option>
									<option value="ستة الابتدائية" class="text-right">ستة الابتدائية</option>
								</select>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label class="text-right"><span style="color:red">*</span> التقيم</label>
								<select name="rate" class="form-control text-right">
									<option value="متوسط">
										متوسط
									</option>
									<option value="قوي">
										قوي
									</option>
									<option value="ضعيف">
										ضعيف
									</option>
								</select>
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
