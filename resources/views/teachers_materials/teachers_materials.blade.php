@extends("default")

@section("content")
	<!-- Start Project Main Page -->
	<!-- Start Project Main Page -->
	<!-- Start Project Main Page -->
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<nav class="teacher-matrials-navbar">
					<ul class="list-unstyled matrials-nav-toggle">
						<li class="matrials-nav-active" data-matrials-target=".matrials-arabic">عربي</li>
						<li data-matrials-target=".matrials-religion">دين</li>
						<li data-matrials-target=".matrials-math">رياضة</li>
						<li data-matrials-target=".matrials-scince">علوم</li>
						<li data-matrials-target=".matrials-history">دراسات</li>
						<li data-matrials-target=".matrials-english">اللغة الانجليزية</li>
						<li data-matrials-target=".matrials-add-new">اضافة مادة تعليمية</li>
					</ul>
				</nav>
			</div><!-- /.col-md-12 -->
		</div><!-- /row -->


		<!-- Start Matrials Show -->
		<!-- Start Matrials Show -->
		<!-- Start Matrials Show -->
		<div class="row">
			<div class="col-md-4 col-xs-12 matrials-search">
			<form class="form-container">
    
					<legend>ادارة المواد التعليمية</legend>
					
					<div class="form-group">
						<label>البحث بالصف</label>
						<select class="form-control fast-search-select" data-search-target=".find-matrial" data-target-coulmn="level">
							<option value = "all">الكل</option>
							<option value = "1">الاول الابتدائي</option>
							<option value = "2">الثاني الابتدائي</option>
							<option value = "3">الثالث الابتدائي</option>
							<option value = "4">الرابع الابتدائي</option>
							<option value = "5">الخامس الابتدائي</option>
							<option value = "6">السادس الابتدائي</option>
						</select>
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>البحث بالترم</label>
						<select class="form-control fast-search-select" data-search-target=".find-matrial" data-target-coulmn="unit">
							<option value = "all">الكل</option>
							<option value = "الاول">الترم الاول</option>
							<option value = "الثاني">الترم الثاني</option>
						</select>
					</div><!-- /.form-group -->

					<div class="form-group">
						<label>البحث بالوحدة</label>
						<select class="form-control fast-search-select" data-search-target=".find-matrial" data-target-coulmn="semester">
							<option value = "all">الكل</option>
							<option value = "الاولي">الوحدة الاولة</option>
							<option value = "الثانية">الوحدة الثانية</option>
							<option value = "الثالثة">الوحدة الثالثة</option>
							<option value = "الرابعة">الوحدة الرابعة</option>
							<option value = "الخامسة">الوحدة الخامسة</option>
						</select>
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>البحث بالمدرسة</label>
						<input type="text" class="form-control fast-search-select" data-search-target=".find-matrial" data-target-coulmn="" placeholder="ادخل اسم المدرسة">
					</div><!-- /.form-group -->
					
					<input type="submit" class="btn btn-default" value="بحث">
					
				</form>
			</div><!-- /.col-md-4 -->

			<!-- Start Show Arabic Matrials -->
			<!-- Start Show Arabic Matrials -->
			<!-- Start Show Arabic Matrials -->
			<div class="col-md-8 col-xs-12 matrials-toggle matrials-arabic">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-right">ادارة ملفات مادة اللغة العربية</h3>
					</div><!-- /.panel-headding -->

					<div class="panel-body">
						<div class="users-control-table" style="height:435px;">
							<table class="table table-striped table-hover">
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">اسم الملف</th>
									<th class="text-center">الصف</th>
									<th class="text-center">الوحدة</th>
									<th class="text-center">الترم</th>
									<th class="text-center">اسم المعلمة</th>
									<th class="text-center">المدرسة</th>
									<th class="text-center" style="min-width: 155px;">التحكم</th>
								</tr>
                                @foreach($arabic_admin as $sub)
                                <tr>
                                    <td class="text-center find-matrial" data-file-name="{{$sub->file_name}}" data-level="{{$sub->level}}" 
										data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">{{$sub->id}}</td>
                                    <td class="text-center">{{$sub->file_name}}</td>
                                    <td class="text-center">{{$sub->level}}</td>
                                    <td class="text-center">{{$sub->unit}}</td>
                                    <td class="text-center">{{$sub->semester}}</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'ادارة الموقع'}} @endif</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'الكل'}} @endif</td>
                                    
                                    <td class = "text-center">
										@if($sub->file_link)
											<a class="btn btn-xs btn-primary" target="_blank" href="{{$sub->file_link}}">عرض</a>
										@else
											<a class="btn btn-xs btn-primary" target="_blank" href="{{asset($sub->file_directory)}}">تحميل</a>
										@endif
										<button class="btn btn-warning btn-xs url-genaric-target-action matrials-edit-action" data-target=".edit-matrial-model" data-toggle="modal"
											data-id="{{$sub->id}}" data-file-name="{{$sub->file_name}}" data-subject="{{$sub->subject}}"
											data-level="{{$sub->level}}" data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">تعديل</button>
                                        <form method="post" style="display:inline;" action="{{route('teachers_materials.destroy' , $sub->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class = "btn btn-xs btn-danger" type="submit">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

							</table>
						</div><!-- /.users-control-table -->
					</div><!-- /.panel-body -->
				</div><!-- /.panel-default -->
			</div><!-- /.col-md-8 -->
			<!-- End Show Arabic Matrials -->
			<!-- End Show Arabic Matrials -->
			<!-- End Show Arabic Matrials -->



			<!-- Start Show Religion Matrials -->
			<!-- Start Show Religion Matrials -->
			<!-- Start Show Religion Matrials -->
			<div class="col-md-8 col-xs-12 matrials-toggle matrials-religion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-right">ادارة ملفات مادة الدين</h3>
					</div><!-- /.panel-headding -->

					<div class="panel-body">
						<div class="users-control-table" style="height:435px;">
							<table class="table table-striped table-hover">
								<<tr>
									<th class="text-center">#</th>
									<th class="text-center">اسم الملف</th>
									<th class="text-center">الصف</th>
									<th class="text-center">الوحدة</th>
									<th class="text-center">الترم</th>
									<th class="text-center">اسم المعلمة</th>
									<th class="text-center">المدرسة</th>
									<th class="text-center" style="min-width: 155px;">التحكم</th>
								</tr>
                                @foreach($religion_admin as $sub)
                                <tr>
                                    <td class="text-center find-matrial" data-file-name="{{$sub->file_name}}" data-level="{{$sub->level}}" 
										data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">{{$sub->id}}</td>
                                    <td class="text-center">{{$sub->file_name}}</td>
                                    <td class="text-center">{{$sub->level}}</td>
                                    <td class="text-center">{{$sub->unit}}</td>
                                    <td class="text-center">{{$sub->semester}}</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'ادارة الموقع'}} @endif</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'الكل'}} @endif</td>
                                    
                                    <td class = "text-center">
										@if($sub->file_link)
											<a class="btn btn-xs btn-primary" target="_blank" href="{{$sub->file_link}}">عرض</a>
										@else
											<a class="btn btn-xs btn-primary" target="_blank" href="{{asset($sub->file_directory)}}">تحميل</a>
										@endif
										<button class="btn btn-warning btn-xs url-genaric-target-action matrials-edit-action" data-target=".edit-matrial-model" data-toggle="modal"
											data-id="{{$sub->id}}" data-file-name="{{$sub->file_name}}" data-subject="{{$sub->subject}}"
											data-level="{{$sub->level}}" data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">تعديل</button>
                                        <form method="post" style="display:inline;" action="{{route('teachers_materials.destroy' , $sub->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class = "btn btn-xs btn-danger" type="submit">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach


							</table>
						</div><!-- /.users-control-table -->
					</div><!-- /.panel-body -->
				</div><!-- /.panel-default -->
			</div><!-- /.col-md-8 -->
			<!-- End Show Religion Matrials -->
			<!-- End Show Religion Matrials -->
			<!-- End Show Religion Matrials -->



			<!-- Start Show Math Matrials -->
			<!-- Start Show Math Matrials -->
			<!-- Start Show Math Matrials -->
			<div class="col-md-8 col-xs-12 matrials-toggle matrials-math">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-right">ادارة ملفات مادة الرياضة</h3>
					</div><!-- /.panel-headding -->

					<div class="panel-body">
						<div class="users-control-table" style="height:435px;">
							<table class="table table-striped table-hover">
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">اسم الملف</th>
									<th class="text-center">الصف</th>
									<th class="text-center">الوحدة</th>
									<th class="text-center">الترم</th>
									<th class="text-center">اسم المعلمة</th>
									<th class="text-center">المدرسة</th>
									<th class="text-center" style="min-width: 155px;">التحكم</th>
								</tr>
                                @foreach($math_admin as $sub)
                                <tr>
                                    <td class="text-center find-matrial" data-file-name="{{$sub->file_name}}" data-level="{{$sub->level}}" 
										data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">{{$sub->id}}</td>
                                    <td class="text-center">{{$sub->file_name}}</td>
                                    <td class="text-center">{{$sub->level}}</td>
                                    <td class="text-center">{{$sub->unit}}</td>
                                    <td class="text-center">{{$sub->semester}}</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'ادارة الموقع'}} @endif</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'الكل'}} @endif</td>
                                    
                                    <td class = "text-center">
										@if($sub->file_link)
											<a class="btn btn-xs btn-primary" target="_blank" href="{{$sub->file_link}}">عرض</a>
										@else
											<a class="btn btn-xs btn-primary" target="_blank" href="{{asset($sub->file_directory)}}">تحميل</a>
										@endif
										<button class="btn btn-warning btn-xs url-genaric-target-action matrials-edit-action" data-target=".edit-matrial-model" data-toggle="modal"
											data-id="{{$sub->id}}" data-file-name="{{$sub->file_name}}" data-subject="{{$sub->subject}}"
											data-level="{{$sub->level}}" data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">تعديل</button>
                                        <form method="post" style="display:inline;" action="{{route('teachers_materials.destroy' , $sub->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class = "btn btn-xs btn-danger" type="submit">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

							</table>
						</div><!-- /.users-control-table -->
					</div><!-- /.panel-body -->
				</div><!-- /.panel-default -->
			</div><!-- /.col-md-8 -->
			<!-- End Show Math Matrials -->
			<!-- End Show Math Matrials -->
			<!-- End Show Math Matrials -->



			<!-- Start Show Scince Matrials -->
			<!-- Start Show Scince Matrials -->
			<!-- Start Show Scince Matrials -->
			<div class="col-md-8 col-xs-12 matrials-toggle matrials-scince">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-right">ادارة ملفات مادة العلوم</h3>
					</div><!-- /.panel-headding -->

					<div class="panel-body">
						<div class="users-control-table" style="height:435px;">
							<table class="table table-striped table-hover">
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">اسم الملف</th>
									<th class="text-center">الصف</th>
									<th class="text-center">الوحدة</th>
									<th class="text-center">الترم</th>
									<th class="text-center">اسم المعلمة</th>
									<th class="text-center">المدرسة</th>
									<th class="text-center" style="min-width: 155px;">التحكم</th>
								</tr>
                                @foreach($science_admin as $sub)
                                <tr>
                                    <td class="text-center find-matrial" data-file-name="{{$sub->file_name}}" data-level="{{$sub->level}}" 
										data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">{{$sub->id}}</td>
                                    <td class="text-center">{{$sub->file_name}}</td>
                                    <td class="text-center">{{$sub->level}}</td>
                                    <td class="text-center">{{$sub->unit}}</td>
                                    <td class="text-center">{{$sub->semester}}</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'ادارة الموقع'}} @endif</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'الكل'}} @endif</td>
                                    
                                    <td class = "text-center">
										@if($sub->file_link)
											<a class="btn btn-xs btn-primary" target="_blank" href="{{$sub->file_link}}">عرض</a>
										@else
											<a class="btn btn-xs btn-primary" target="_blank" href="{{asset($sub->file_directory)}}">تحميل</a>
										@endif
										<button class="btn btn-warning btn-xs url-genaric-target-action matrials-edit-action" data-target=".edit-matrial-model" data-toggle="modal"
											data-id="{{$sub->id}}" data-file-name="{{$sub->file_name}}" data-subject="{{$sub->subject}}"
											data-level="{{$sub->level}}" data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">تعديل</button>
                                        <form method="post" style="display:inline;" action="{{route('teachers_materials.destroy' , $sub->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class = "btn btn-xs btn-danger" type="submit">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
							</table>
						</div><!-- /.users-control-table -->
					</div><!-- /.panel-body -->
				</div><!-- /.panel-default -->
			</div><!-- /.col-md-8 -->
			<!-- End Show Scince Matrials -->
			<!-- End Show Scince Matrials -->
			<!-- End Show Scince Matrials -->



			<!-- Start Show History Matrials -->
			<!-- Start Show History Matrials -->
			<!-- Start Show History Matrials -->
			<div class="col-md-8 col-xs-12 matrials-toggle matrials-history">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-right">ادارة ملفات مادة الدراسات</h3>
					</div><!-- /.panel-headding -->

					<div class="panel-body">
						<div class="users-control-table" style="height:435px;">
							<table class="table table-striped table-hover">
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">اسم الملف</th>
									<th class="text-center">الصف</th>
									<th class="text-center">الوحدة</th>
									<th class="text-center">الترم</th>
									<th class="text-center">اسم المعلمة</th>
									<th class="text-center">المدرسة</th>
									<th class="text-center" style="min-width: 155px;">التحكم</th>
								</tr>
                                @foreach($social_admin as $sub)
                                <tr>
                                    <td class="text-center find-matrial" data-file-name="{{$sub->file_name}}" data-level="{{$sub->level}}" 
										data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">{{$sub->id}}</td>
                                    <td class="text-center">{{$sub->file_name}}</td>
                                    <td class="text-center">{{$sub->level}}</td>
                                    <td class="text-center">{{$sub->unit}}</td>
                                    <td class="text-center">{{$sub->semester}}</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'ادارة الموقع'}} @endif</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'الكل'}} @endif</td>
                                    
                                    <td class = "text-center">
										@if($sub->file_link)
											<a class="btn btn-xs btn-primary" target="_blank" href="{{$sub->file_link}}">عرض</a>
										@else
											<a class="btn btn-xs btn-primary" target="_blank" href="{{asset($sub->file_directory)}}">تحميل</a>
										@endif
										<button class="btn btn-warning btn-xs url-genaric-target-action matrials-edit-action" data-target=".edit-matrial-model" data-toggle="modal"
											data-id="{{$sub->id}}" data-file-name="{{$sub->file_name}}" data-subject="{{$sub->subject}}"
											data-level="{{$sub->level}}" data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">تعديل</button>
                                        <form method="post" style="display:inline;" action="{{route('teachers_materials.destroy' , $sub->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class = "btn btn-xs btn-danger" type="submit">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
							</table>
						</div><!-- /.users-control-table -->
					</div><!-- /.panel-body -->
				</div><!-- /.panel-default -->
			</div><!-- /.col-md-8 -->
			<!-- End Show History Matrials -->
			<!-- End Show History Matrials -->
			<!-- End Show History Matrials -->



			<!-- Start Show English Matrials -->
			<!-- Start Show English Matrials -->
			<!-- Start Show English Matrials -->
			<div class="col-md-8 col-xs-12 matrials-toggle matrials-english">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-right">ادارة ملفات مادة اللغة الانجليزية</h3>
					</div><!-- /.panel-headding -->

					<div class="panel-body">
						<div class="users-control-table" style="height:435px;">
							<table class="table table-striped table-hover">
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">اسم الملف</th>
									<th class="text-center">الصف</th>
									<th class="text-center">الوحدة</th>
									<th class="text-center">الترم</th>
									<th class="text-center">اسم المعلمة</th>
									<th class="text-center">المدرسة</th>
									<th class="text-center" style="min-width: 155px;">التحكم</th>
								</tr>
                                @foreach($english_admin as $sub)
                                <tr>
                                    <td class="text-center find-matrial" data-file-name="{{$sub->file_name}}" data-level="{{$sub->level}}" 
										data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">{{$sub->id}}</td>
                                    <td class="text-center">{{$sub->file_name}}</td>
                                    <td class="text-center">{{$sub->level}}</td>
                                    <td class="text-center">{{$sub->unit}}</td>
                                    <td class="text-center">{{$sub->semester}}</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'ادارة الموقع'}} @endif</td>
                                    <td class="text-center">@if( $sub->school_id == '') {{'الكل'}} @endif</td>
                                    
                                    <td class = "text-center">
										@if($sub->file_link)
											<a class="btn btn-xs btn-primary" target="_blank" href="{{$sub->file_link}}">عرض</a>
										@else
											<a class="btn btn-xs btn-primary" target="_blank" href="{{asset($sub->file_directory)}}">تحميل</a>
										@endif
										<button class="btn btn-warning btn-xs url-genaric-target-action matrials-edit-action" data-target=".edit-matrial-model" data-toggle="modal"
											data-id="{{$sub->id}}" data-file-name="{{$sub->file_name}}" data-subject="{{$sub->subject}}"
											data-level="{{$sub->level}}" data-unit="{{$sub->unit}}" data-semester="{{$sub->semester}}">تعديل</button>
                                        <form method="post" style="display:inline;" action="{{route('teachers_materials.destroy' , $sub->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class = "btn btn-xs btn-danger" type="submit">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
							</table>
						</div><!-- /.users-control-table -->
					</div><!-- /.panel-body -->
				</div><!-- /.panel-default -->
			</div><!-- /.col-md-8 -->
			<!-- End Show English Matrials -->
			<!-- End Show English Matrials -->
			<!-- End Show English Matrials -->



			<!-- Start Add New Matrial File -->
			<!-- Start Add New Matrial File -->
			<!-- Start Add New Matrial File -->
			<div class="row matrials-toggle matrials-add-new" style="overflow: hidden; width: 90%; margin: auto;">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form method = "post" action = "{{route('teachers_materials.store')}}" enctype="multipart/form-data" method = "post" class="form-container" action = "">
						@csrf
						<legend>اضافة مادة تعليمية</legend>

						<div class="form-group">
							<label>اختار نوع المادة</label>
							<br>
							<div class="special-form">
								<label><input type="radio" required class="vication-radio-selector" name="subject" value="اللغة العربية"> اللغة العربية</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="الدين"> الدين</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="الرياضة"> الرياضة</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="علوم"> علوم</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="دراسات"> دراسات</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="اللغة الانجليزية"> اللغة الانجليزية</label>
							</div><!-- -->
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اختر الصف</label>
							<select class="form-control" name="level">
								<option value = "1">الاول الابتدائي</option>
								<option value = "2">الثاني الابتدائي</option>
								<option value = "3">الثالث الابتدائي</option>
								<option value = "4">الرابع الابتدائي</option>
								<option value = "5">الخامس الابتدائي</option>
								<option value = "6">السادس الابتدائي</option>
							</select>
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اختر الترم</label>
							<select class="form-control" name="semester">
								<option value = "الاول">الترم الاول</option>
								<option value = "الثاني">الترم الثاني</option>
							</select>
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اختر الوحدة</label>
							<select class="form-control" name="unit">
								<option value = "الاولي">الوحدة الاولة</option>
								<option value = "الثانية">الوحدة الثانية</option>
								<option value = "الثالثة">الوحدة الثالثة</option>
								<option value = "الرابعة">الوحدة الرابعة</option>
								<option value = "الخامسة">الوحدة الخامسة</option>
							</select>
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اسم الملف</label>
							<input class="form-control" name="file_name" placeholder="ادخل اسم الملف">
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اختر نوع الملف</label>
							<div class="special-form">
								<label><input class="matrial-file-sorce-type" selected="true" data-target=".matrial-type-file" type="radio" name="file-type"> رفع ملف</label>
								<label><input class="matrial-file-sorce-type" data-target=".matrial-type-link" type="radio" name="file-type"> رابط خارجي</label>

								<input type="text" class="form-control file-source matrial-type-link" name="file_link" placeholder="ادخل رابط الملف">

								<input type="file" class="file-source matrial-type-file" name="file_directory">
							</div><!-- /.special-form -->
						</div><!-- /.form-group -->

						<input type="submit" class="btn btn-default pull-left" value="تسجيل المادة">
						<div class="clearfix"></div>
					</form>
				</div><!-- /.col-md-8 .col-md-offset-2 -->
			</div><!-- /.row .attendance-toggle -->
			<!-- End Add New Matrial File -->
			<!-- End Add New Matrial File -->
			<!-- End Add New Matrial File -->


		</div><!-- /.row -->
		<!-- End Matrials Show -->
		<!-- End Matrials Show -->
		<!-- End Matrials Show -->

		
		
		<!-- Start Matrials Models -->
		<!-- Start Matrials Models -->
		<!-- Start Matrials Models -->
		<div class="modal fade edit-matrial-model" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<form method='post' action="{{route('teachers_materials.update' , 'x')}}" class="form-container-small" enctype="multipart/form-data" >
						@method('put')
						@csrf
						<legend>تعديل مادة</legend>
						<div class="form-group">
							<label>اختار نوع المادة</label>
							<br>
							<div class="special-form">
								<label><input type="radio" required class="vication-radio-selector" name="subject" value="اللغة العربية"> اللغة العربية</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="الدين"> الدين</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="الرياضة"> الرياضة</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="علوم"> علوم</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="دراسات"> دراسات</label>
								<label><input type="radio" class="vication-radio-selector" name="subject" value="اللغة الانجليزية"> اللغة الانجليزية</label>
							</div><!-- -->
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اختر الصف</label>
							<select id="level" class="form-control" name="level">
								<option value="1">الاول الابتدائي</option>
								<option value="2">الثاني الابتدائي</option>
								<option value="3">الثالث الابتدائي</option>
								<option value="4">الرابع الابتدائي</option>
								<option value="5">الخامس الابتدائي</option>
								<option value="6">السادس الابتدائي</option>
							</select>
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اختر الترم</label>
							<select id="semester" class="form-control" name="semester">
								<option value = "الاول">الترم الاول</option>
								<option value = "الثاني">الترم الثاني</option>
							</select>
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اختر الوحدة</label>
							<select id="unit" class="form-control" name="unit">
								<option value = "الاولي">الوحدة الاولة</option>
								<option value = "الثانية">الوحدة الثانية</option>
								<option value = "الثالثة">الوحدة الثالثة</option>
								<option value = "الرابعة">الوحدة الرابعة</option>
								<option value = "الخامسة">الوحدة الخامسة</option>
							</select>
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اسم الملف</label>
							<input id="file-name" class="form-control" name="file_name" placeholder="ادخل اسم الملف">
						</div><!-- /.form-group -->

						<div class="form-group">
							<label>اختر نوع الملف</label>
							<div class="special-form">
								<label><input class="matrial-file-sorce-type" selected="true" data-target=".matrial-type-file" type="radio" name="file-type"> رفع ملف</label>
								<label><input class="matrial-file-sorce-type" data-target=".matrial-type-link" type="radio" name="file-type"> رابط خارجي</label>

								<input type="text" class="form-control file-source matrial-type-link" name="file_link" placeholder="ادخل رابط الملف">

								<input type="file" class="file-source matrial-type-file" name="file_directory">
							</div><!-- /.special-form -->
						</div><!-- /.form-group -->

						<input type="submit" class="btn btn-default pull-left" value="تسجيل المادة">
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div><!-- /.modal -->
		<!-- End Matrials Models -->
		<!-- End Matrials Models -->
		<!-- End Matrials Models -->
		
		
		
	</div><!-- /container-fluid -->
	<!-- End Project Main Page -->
	<!-- End Project Main Page -->
	<!-- End Project Main Page -->
@endsection
