@extends("default")

@section("content")
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading speacial-bg">
				<h3 class="panel-title">بيانات المعلمة {{$teacher->full_name}}</h3>
			</div><!-- /.panel-headding -->
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3 text-center">
						<img src='{{asset("imgs/$teacher->profile_pic")}}' class="img-thumbnail img-full-width">
						<div class="teacher-profile-controler">
							<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target=".upload-photo-model">رفع صورة</button>
                            <a href= "../teachers_files/create" class="btn btn-primary btn-block">اضافة ملف رسمي</a>
							<button type="button" class="btn btn-success btn-block button-click-slide-action" data-button-click-slide-target=".official-file-slider">عرض الملفات</button>
							<a href= "{{$teacher->id}}/edit" class="btn btn-warning btn-block">تعديل بيانات المعلمة</a>
                            <form method = 'post'>
                                @method("DELETE")
                                @csrf
                            <button type="submit" class="btn btn-warning btn-block">حذف بيانات المعلمة</button>
                            </form>
                            
							
						</div>
					</div><!-- /.col-md-3 -->
					<div class="col-md-9 profile-info-table-container">
						<table class="table table-hover table-condensed table-striped" style="border: 1px solid #ddd;">
							<tr>
								<td><b>المدرسة</b></td>
								<td><a href="school_profile.php">{{$teacher->school_name}}</a></td>
							</tr>
							<tr>
								<td><b>رقم البطاقة</b></td>
								<td>{{$teacher->ssn}}</td>
							</tr>
							<tr>
								<td><b>الحالة الاجتماعية</b></td>
								<td>{{$teacher->social_status}}</td>
							</tr>
							<tr>
								<td><b>الديانة</b></td>
								<td>{{$teacher->religion}}</td>
							</tr>
							<tr>
								<td><b>سنين الخبرة</b></td>
								<td>{{$teacher->experience_years}}</td>
							</tr>
						</table>
						<table class="table table-hover table-condensed table-striped" style="border: 1px solid #ddd;">
							<tr>
								<td><b>المستوي التعليمي</b></td>
								<td>{{$teacher->education}}</td>
							</tr>
							<tr>
								<td><b>الجهة التي تدفع الراتب</b></td>
								<td>{{$teacher->salary_investor}}</td>
							</tr>
							<tr>
								<td><b>تاريخ التعين</b></td>
								<td>{{$teacher->hiring_date}}</td>
							</tr>
							<tr>
								<td><b>رقم الهاتف</b></td>
								<td>{{$teacher->phone}}</td>
							</tr>
							<tr>
								<td><b>البريد الالكتروني</b></td>
								<td>{{$teacher->email}}</td>
							</tr>
						</table>
						<table class="table table-hover table-condensed table-striped" style="border: 1px solid #ddd;">
							<tr>
								<td><b>الجهة الداعمة</b></td>
								<td>مصر الخير</td>
							</tr>
							<tr>
								<td colspan='1'><b>المحافظة/المديرية</b></td>
								<td colspan='1'>الجيزة</td>
							</tr>
							<tr>
								<td><b>المركز/الادارة</b></td>
								<td>الهرم</td>
							</tr>
							<tr>
								<td><b>العنوان</b></td>
								<td>{{$teacher->address}}</td>
							</tr>
							<tr>
								<td><b>المجتمع</b></td>
								<td>ريفي</td>
							</tr>
						</table>
						
						<table class="table table-hover table-condensed table-striped" style="border: 1px solid #ddd;">
							<tr>
								<td><b>اسم المستخدم</b></td>
								<td>{{$teacher->account_name}}</td>
							</tr>
							<tr>
								<td><b>كلمة المرور</b></td>
								<td>{{$teacher->password}}</td>
							</tr>
						</table>
					</div><!-- /.col-md-9 -->
					<div class="col-md-9"></div><!-- /.col-md-9 -->
				</div><!-- /.row -->
			</div><!-- /.panel-body -->
		</div><!-- /.panel -->
		
		
		<!-- End Teqacher's Official File Manager -->
		<div class="customized-table-container official-file-slider button-click-slide-target">
			<legend>ملفات المعلمة</legend>
			<div class="table-container">
				<table class="table table-striped text-center">
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">اسم الملف</th>
						<th class="text-center">التحكم</th>
					</tr>
					@foreach($files as $file)
						<tr>
							<td class="text-center">1</td>
							<td class="text-center"><a href="user_profile.php">{{$file->file_name}}</a></td>
							<td>
								<a class="btn btn-success btn-xs" href = "../teachers_files/{{$file->id}}">عرض الملف</a>
								<form method="post" action="../teachers_files/{{$file->id}}" style="display:inline">
                                    @method("DELETE")
                                    @csrf
									<input type="hidden" name="book_id" value="<?php echo 1;?>">
									<input type="submit" class="btn btn-danger btn-xs confirm-delete" data-confirm-dname="<?php echo 'مصر الخير';?>" value="ازالة الملف">
								</form>
							</td>
						</tr>
					@endforeach
				</table>
			</div><!-- /.table-container -->
		</div><!-- /.customized-table-container -->
		<!-- End Teqacher's Official File Manager -->
		
	</div><!-- /.container -->

	
	<div class="modal fade id-model" tabindex="-1" role="dialog">
		  <div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
			  <form class="form-container-small">
				<legend class="text-right">صورة بطاقة شخصية</legend>
				<img src="imgs/id.jpg" class="img-full-width">
			  </form>
			</div>
		  </div>
		</div>

		
		<div class="modal fade upload-id-model" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body">
					  <form class="form-container-small" enctype="multipaer/form-data">
						<legend class="text-right">رفع صورة بطاقة شخصية</legend>
						<input type="file" name="" id="fileToUpload">
						<input class="btn btn-primary pull-left" type="submit" value="رفع صورة بطاقة شخصية" name="submit">
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