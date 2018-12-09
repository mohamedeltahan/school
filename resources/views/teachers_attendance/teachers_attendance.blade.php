@extends("default")

@section("content")
<!-- Start Project Main Page -->
<!-- Start Project Main Page -->
<!-- Start Project Main Page -->
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-12">
				<nav class="attendance-navbar">
					<ul class="list-unstyled attendance-nav-toggle">
						<li class="attendance-nav-active" data-attendance-target=".attendance-management">الغياب</li>
						<li data-attendance-target=".attendance-insert">تسجيل الغياب</li>
						<li data-attendance-target=".attendance-vacation">تسجيل اجازات</li>
					</ul>
				</nav>
			</div><!-- /.col-md-12 -->
		</div><!-- /row -->
	
	
	
		<!-- Start Attendance Show -->
		<!-- Start Attendance Show -->
		<!-- Start Attendance Show -->
		<div class="row attendance-toggle attendance-management">
			<div class="col-md-4">
				<form class="form-container">
					<legend>ادارة غياب المعلمات</legend>
					<div class="form-group">
						<label>البحث باسم المعلمات</label>
						<input type="text" class="form-control text-right fast-search" data-search-target=".find-attendance" data-target-coulmn="attendance-full_name" placeholder="البحث باسم المعلمة">
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>البحث بالمدرسة</label>
						<input type="text" class="form-control text-right fast-search" data-search-target=".find-attendance" data-target-coulmn="attendance-school" placeholder="البحث باسم المدرسة">
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>البحث بالتاريخ</label>
						<div class="row fast-search-interval" data-search-target=".find-attendance" data-target-coulmn-1="attendance-absent-time" data-target-coulmn-2="attendance-absent-return">
							<div class="col-md-6 col-xs-12">
								<label>من</label>
								<input type="" class="form-control birth-date-input-field fast-search-interval-1" placeholder="تاريخ بداية البحث">
							</div>
							<div class="col-md-6 col-xs-12">
								<label>الي</label>
								<input type="" class="form-control birth-date-input-field fast-search-interval-2" placeholder="تاريخ انتهاء البحث">
							</div>
							<button class="btn btn-default btn-xs pull-left clear-field" style="margin: 5px 0 0px 15px;">تفريغ الحقول</button>
						</div><!-- /.row -->
						<div class="form-group date-message-error" style="padding: 10px 0; margin-bottom: 0;">
							<p class="alert alert-danger" style="padding: 5px; margin: 0;">ادخل تاريخ مناسب</p>
						</div><!-- /.form-group -->
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>البحث المديرية/المحافظة</label>
						<select class="form-control text-right fast-search-select" data-search-target=".find-attendance" data-target-coulmn="attendance-governorate">
							<option value="all">الكل</option>
							<option>الجيزة</option>
							<option>الفيوم</option>
							<option>المنيا</option>
						</select>
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>البحث بالمركز</label>
						<select class="form-control text-right fast-search-select" data-search-target=".find-attendance" data-target-coulmn="attendance-adminstration">
							<option value="all">الكل</option>
							<option>الجيزة</option>
							<option>الفيوم</option>
							<option>المنيا</option>
						</select>
					</div><!-- /.form-group -->
					<!--input type="submit" class="btn btn-default" value="بحث"-->
				</form>
			</div><!--/.col-md-4 -->
			
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-right">ادارة غياب المعلمات</h3>
					</div><!-- /.panel-headding -->
		
					<div class="panel-body">
						<div class="users-control-table" style="height:435px;">
							<table class="table table-striped table-hover">
								<tr>
									<th class="text-center" class="text-center">#</th class="text-center">
									<th class="text-center">المعلمة</th class="text-center">
									<th class="text-center">المدرسة</th class="text-center">
									<th class="text-center">المديرية/المحافظة</th class="text-center">
									<th class="text-center">الادارة/المركز</th class="text-center">
									<th class="text-center">تاريخ الغياب</th class="text-center">
                                    <th class="text-center">تاريخ العودة</th>
									<th class="text-center">نوع الغياب</th class="text-center">
									<th class="text-center" style="min-width: 140px;">التحكم</th>                                    
								</tr>
                                
                                @foreach($attendances as $attendance)
								<tr>
									<td class="text-center find-attendance"
										data-attendance-id="{{$attendance->id}}" data-attendance-full_name="{{$attendance->full_name}}"
										data-attendance-governorate="{{$attendance->governorate}}" data-attendance-adminstration="{{$attendance->Adminstration}}"
										data-attendance-absent-time="{{$attendance->absent_time}}" data-attendance-absent-return="{{$attendance->return_time}}"
										data-attendance-school="{{$attendance->name}}">{{$attendance->id}}</td class="text-center">
									<td class="text-center"><a href="{{route('teachers.show',$attendance->teacher_id)}}">{{$attendance->full_name}}</a></td class="text-center">
									<td class="text-center">{{$attendance->name}}</td class="text-center">
									<td class="text-center">{{$attendance->governorate}}</td class="text-center">
									<td class="text-center">{{$attendance->Adminstration}}</td class="text-center">
									<td class="text-center">{{$attendance->absent_time}}</td class="text-center">
									<td class="text-center">{{$attendance->return_time}}</td class="text-center">
									<td class="text-center">{{$attendance->reason}}</td class="text-center">
                   
									<!--td class = "text-center"><a href = "/teachers_attendance/{{$attendance->id}}/edit" class = "btn btn-warning btn-xs">تعديل</a></td-->
		
									<td class="text-center">
										@if($attendance->report && ($attendance->reason == "اجازة مرضية" || $attendance->reason == "اجازة وضع"))
											<!--td class="text-center"><a class="btn btn-xs btn-primary" href="{{asset($attendance->report)}}">عرض</a></td class="text-center"-->
											<button class="btn btn-primary btn-xs show-content" data-toggle="modal" data-value="{{asset($attendance->report)}}" data-target=".show-attendance-file-model">عرض</button>
										@endif
										<button class="btn btn-warning btn-xs url-target-action edit-attendance-form-action"  
											data-name="{{$attendance->full_name}}" data-absent-time="{{$attendance->absent_time}}" 
											data-return-time="{{$attendance->absent_time}}" data-attendance-id="{{$attendance->id}}" 
											data-toggle="modal" data-target=".edit-attendance-model">تعديل</button>
										<form method = "post" style="display:inline;" action="{{route('teachers_attendance.destroy' , $attendance->id)}}">
											@method('delete')
											@csrf
											<button type="submit" class="btn btn-danger btn-xs">حذف</button>
										</form>
									</td>
								</tr>
                                @endforeach
							</table>
						</div><!-- /.users-control-table -->
					</div><!-- /.panel-body -->
				</div><!-- /.panel-default -->
			</div><!--/.col-md-8 -->
		</div><!-- /.row .attendance-toggle -->
		<!-- End Attendance Show -->
		<!-- End Attendance Show -->
		<!-- End Attendance Show -->
		
		
		
		<!-- Start Absence Recording -->
		<!-- Start Absence Recording -->
		<!-- Start Absence Recording -->
		<div class="row attendance-toggle attendance-insert">
			<div class="col-md-2"></div>
			<div class="col-md-7">
				<form enctype="multipart/form-data" method = "post" class="form-container" action = "{{route('teachers_attendance.store')}}">
                    
                    @csrf
					<legend>تسجيل غياب معلمة</legend>
                    
                    <?php $teachers = App\teacher::all(); ?>
					
					<div class="form-group">
						<label>نوع الغياب</label>
						<div class="special-form cheack-file-required">
							<label><input type="radio" value="option1" required name="reason"> اجازة مرضية</label>
							<label><input type="radio" value="option2" required name="reason"> اجازة عارضة</label>
							<label><input type="radio" value="option3" required name="reason"> اجازة وضع</label>
							<label><input type="radio" value="option4 " required name="reason"> اجازة حضور تدريبات</label>
							<label><input type="radio" value="option5" required name="reason"> اجازة حضور مؤتمر</label>
						</div><!-- /.special-form -->
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>تحديد التاريخ الاجازة</label>
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<label>من</label>
								<input name = "absent_time" type="" class="form-control birth-date-input-field" required placeholder="تاريخ بداية الاجازة">
							</div>
							<div class="col-md-6 col-xs-12">
								<label>الي</label>
								<input name = "return_time" type="" class="form-control birth-date-input-field" required placeholder="تاريخ انتهاء الاجازة">
							</div>
						</div><!-- /.row -->	
					</div><!-- /.form-group -->
					
					<!-- school search -->
					<div class="special-form">
						<legend>حدد المعلمة</legend>
						<div class="form-group">
							<label>البحث المديرية/المحافظة</label>
							<select class="form-control text-right">
								<option>الجيزة</option>
								<option>الفيوم</option>
								<option>النيا</option>
							</select>
						</div><!-- /.form-group -->
						
						<div class="form-group">
							<label>البحث بالادارة/المركز</label>
							<select class="form-control text-right">
								<option>الجيزة</option>
								<option>الفيوم</option>
								<option>النيا</option>
							</select>
						</div><!-- /.form-group -->
						
						<div class="form-group">
							<label>حدد المدرسة</label>
							<select class="form-control text-right">
								<option>ام الابطال</option>
								<option>الهرم</option>
								<option>الاورمان</option>
							</select>
						</div><!-- /.form-group -->
						
						<div class="form-group">
							<label>اسم المعلمة</label>
							<select name = "teacher_id" class="form-control text-right">
								@foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->full_name}}</option>
                                @endforeach
							</select>
						</div><!-- /.form-group -->
					</div><!-- /.special-form -->
					<!-- end school search -->
					
					<div class="form-group hidden-element file-require-field">
						<label>رفع مرفق غياب</label>
						<input name = "report" type="file" class="form-file">
					</div><!-- /.form-group-->
					<input type="submit" class="btn btn-default" value="تسجيل الاجازة">
				</form>
			</div><!-- /.col-md-7 .col-md-offset-2 -->
		</div><!-- /.row .attendance-toggle -->
		<!-- End Attendance Recording -->
		<!-- End Attendance Recording -->
		<!-- End Attendance Recording -->
		
		
		
		<!-- Start Official vacation Recording -->
		<!-- Start Official vacation Recording -->
		<!-- Start Official vacation Recording -->
		<div class="row attendance-toggle attendance-vacation">
			<div class="col-md-2"></div>
			<div class="col-md-7">
				<form class="form-container">
					<legend>تسجيل اجازة</legend>
					<div class="form-group">
						<label>تحديد التاريخ الاجازة</label>
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<label>من</label>
								<input type="" class="form-control birth-date-input-field" required placeholder="تاريخ بداية الاجازة">
							</div>
							<div class="col-md-6 col-xs-12">
								<label>الي</label>
								<input type="" class="form-control birth-date-input-field" required placeholder="تاريخ انتهاء الاجازة">
							</div>
						</div><!-- /.row -->		
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>نوع الاجازة</label>
						<br>
						<div class="special-form">
							<label><input type="radio" required class="vication-radio-selector" name="category" value="option1"> اجازة موسمية علي مستوى الدولة</label>
							<br>
							<label><input type="radio" class="vication-radio-selector" name="category" value="option2"> اجازة علي مستوي المحافظة</label>
							<br>
							<label><input type="radio" class="vication-radio-selector" name="category" value="option3"> اجازة موسمية علي مستوي المركز</label>
						</div><!-- -->
					</div><!-- /.form-group -->
					
					<!-- START school search -->
					<div class="special-form hidden-element vication-category">
						<legend>حدد المدارس</legend>
						<div class="form-group vication-governiment">
							<label>المديرية/المحافظة</label>
							<select class="form-control text-right">
								<option>الجيزة</option>
								<option>الفيوم</option>
								<option>النيا</option>
							</select>
						</div><!-- /.form-group -->
						
						<div class="form-group hidden-element vication-center">
							<label>بالادارة/المركز</label>
							<select class="form-control text-right">
								<option>الجيزة</option>
								<option>الفيوم</option>
								<option>النيا</option>
							</select>
						</div><!-- /.form-group -->
						
						<div class="form-group hidden-element custome-mine-table vication-viliage">
							 <label class="text-center"><span style="color:red">*</span>اختر المدرسة </label>
							 <table class="table table-striped table-condensed">
							   <tr>
								 <th class="text-center">#</th>
								 <th class="text-center">اسم المدرسة</th>
								 <th class="text-center">اسم القرية</th>
								 <th class="text-center"><input type="checkbox" id="select-all" data-checkbox-parent="vication-holder"></th>
							   </tr>
							   <?php for($i=0; $i<20; $i++): ?>
								 <tr>
								   <td class="text-center">
									 1000
								   </td>
								   <td class="text-center">
									 مدرسة مستقبل
								   </td>
								   <td class="text-center">
									 ارض الطيبين
								   </td>
								   <td class="text-center">
									 <input name="school" type="checkbox" data-checkbox-children="vication-holder">
								   </td>
								 </tr>
							   <?php endfor; ?>
							 </table>
					   </div><!-- form-group -->
					</div><!-- /.special-form -->
					<!-- END school search -->
					
					<input type="submit" class="btn btn-default" value="تسجيل الاجازة">
				</form>
			</div><!-- /.col-md-7 .col-md-offset-2 -->
		</div><!-- /.row .attendance-toggle -->
		<!-- End Official vacation Recording -->
		<!-- End Official vacation Recording -->
		<!-- End Official vacation Recording -->
		
		
	</div><!-- /.container -->
