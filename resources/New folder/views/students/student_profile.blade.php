@extends("default")

@section("content")

	<div class="container">
		<div class="panel panel-default student-profile-card">
			<div class="panel-heading speacial-bg">
				<h3 class="panel-title">بيانات الطالب {{$student->name}}</h3>
			</div><!-- /.panel-heading -->
			
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3 text-center">
						<img src='{{asset("imgs/profile.png")}}' class="img-thumbnail img-full-width">
						<div class="student-profile-controler">
							<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target=".upload-photo-model">رفع صورة</button>
							<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".upload-official-file-model">اضافة ملف رسمي</button>
							<button type="button" class="btn btn-success btn-block button-click-slide-action" data-button-click-slide-target=".official-file-slider">عرض الملفات</button>
							<a href="{{route("students.edit",$student->id)}}" class="btn btn-warning btn-block">تعديل بيانات الطالب</a>
							<form method="post" action="{{route("students.destroy",$student->id)}}">
								@method("delete")
								@csrf
								<button type="submit" style="margin-top: 5px" class="btn btn-danger btn-block confirm-delete" data-confirm-dname="<?php echo 'محمد احمد';?>">حذف بيانات الطالب</button>

							</form>  						</div>
					</div><!-- /.col-md-3 -->
					
					<div class="col-md-9 profile-info-table-container">
						<table class="table table-hover table-condensed table-striped" style="border: 1px solid #ddd;">
							<tr>
								<td><b>المدرسة</b></td>
								<td><a href="{{route("schools.show",$student->school_id)}}">{{$school->name}}</a></td>
							</tr>
							<tr>
								<td><b>المرحلة التعليمية</b></td>
								<td>{{$student->level}}</td>
							</tr>
							<tr>
								<td><b>تاريخ الميلاد</b></td>
								<td>{{$student->birth_date}}</td>
							</tr>
							<tr>
								<td><b>موهبت الطفل</b></td>
								<td>{{$student->talent}}</td>
							</tr>
							<tr>
								<td><b>نقاط الطالب</b></td>
								<td>{{$student->points}}</td>
							</tr>
						</table>
						
						<table class="table table-hover table-condensed table-striped" style="border: 1px solid #ddd;">
							<tr>
								<td><b>رقم شهادة الميلاد</b></td>
								<td>{{$student->ssn}}</td>
							</tr>
							<tr>
								<td><b>الديانة</b></td>
								<td>{{$student->religion}}</td>
							</tr>
							<tr>
								<td><b>الحالة الاجتماعية</b></td>
								<td>{{$student->social_status}}</td>
							</tr>
							<tr>
								<td><b>متوسط دخل الاسرة</b></td>
								<td>2000 جنية</td>
							</tr>
							<tr>
								<td><b>وضع الطفل الصحي</b></td>
								<td>{{$student->health_state}}</td>
							</tr>
						</table>
						
						<table class="table table-hover table-condensed table-striped" style="border: 1px solid #ddd;">
							<tr>
								<td><b>الجهة الداعمة</b></td>
								<td>{{$student->investor}}</td>
							</tr>
							<tr>
								<td colspan='1'><b>المحافظة/المديرية</b></td>
								<td colspan='1'>{{$school->governorate}}</td>
							</tr>
							<tr>
								<td><b>المركز/الادارة</b></td>
								<td>{{$student->address}}</td>
							</tr>
							<tr>
								<td><b>العنوان</b></td>
								<td>{{$student->address}}</td>
							</tr>
							<tr>
								<td><b>المجتمع</b></td>
								<td>{{$student->society}}</td>
							</tr>
						</table>
						
						<table class="table table-hover table-condensed table-striped" style="border: 1px solid #ddd;">
							<tr>
								<td><b>اسم المستخدم</b></td>
								<td>{{$student->account_name}}</td>
							</tr>
							<tr>
								<td><b>كلمة المرور</b></td>
								<td>{{$student->password}}</td>
							</tr>
						</table>
					</div><!-- /.col-md-9-->
				</div><!-- /.row -->
			</div><!-- panel-body -->
		</div><!-- /.panel, ./student-profile-card -->
		
		<!-- Start Students's Official File Manager -->
		<div class="customized-table-container official-file-slider button-click-slide-target">
			<legend>ملفات الطالب</legend>
			<div class="table-container">
				<table class="table table-striped text-center">
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">اسم الملف</th>
						<th class="text-center">التحكم</th>
					</tr>
					<?php for($i=0; $i<10; $i++):?>
						<tr>
							<td class="text-center">1</td>
							<td class="text-center"><a href="user_profile.php">شهادة ميلاد</a></td>
							<td>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target=".birth-certificate-model">عرض الملف</button>
								<form method="post" action="test.php" style="display:inline">
									<input type="hidden" name="book_id" value="<?php echo 1;?>">
									<input type="submit" class="btn btn-danger btn-xs confirm-delete" data-confirm-dname="<?php echo 'مصر الخير';?>" value="ازالة الملف">
								</form>
							</td>
						</tr>
					<?php endfor;?>
				</table>
			</div><!-- /.table-container -->
		</div><!-- /.customized-table-container -->
		<!-- End Students's Official File Manager -->		
	</div><!-- /.container -->
	
	<div class="modal fade birth-certificate-model" tabindex="-1" role="dialog">
		  <div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
			  <form class="form-container-small">
				<legend class="text-right">شهادة ميلاد الطالب</legend>
				<img src="imgs/birth_certificate.jpg" class="img-full-width">
			  </form>
			</div>
		  </div>
		</div>
		
		<div class="modal fade upload-official-file-model" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body">
					  <form class="form-container-small" enctype="multipaer/form-data">
						<legend class="text-right">اضافة ملف رسمي</legend>
						<input type="file" name="" id="fileToUpload">
						<input class="btn btn-primary pull-left" type="submit" value="اضافة ملف" name="submit">
					  </form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade upload-photo-model" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body">
					  <form class="form-container-small" enctype="multipaer/form-data">
						<legend class="text-right">رفع صورة شخصية</legend>
						<input type="file" name="" id="fileToUpload">
						<input class="btn btn-primary pull-left" type="submit" value="رفع صورة شخصية" name="submit">
					  </form>
					</div>
				</div>
			</div>
		</div>
@endsection
