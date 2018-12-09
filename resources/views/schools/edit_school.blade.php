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

<!-- Start Project Main Page -->
@section("content")
	<div class="container">
		<div class="row text-right">
			<div class="col-md-1"></div><!--  offset 1 -->
			<div class="form-container col-md-10">
				<form method="post" action="{{route('schools.update',$school->id)}}">
					@method("PUT")
					@csrf
					<legend>تعديل مدرسة <b>{{$school->name}}</b></legend>

					<div class="row">

						<div class="col-md-6" style="border-left: 1px solid #ddd; padding:25px;">
							<div class="form-group">
								<label><span style="color:red">*</span> اسم المدرسة</label>
								<input value="{{$school->name}}" name="name" type="text" class="form-control text-right" required="required" placeholder="ادخل اسم المدرسة">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>كود المدرسة ان وجد</label>
								<input value="{{$school->code}}" name="code" type="text" class="form-control text-right" placeholder="ادخل كود المدرسة">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>وقت الانشاء</label>
								<input value="{{$school->school_created_at}}" name="school_created_at" type="text" class="form-control text-right birth-date-input-field" placeholder="وقت الانشاء">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>الاجازة الموسمية</label>
								<input value="{{$school->seasonal_vacation}}" name="seasonal_vacation" type="text" class="form-control text-right" disabled placeholder="الاجازة الموسمية">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>ساعات العمل</label>
								<div class="row">
									<div class="col-xs-6 pull-right">
										<label>من</label>
										<input name="working_hours[]" value="{{explode(':',$school->working_hours)[0]}}" style="size: 20px; display: inline-block" type="text" class="form-control text-left timepicker">
									</div><!-- /.col-xs-6 -->
									<div class="col-xs-6 pull-right">
										<label>الي</label>
										<input name="working_hours[]"  value="{{explode(':',$school->working_hours)[1]}}" style="size: 20px; display: inline-block" type="text" class="form-control text-left timepicker">
									</div><!-- /.col-xs-6 -->
								</div>
							</div><!-- /.form-grop -->
							
							<div class="form-group">
								<label><span style="color:red">*</span> نوع التعليم</label>
								<select name="type" class="form-control text-right" required>
									<option value="صف واحد">
										صف واحد
									</option>
									<option value="متعددة المستويات">
										متعددة المستويات
									</option>
								</select>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label><span style="color:red">*</span> نوع المدرسة</label>
								<select name="type" class="form-control text-right">
									<option @if($school->type=="صف واحد") {{"selected=selected"}} @endif required="required" value="صف واحد">
										صف واحد
									</option>
									<option @if($school->type=="متعددة المستويات") {{"selected=selected"}} @endif value="متعددة المستويات">
										متعددة المستويات
									</option>
									<option @if($school->type=="صديقة الفتيات") {{"selected=selected"}} @endif value="صديقة الفتيات">
										صديقة الفتيات
									</option>
									<option @if($school->type=="جمعيات اهلية صديقة اطفال") {{"selected=selected"}} @endif value="جمعيات اهلية صديقة اطفال">
										جمعيات اهلية صديقة اطفال
									</option>
									<option @if($school->type=="اطفال بلا مأوي") {{"selected=selected"}} @endif value="اطفال بلا مأوي">
										اطفال بلا مأوي
									</option>
								</select>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label><span style="color:red">*</span> المرحلة التعليمية</label>
								<select type="text" name="level"  required="required" class="form-control text-right">
									<option  @if($school->levels=="المرحلة الابتدائية") {{"selected=selected"}} @endif value="المرحلة الابتدائية" class="text-right">اولي الابتدائية</option>
									<option  @if($school->levels=="تانية الابتدائية") {{"selected=selected"}}  @endif value="تانية الابتدائية" class="text-right">تانية الابتدائية</option>
									<option  @if($school->levels=="تالتة الابتدائية") {{"selected=selected"}} @endif value="تالتة الابتدائية" class="text-right">تالتة الابتدائية</option>
									<option  @if($school->levels=="رابعة الابتدائية") {{"selected=selected"}} @endif value="رابعة الابتدائية" class="text-right">رابعة الابتدائية</option>
									<option  @if($school->levels=="خامسة الابتدائية") {{"selected=selected"}} @endif value="خامسة الابتدائية" class="text-right">خامسة الابتدائية</option>
									<option  @if($school->levels=="ستة الابتدائية") {{"selected=selected"}}  @endif value="ستة الابتدائية" class="text-right">ستة الابتدائية</option>
								</select>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label class="text-right"><span style="color:red">*</span> التقيم</label>
								<select name="rate" class="form-control text-right">
									<option @if($school->rate=="متوسط") {{"selected=selected"}} @endif  required="required" value="متوسط">
										متوسط
									</option>
									<option @if($school->rate=="قوي") {{"selected=selected"}} @endif value="قوي">
										قوي
									</option>
									<option @if($school->rate=="ضعيف") {{"selected=selected"}} @endif value="ضعيف">
										ضعيف
									</option>
								</select>
							</div><!-- /.form-group -->
						</div><!-- /.col-md-6 -->

					
						
						<div class="col-md-6" style="padding:25px;">
							<div class="form-group">
								<label><span style="color:red">*</span>  المديرية/المحافظة</label>
								<select name="governorate" class="form-control text-right" id="flag-investor">
									<option @if($school->governorate=="الجيزة") {{"selected=selected"}} @endif class="text-right" selected="selected" value="الجيزة">
										الجيزة
									</option>
									<option @if($school->governorate=="المنيا") {{"selected=selected"}} @endif class="text-right" value="المنيا">
										المنيا
									</option>
									<option  @if($school->governorate=="الاسكندرية") {{"selected=selected"}} @endif class="text-right" value="الاسكندرية">
										الاسكندرية
									</option>
								</select>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label><span style="color:red">*</span>  ادارة/مركز</label>
								<select  name="Adminstration" class="form-control text-right" id="flag-investor">
									<option @if($school->Adminstration=="الجيزة") {{"selected=selected"}} @endif  class="text-right" selected="selected" value="الجيزة">
										الجيزة
									</option>
									<option @if($school->Adminstration=="المنيا") {{"selected=selected"}} @endif class="text-right" value="المنيا">
										المنيا
									</option>
									<option @if($school->Adminstration=="الاسكندرية") {{"selected=selected"}} @endif class="text-right" value="الاسكندرية">
										الاسكندرية
									</option>
								</select>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>القرية الام</label>
								<input value="{{$school->mother_village}}" name="mother_village" type="text" class="form-control text-right" placeholder="ادخل القرية التابعة لها المدرسة">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>القرية</label>
								<input  value="{{$school->village}}" name="center" type="text" class="form-control text-right" placeholder="ادخل العزبة التابعة لها المدرسة">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>العنوان بالتفصيل</label>
								<textarea name="address" class="form-control text-right" rows="5" style="resize:none;" placeholder="ادخل عنوان المدرسة بالتفصيل">{{$school->address}}</textarea>
							</div><!-- /.form-group -->

							<div class="form-group">
								<label>تسريع التعليم</label>
								<input @if($school->education_accelerate=="true") {{"checked"}} @endif style="margin-right: 2px;margin-top: 2px;" value="true" type="checkbox" name="education_accelerate">
							</div><!-- /.form-group -->

							<!-- how the school build -->
							<div class="form-group">
								<label><span style="color:red;"></span> طريقة الانشاء</label>
								<input type="text" class="form-control" value="{{ $school->created_way }}" disabled value="جهة وزارية"  name="created_way">
							</div><!-- /.form-group -->
							<!-- how the school build -->

						</div><!-- /.col-md-6 -->

						
					</div><!-- /.row -->
					<input type="submit" class="btn btn-primary" value="حفظ">

				</form>
			</div><!-- /.form-container -->
		</div><!-- /.row -->
	</div><!-- /.container -->
	<!-- End Project Main Page -->

@endsection