<!-- End Project Main Page -->
<!-- End Project Main Page -->
<!-- End Project Main Page -->
	



<!-- Start Attendance Model -->
<!-- Start Attendance Model -->
<!-- Start Attendance Model -->

	
	<!-- Start show attendance details -->
	<!-- Start show attendance details -->
	<!-- Start show attendance details -->
	<div class="modal fade show-attendance-file-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
				<div class="img-container">
					<img  class="thumbnail text-center" src=""></img>
				</div>
            </div>
        </div>
    </div><!-- /.modal -->
	
	<div class="modal fade edit-attendance-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
				<form method='post' class="form-container-small" action="{{route('teachers_attendance.update' , 'x')}}">
					@method('put')
					@csrf<legend>تعديل علي غياب طالب</legend>
					<div class="form-group">
						<label>الاسم</label>
						<input id="full-name" disabled type="text" class="form-control">
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>بداية الغياب</label>
						<input id="start-date" type="text" disabled class="form-control">
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>نهاية الغياب</label>
						<input id="end-date" type="text" disabled class="form-control">
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>نوع الغياب</label>
						<div class="special-form cheack-file-required">
							<label><input type="radio" value="option1" required name="reason"> اجازة مرضية</label>
							<label><input type="radio" value="option2" required name="reason"> اجازة عارضة</label>
							<label><input type="radio" value="option3" required name="reason"> اجازة وضع</label>
							<label><input type="radio" value="option4" required name="reason"> اجازة حضور تدريبات</label>
							<label><input type="radio" value="option5" required name="reason"> اجازة حضور مؤتمر</label>
						</div><!-- /.special-form -->
					</div><!-- /.form-group -->
					
					<div class="form-group file-require-field">
						<label>رفع مرفق غياب</label>
						<input name = "report" type="file" class="form-file">
					</div><!-- /.form-group-->
					
                    <input type="submit" class="btn btn-primary" value="حفظ الملف">
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
	<!-- End show attendance details -->
	<!-- End show attendance details -->
	<!-- End show attendance details -->
	
	
<!-- End Attendance Model -->
<!-- End Attendance Model -->
<!-- End Attendance Model -->
@endsection