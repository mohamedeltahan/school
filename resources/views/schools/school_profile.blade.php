@extends("default")

@section("content")

    <div class="container-fluid">
        <div class="row" dir="rtl">

            <div class="col-md-2 col-xs-12">
                <div class="list-group list-group-slide-controller">
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-books-container">المكتبة</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-students-container">الطلاب</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-attendance-container">الحضور و الغياب</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-matrials-container">المواد التعليمية</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-investors-container">الجهات الداعمة</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-assetes-container">الاصول</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-support-container">الدعم</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-depreciation-container">الاهلاك</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-requests-container">الطلبات</a>
                    <a href="#" class="list-group-item text-right">التقارير</a>
                </div>
            </div><!-- /.col-md-2 -->

            <div class="col-md-10 col-xs-12">
                <!-- Start School Related Info -->
                <!-- Start School Related Info -->
                <!-- Start School Related Info -->
                <div class="panel panel-default profile-info">
                    <div class="panel-heading text-right speacial-bg">
                        <h3 class="panel-title">{{$school->name}}</h3>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5 col-xs-12 pull-right">
                                <table class="table table-striped table-condensed">
                                    <tr>
                                        <td>نوع المدرسة</td>
                                        <td>{{$school->type}}</td>
                                    </tr>
                                    <tr>
                                        <td>تقيم المدرسة</td>
                                        <td>{{$school->rate}}</td>
                                    </tr>
                                    <tr>
                                        <td>المحافظة/المديرية</td>
                                        <td>{{$school->governorate}}</td>
                                    </tr>
                                    <tr>
                                        <td>المركز/الادارة</td>
                                        <td>{{$school->Adminstration}}</td>
                                    </tr>
                                    <tr>
                                        <td>العنوان</td>
                                        <td>
                                            {{$school->address}}
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-4 col-xs-12 pull-right text-right">
                                <p class="col-sm-12 text-right" style="font-size: 1.5em; padding:0;">المعلمات</p>
                                @foreach($teachers as $teacher)
                                    <a href="{{route("teachers.show",$teacher->id)}}"><label>{{$teacher->full_name}}</label></a>
                                    <br>
                                @endforeach
                            </div><!-- /.col-sm-3 -->
                            <div class="col-md-3 col-xs-12 pull-right special-btns">
                                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("اضافة طالب"))
                                    <a class="btn btn-primary btn-block"
                                       href="{{route("addstudentforschool",$school->id)}}">اضافة طالب</a>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("تعديل مدرسة"))
                                    <a href="{{route("schools.edit",$school->id)}}" class="btn btn-warning btn-block"
                                    >تعديل المدرسة</a>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("حذف مدرسة"))
                                    <form method="post" action="{{route("schools.destroy",$school->id)}}">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-danger btn-block confirm-delete" type="submit"> حذف
                                            المدرسة
                                        </button>
                                    </form>
                                @endif
                            </div><!-- /.col-sm-3 -->

                        </div><!-- /.row -->
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
                <!-- End School Related Info -->
                <!-- End School Related Info -->
                <!-- End School Related Info -->


 				<!-- Start School's Book Manager -->
                <!-- Start School's Book Manager -->
                <!-- Start School's Book Manager -->
                <div class="customized-table-container school-profile-books-container list-group-slide-target">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary pull-left" data-toggle="modal"
                              data-target=".add-book-model">اضافة كتاب جديد
                      </button>
                    </div>
                    <legend class="text-right">المكتبة</legend>
                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr class="text-center">
                                <th class="text-center">#</th>
                                <th class="text-center">اسم الكتاب</th>
                                <th class="text-center">نوعية الكتاب</th>
                                <th class="text-center">الموزع</th>
                                <th class="text-center">كود الكتاب</th>
                                <th class="text-center">حالة الاستعارة</th>
                                <th class="text-center">المستعير</th>
                                <th class="text-center">معاد التسليم</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            @foreach($books as $book)
                            <tr>
                                <td class="text-center">{{$book->id}}</td>
                                <td class="text-center">{{$book->name}}</td>
                                <td class="text-center">{{$book->category}}</td>
                                <td class="text-center">{{$book->supplier}}</td>
                                <td class="text-center">{{$book->code}}</td>
                                <td class="text-center">في المكتبة</td>
                                <td class="text-center">@if($book->student_id!=null){{\App\student::find($book->student_id)->full_name}}@endif</td>
                                <td class="text-center"> {{$book->end_date}}</td>
                                <td class="">
									@if($book->student_id==null)
                                    <button type="button" class="btn btn-primary btn-xs  school-book-action" data-toggle="modal"
                                            data-target=".borrow-book-model"
											data-book-id="{{$book->id}}">استعارة
                                    </button>
									@else
									<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
											data-book-id="{{$book->id}}">استلام
                                    </button>
									@endif
                                    <button type="button" class="btn btn-warning btn-xs school-book-action" data-toggle="modal"
											data-code="{{$book->code}}" data-name="{{$book->name}}" data-category="{{$book->category}}" data-supplier="{{$book->supplier}}"
                                            data-target=".edit-book-model" data-book-id={{$book->id}}>تعديل
                                    </button>
                                    <form method="post" action="{{route('books.destroy' , $book->id)}}" style="display:inline">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger btn-xs confirm-delete"
                                               data-confirm-name="{{$book->name}}", value='حذف'>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.cusyomized-table-container -->
                <!-- End School's Book Manager -->
                <!-- End School's Book Manager -->
                <!-- End School's Book Manager -->


                <!-- Start School's Students Manager -->
                <!-- Start School's Students Manager -->
                <!-- Start School's Students Manager -->
                <div class="customized-table-container school-profile-students-container list-group-slide-target">
                    <legend class="text-right">الطلاب</legend>
                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">اسم الطالب</th>
                                <th class="text-center">المرحلة الدراسية</th>
                                <th class="text-center">الموهبة</th>
                                <th class="text-center">الحالة الصحية</th>
                                <th class="text-center">الحالة الاجتماعية</th>
                                <th class="text-center">مجموع ايام الغياب</th>
                                <th class="text-center">متسرب من التعليم</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            @foreach($students as $student)
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center"><a
                                                href="{{route("students.show",$student->id)}}">{{$student->full_name}} </a>
                                    </td>
                                    <td class="text-center">{{$student->level}}</td>
                                    <td class="text-center">{{$student->talent}}</td>
                                    <td class="text-center">{{$student->health_state}}</td>
                                    <td class="text-center">{{$student->social_status}}</td>
                                    <td class="text-center">__</td>
                                    <td class="text-center">__</td>
                                    <td class="text-center">
                                        @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("تعديل طالب"))

                                            <a href="{{route('students.edit',$student->id)}}" type="button"
                                               class="btn btn-warning btn-xs">تعديل
                                            </a>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("حذف طالب"))

                                            <form method="post" action="{{route("students.destroy",$student->id)}}"
                                                  style="display:inline">
                                                @method("delete")
                                                @csrf

                                                <input type="hidden" name="book_id" value="<?php echo 1;?>">
                                                <input type="submit" class="btn btn-danger btn-xs confirm-delete"
                                                       data-confirm-dname="<?php echo 'الطالب محمد احمد';?>"
                                                       value="حذف">
                                            </form>
                                        @endif
										 <a href="" type="button" class="btn btn-danger btn-xs">متسرب جديد</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
                <!-- End School's Students Manager -->
                <!-- End School's Students Manager -->
                <!-- End School's Students Manager -->


                <!-- Start School's Students Attendance -->
                <!-- Start School's Students Attendance -->
                <!-- Start School's Students Attendance -->
                <div class="customized-table-container school-profile-attendance-container list-group-slide-target">
					<div class="btn-group" style="margin-bottom:10px;" role="group" aria-label="...">
					  <button type="button" class="btn btn-default" disabled>ينتهي موع تسجيل الغياب اساعة 4:00 مساء</button>
					  <button type="button" class="btn btn-default btn-toggle-action active" data-target=".students-dialy-attendance">تسجيل الحضور الطلاب</button>
					  <button type="button" class="btn btn-default btn-toggle-action" data-target=".teachers-dialy-attendance">تسجيل الحضور المعلمات</button>
					  <button type="button" class="btn btn-default btn-toggle-action" data-target=".students-attendance-records">ارشيف الغياب</button>
					</div>
					<div class="genaric-toggle-table students-attendance-records">
						<div class="table-container">
							<div class="form-group">
								<label class="btn-margin">سجل الغياب بتاريخ</label>
								<input type="text" class="form-control birth-date-input-field btn-margin" style="width:200px; display:inline-block;" placeholder="حدد تاريخ سجل الحضور">
							</div><!-- /.form-control -->
							<table class="table table-striped text-center">
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">اسم الطالب</th>
									<th class="text-center">الحالة</th>
									<th class="text-center">معدل الغياب</th>
									<th class="text-center">التحكم</th>
								</tr>
								<tr>
									<td>1</td>
									<td>محمد احمد</td>
									<td class="text-success">حاضر</td>
									<td class="text-success">منتظم</td>
									<td>
										<button class="btn btn-warning btn-xs">تسجيل غياب</button>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>محمد احمد</td>
									<td class="text-danger">غائب</td>
									<td class="text-warning">متقطع</td>
									<td>
										<button class="btn btn-primary btn-xs">تسجيل حضور</button>
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td>محمد احمد</td>
									<td class="text-danger">غائب</td>
									<td class="text-danger">متسرب</td>
									<td>
										<button class="btn btn-primary btn-xs">تسجيل حضور</button>
									</td>
								</tr>
							</table>
						</div><!-- /.table-container -->
					</div><!-- /.genaric-container -->

					<div class="genaric-toggle-table students-dialy-attendance" style="display:block;">
						<form action = "{{route('students_attendance.store')}}" method = "post">
                            @csrf
							<div class="table-container">
								<div class="form-group">
									<label class="btn-margin">تسجل الغياب بتاريخ</label>
									<input readonly name = "absent_time" type="text" class="form-control btn-margin text-center" value="{{date('d/m/Y')}}" style="width:200px; display:inline-block;" placeholder="حدد تاريخ سجل الحضور">
                                    <input hidden name = "reason" value = "اجازة بدون اذن">
                                    <input hidden name = "tech" value = "true">
								</div><!-- /.form-control -->
								<table class="table table-striped text-center">
                                    <tr>
										<th class="text-center">#</th>
										<th class="text-center">اسم الطالب</th>
										<th class="text-center">غائب</th>
									</tr>
                                    @foreach($students as $student)
										<tr>
											<td>{{$student->id}}</td>
											<td>{{$student->full_name}}</td>
                                            <input hidden value = "off" name = "{{$student->id}}">
                                            @if(in_array($student->id , $absent_ids))
											<td><input type="checkbox" name="{{$student->id}}" checked></td>
                                            @else
                                            <td><input type="checkbox" name="{{$student->id}}" ></td>
                                            @endif
                                            
										</tr>
                                    @endforeach
								</table>
							</div><!-- /.table-container -->
							<input type="submit" class="btn btn-primary pull-left" style="margin: 20px 0 5px 0;" value="حفظ الغياب">
							<div class="clearfix"></div>
						</form>
					</div><!-- /.genaric-container -->

					<div class="genaric-toggle-table teachers-dialy-attendance">
						<form action = "{{route('teachers_attendance.store')}}" method="post">
                            @csrf
                            <input hidden name = "reason" value = "اجازة عارضة">
                            <input hidden name = "tech" value = "true">
							<div class="table-container">
								<div class="form-group">
									<label class="btn-margin">تسجل الغياب بتاريخ</label>
									<input type="text" class="form-control btn-margin" readonly value="{{date('Y/m/d')}}" name = "absent_time" style="width:200px; display:inline-block;" placeholder="حدد تاريخ سجل الحضور">
								</div><!-- /.form-control -->
								<table class="table table-striped text-center">
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">اسم المعلمة</th>
										<th class="text-center">غائب</th>
									</tr>
                                    @foreach($teachers as $teacher)
										<tr>
											<td>{{$teacher->id}}</td>
											<td>{{$teacher->full_name}}</td>
                                            <input hidden value = "off" name = "{{$teacher->id}}">
                                            @if(in_array($teacher->id , $absent_ids_teachers))
											<td><input type="checkbox" name="{{$teacher->id}}" checked></td>
                                            @else
                                            <td><input type="checkbox" name="{{$teacher->id}}" ></td>
                                            @endif  
										</tr>
                                    @endforeach

								</table>
							</div><!-- /.table-container -->
							<input type="submit" class="btn btn-primary pull-left" style="margin: 20px 0 5px 0;" value="حفظ الغياب">
							<div class="clearfix"></div>
						</form>
					</div><!-- /.genaric-container -->

				</div><!-- /.customized-table-container -->
                <!-- End School's Students Attendance -->
                <!-- End School's Students Attendance -->
                <!-- End School's Students Attendance -->


				<!-- Start School's Matrials -->
				<!-- Start School's Matrials -->
				<!-- Start School's Matrials -->
                <div class="customized-table-container school-profile-matrials-container list-group-slide-target">
					<div class="btn-group" style="margin-bottom:10px;" role="group" aria-label="...">
					  <button type="button" class="btn btn-default" data-toggle="modal" data-target=".add-new-matrial-file">اضافة ملف جديد</button>
					  <button type="button" class="btn btn-default btn-toggle-action" data-target=".matrials-math">رياضة</button>
					  <button type="button" class="btn btn-default btn-toggle-action" data-target=".matrials-scince">علوم</button>
					  <button type="button" class="btn btn-default btn-toggle-action" data-target=".matrials-history">دراسات</button>
					  <button type="button" class="btn btn-default btn-toggle-action" data-target=".matrials-english">اللغة الانجليزية</button>
					  <button type="button" class="btn btn-default btn-toggle-action" data-target=".matrials-religion">دين</button>
					  <button type="button" class="btn btn-default btn-toggle-action active" data-target=".matrials-arabic">عربي</button>
					</div>

					<div class="genaric-toggle-table matrials-arabic"  style="display:block;">
						<legend>ادارة ملفات مادة اللغة العربية</legend>
						<div class="table-container">
							<table class="table table-striped text-center">
								<tr>
									<th class="text-center" class="text-center">#</th class="text-center">
									<th class="text-center">اسم الملف</th class="text-center">
									<th class="text-center">المادة</th class="text-center">
									<th class="text-center">الصف</th class="text-center">
									<th class="text-center">الوحدة</th class="text-center">
									<th class="text-center">اسم المعلمة</th class="text-center">
									<th class="text-center">التحكم</th>
                                    <th></th>
								</tr>
                                @foreach($arabic_admin as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">ادارة الموقع</td>
                                    
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
                                @foreach($arabic as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">{{$sub->full_name}}</td>
                                    
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
						</div><!-- /.table-container -->
					</div><!-- /.genaric-container -->

					<div class="genaric-toggle-table matrials-religion">
						<legend>ادارة ملفات مادة الدين</legend>
						<div class="table-container">
							<table class="table table-striped text-center">
								<tr>
									<th class="text-center" class="text-center">#</th class="text-center">
									<th class="text-center">اسم الملف</th class="text-center">
									<th class="text-center">المادة</th class="text-center">
									<th class="text-center">الصف</th class="text-center">
									<th class="text-center">الوحدة</th class="text-center">
									<th class="text-center">اسم المعلمة</th class="text-center">
									<th class="text-center">التحكم</th>
                                    <th></th>
								</tr>
                                @foreach($religion_admin as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">ادارة الموقع</td>
                                    
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
                                @foreach($religion as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">{{$sub->full_name}}</td>
                                    
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
						</div><!-- /.table-container -->
					</div><!-- /.genaric-container -->
					
					<div class="genaric-toggle-table matrials-english">
						<legend>ادارة ملفات مادة اللغة الانجليزية</legend>
						<div class="table-container">
							<table class="table table-striped text-center">
								<tr>
									<th class="text-center" class="text-center">#</th class="text-center">
									<th class="text-center">اسم الملف</th class="text-center">
									<th class="text-center">المادة</th class="text-center">
									<th class="text-center">الصف</th class="text-center">
									<th class="text-center">الوحدة</th class="text-center">
									<th class="text-center">اسم المعلمة</th class="text-center">
									<th class="text-center">التحكم</th>
                                    <th></th>
								</tr>
                                @foreach($english_admin as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">ادارة الموقع</td>
                                    
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
                                @foreach($english as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">{{$sub->full_name}}</td>
                                     
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
						</div><!-- /.table-container -->
					</div>

					<div class="genaric-toggle-table matrials-history">
						<legend>ادارة ملفات مادة الدراسات</legend>
						<div class="table-container">
							<table class="table table-striped text-center">
								<tr>
									<th class="text-center" class="text-center">#</th class="text-center">
									<th class="text-center">اسم الملف</th class="text-center">
									<th class="text-center">المادة</th class="text-center">
									<th class="text-center">الصف</th class="text-center">
									<th class="text-center">الوحدة</th class="text-center">
									<th class="text-center">اسم المعلمة</th class="text-center">
									<th class="text-center">التحكم</th>
                                    <th></th>
								</tr>
                                @foreach($social_admin as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">ادارة الموقع</td>
                                     
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
                                @foreach($social as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">{{$sub->full_name}}</td>
                                     
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
						</div><!-- /.table-container -->
					</div><!-- /.genaric-container -->

					<div class="genaric-toggle-table matrials-scince">
						<legend>ادارة ملفات مادة العلوم</legend>
						<div class="table-container">
							<table class="table table-striped text-center">
								<tr>
									<th class="text-center" class="text-center">#</th class="text-center">
									<th class="text-center">اسم الملف</th class="text-center">
									<th class="text-center">المادة</th class="text-center">
									<th class="text-center">الصف</th class="text-center">
									<th class="text-center">الوحدة</th class="text-center">
									<th class="text-center">اسم المعلمة</th class="text-center">
									<th class="text-center">التحكم</th>
                                    <th></th>
								</tr>
                                @foreach($science_admin as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">ادارة الموقع</td>
                                     
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
                                @foreach($science as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">ادارة الموقع</td>
                                     
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
						</div><!-- /.table-container -->
                    </div>
					
					<div class="genaric-toggle-table matrials-math">
						<legend>ادارة ملفات مادة الرياضيات</legend>
						<div class="table-container">
							<table class="table table-striped text-center">
								<tr>
									<th class="text-center" class="text-center">#</th class="text-center">
									<th class="text-center">اسم الملف</th class="text-center">
									<th class="text-center">المادة</th class="text-center">
									<th class="text-center">الصف</th class="text-center">
									<th class="text-center">الوحدة</th class="text-center">
									<th class="text-center">اسم المعلمة</th class="text-center">
									<th class="text-center">التحكم</th>
                                    <th></th>
								</tr>
                                @foreach($math_admin as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">ادارة الموقع</td>
                                     
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
                                @foreach($math as $sub)
                                <tr>
                                    <td class = "text-center">{{$sub->id}}</td>
                                    <td class = "text-center">{{$sub->file_name}}</td>
                                    <td class = "text-center">{{$sub->subject}}</td>
                                    <td class = "text-center">{{$sub->level}}</td>
                                    <td class = "text-center">{{$sub->unit}}</td>
                                    <td class = "text-center">{{$sub->full_name}}</td>
                                     
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
						</div>
					</div><!-- /.genaric-container -->

				</div><!-- /.customized-table-container -->
                <!-- End School's Matrials -->
                <!-- End School's Matrials -->
                <!-- End School's Matrials -->


                <!-- Start School's Investor Manager -->
                <!-- Start School's Investor Manager -->
                <!-- Start School's Investor Manager -->
                <!-- Start School's Investor Manager -->
                <!-- Start School's Investor Manager -->
                <div class="customized-table-container school-profile-investors-container list-group-slide-target">
                    <legend>الجهات الداعمة للمدرسة</legend>
                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">اسم الجهة</th>
                                <th class="text-center">تقديم طلب</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            @foreach($supports as $support)
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center"><a
                                                href="{{route("technical_users.show",$support->id)}}">{{$support->full_name}}</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                                data-target=".make-request-model">تقديم طلب
                                        </button>
                                    </td>
                                    <td>

                                        @if(\Illuminate\Support\Facades\Auth::check() &&  \App\technical_user::find(\Illuminate\Support\Facades\Auth::user()->user_id)->user_category=="مدير نظام")

                                            <a href="{{route('technical_users.edit',$support->id)}}" type="button"
                                               class="btn btn-warning btn-xs">تعديل
                                            </a>
                                            <form method="post" action="{{route("supported_schools.destroy",$support->id)}}"
                                                  style="display:inline">

                                                @method("delete")
                                                @csrf

                                                <input type="submit" class="btn btn-danger btn-xs confirm-delete"
                                                       data-confirm-dname="<?php echo 'مصر الخير';?>"
                                                       value="ازالة من قائمة الرعاة">
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
                <!-- End School's Investor Manager -->
                <!-- End School's Investor Manager -->
                <!-- End School's Investor Manager -->


                <!-- Start School's Assetes Manager -->
                <!-- Start School's Assetes Manager -->
                <!-- Start School's Assetes Manager -->
                <div class="customized-table-container school-profile-assetes-container list-group-slide-target">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary pull-left" data-toggle="modal"
                                data-target=".add-asset-model">اضافة اصل جديد
                        </button>
                    </div>
                    <legend>الاصول</legend>
                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">نوع الاصل</th>
                                <th class="text-center">اسم الاصل</th>
                                <th class="text-center">الجهة المانحة</th>
                                <th class="text-center">الكمية</th>
                                <th class="text-center">حالة الاصل</th>
                                <th class="text-center">تاريخ استلامها</th>
                                <th class="text-center">تاريخ انتهاء الصلاحية</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            <?php $count = 1 ?>
                            @foreach($assets as $asset)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$asset->sub_category}}</td>
                                        <td>{{$asset->name}}</td>
                                        <td>{{$asset->investor_name}}</td>
                                        <td>{{$asset->quantity}}</td>
                                        <td class="text-warning">{{$asset->state}}</td>
                                        <td>{{$asset->date_arrival}}</td>
                                        <td> {{$asset->expired_date}} </td>
                                        <td>
                                            <a href="{{route("changestate",$asset->id)}}"
                                               class="btn btn-default btn-xs">اضافة للاهلاك</a>
                                            <button type="button" href="#"
                                                    class="btn url-genaric-target-action btn-warning btn-xs btn-asset-edit-action"
                                                    data-toggle="modal"
                                                    data-target=".edit-asset-model"
                                            data-id="{{$asset->id}}" data-name="{{$asset->name}}" 
                                            data-sub-category="{{$asset->sub_category}}" data-quantity="{{$asset->quantity}}"
                                            data-investor="{{$asset->investor_name}}" data-date-recived="{{$asset->date_arrival}}"
											data-state="{{$asset->state}}"
                                            data-date-expied="{{$asset->expired_date}}">تعديل</button>
                                            <a href="#" class="btn btn-danger btn-xs">حذف</a>
                                        </td>
                                    </tr>
                            @endforeach
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
                <!-- End School's Assetes Manager -->
                <!-- End School's Assetes Manager -->
                <!-- End School's Assetes Manager -->


                <!-- Start School's Support Manager -->
                <!-- Start School's Support Manager -->
                <!-- Start School's Support Manager -->
                <div class="customized-table-container school-profile-support-container list-group-slide-target">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary pull-left" data-toggle="modal"
                                data-target=".add-support-model">ارسال دعم جديد
                        </button>
                    </div>
                    <legend>الدعم</legend>
                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">نوع الدعم</th>
                                <th class="text-center">فئة الدعم</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">الكمية</th>
                                <th class="text-center">الجهة المانحة</th>
                                <th class="text-center">حالة الدعم</th>
                                <th class="text-center">تاريخ الاستلام</th>
                                <th class="text-center">تاريخ انتهاء الصلاحية</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            @foreach($backup as $back)
                                @if($back->investor_name!=null)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$back->category}}</td>
                                        <td>{{$back->sub_category}}</td>
                                        <td>{{$back->name}}</td>
                                        <td>{{$back->quantity}}</td>
                                        <td>{{$back->investor_name}}</td>
                                        <td class="text-warning">{{$back->state}}</td>
                                        <td>{{$back->date_arrival}}</td>
                                        <td> {{$back->expired_date}} </td>
                                        <td>
                                            <a href="{{route("changestate",$back->id)}}" class="btn btn-default btn-xs">اضافة
                                                للاهلاك</a>
                                            <button type="button" href="#"
                                                    class="btn btn-warning url-genaric-target-action btn-xs btn-support-edit-action"
                                                    data-toggle="modal"
                                                    data-target=".edit-support-model"
                                            data-id="{{$back->id}}" data-name="{{$back->name}}" data-category="{{$back->category}}"
                                            data-sub-category="{{$back->sub_category}}" data-quantity="{{$back->quantity}}"
                                            data-investor="{{$back->investor_name}}" data-date-recived="{{$back->date_arrival}}"
											data-state="{{$back->state}}"  data-date-expied="{{$back->expired_date}}">تعديل</button>
                                            <a href="#" class="btn btn-danger btn-xs">حذف</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
                <!-- End School's Support Manager -->
                <!-- End School's Support Manager -->
                <!-- End School's Support Manager -->


                <!-- Start School's Depreciation Manager -->
                <!-- Start School's Depreciation Manager -->
                <!-- Start School's Depreciation Manager -->
                <div class="customized-table-container school-profile-depreciation-container list-group-slide-target">
                    <legend>الاهلاك</legend>
                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">نوع الدعم</th>
                                <th class="text-center">فئة الدعم</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">الكمية</th>
                                <th class="text-center">الجهة المانحة</th>
                                <th class="text-center">حالة الدعم</th>
                                <th class="text-center">تاريخ الاستلام</th>
                                <th class="text-center">تاريخ انتهاء الصلاحية</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            <?php $count = 1 ?>
                            @foreach($backup as $back)
                                @if($back->state=="هالك")

                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$back->category}}</td>
                                        <td>{{$back->sub_category}}</td>
                                        <td>{{$back->name}}</td>

                                        <td>{{$back->quantity}}</td>
                                        <td>{{$back->investor_name}}</td>
                                        <td class="text-warning">{{$back->state}}</td>
                                        <td>{{$back->date_arrival}}</td>
                                        <td> {{$back->expired_date}} </td>
                                        <td>
                                        <a href="#" class="btn btn-warning btn-xs">تعديل</a>
                                        <a href="#" class="btn btn-danger btn-xs">حذف</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
                <!-- End School's Depreciation Manager -->
                <!-- End School's Depreciation Manager -->
                <!-- End School's Depreciation Manager -->


                <!-- Start School's Requests Manager -->
                <!-- Start School's Requests Manager -->
                <!-- Start School's Requests Manager -->
                <div class="customized-table-container school-profile-requests-container list-group-slide-target">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary pull-left" data-toggle="modal"
                                data-target=".make-request-model">ارسال طلب جديد
                        </button>
                    </div>
                    <legend>الطلبات</legend>
                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">نوع الطلب</th>
                                <th class="text-center">عنوان الطلب</th>
                                <th class="text-center">درجة الاهمية</th>
                                <th class="text-center">تاريخ الارسال</th>
                                <th class="text-center">تاريخ البحث</th>
                                <th class="text-center">حالة الطلب</th>
                                <th class="text-center">الجهة الباحثة</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            @foreach($helps as $help)
                                <tr>
                                    <td>1</td>
                                    <td>{{$help->type}}</td>
                                    <td>{{$help->title}}</td>
                                    <td class="text-warning">متوسط الاهمية</td>
                                    <td>{{$help->created_at}}</td>
                                    <td>{{$help->seen_at}}</td>
                                    <td>{{$help->state}}</td>
                                    <td>{{$help->investor_name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs content-request-action"
                                                data-toggle="modal" data-target=".content-request-model"
                                                data-request-content="يوجد نقص بالدسكات و الطلاب تحضر اليوم الدراسي علي الارض"
                                                data-request-title="دسكات جديدة"
                                                data-request-type="تبديل اصل هالك">محتوي الطلب
                                        </button>
                                        <a href="#" class="btn btn-warning btn-xs">تعديل</a>
                                        <a href="#" class="btn btn-danger btn-xs">حذف</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>

                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
                <!-- End School's Requests Manager -->
                <!-- End School's Requests Manager -->
                <!-- End School's Requests Manager -->

            </div><!-- /.col-md-10 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->





<!-- START School Profile Forms Models -->
<!-- START School Profile Forms Models -->
<!-- START School Profile Forms Models -->

	<!-- START Library Forms Models -->
	<!-- START Library Forms Models -->
	<!-- START Library Forms Models -->
    <div class="modal fade add-book-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method ='post' action = "{{route('books.store' , $school->id)}}" class="form-container-small">
                    @csrf
                    <legend class="text-right">اضافة كتاب</legend>
                    <div class="form-group">
                        <input hidden name='school_id' value="{{$school->id}}">
                      <label>اسم الكتاب</label>
                      <input type="text" class="form-control" name="name">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label>نوع الكتاب</label>
                      <input type="text" class="form-control" name="category">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label>كود الكتاب</label>
                      <input type="text" class="form-control" name="code">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label>الموزع</label>
                      <input type="text" class="form-control" name="supplier">
                    </div><!-- /.form-group -->
                    <input type="submit" class="btn btn-primary" value="حفظ الكتاب">
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

    <div class="modal fade borrow-book-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="POST" action="{{route("books.update","x")}}" class="form-container-small">
                    @method("PUT")
                    @csrf
                    <legend class="text-right">اضافة استعارة</legend>

					<div class="form-group">
                      <label>اسم الطالب</label>
                      <select name="student_id" class="form-control">
                        @foreach($students as $student)
                          <option  value="{{$student->id}}">{{ $student->full_name }}</option>
                        @endforeach
                      </select>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label>معاد التسليم</label>
                      <input type="text" class="form-control birth-date-input-field" name="end_date">
                    </div><!-- /.form-group -->
                    <input type="submit" class="btn btn-primary" value="حفظ الكتاب">
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

    <div class="modal fade edit-book-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <form method = 'post' class="form-container-small" action="{{route('books.update' , 'x')}}">
					@method('put')
					@csrf
                    <legend class="text-right">تعديل بيانات كتاب</legend>
                      <label>اسم الكتاب</label>
                      <input type="hidden" class="form-control" name="id" value="1">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name">
					</div><!-- /.form-group -->
                    <div class="form-group">
                      <label>نوع الكتاب</label>
                      <input type="text" class="form-control" name="category">
					</div><!-- /.form-group -->
					<div class="form-group">
                      <label>كود الكتاب</label>
                      <input type="text" class="form-control" name="code">
					</div><!-- /.form-group -->
					<div class="form-group">
                      <label>الموزع</label>
                      <input type="text" class="form-control" name="supplier">
                    </div><!-- /.form-group -->
                    <input type="submit" class="btn btn-primary" value="حفظ الكتاب">
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
	<!-- END Library Forms Models -->
	<!-- END Library Forms Models -->
	<!-- END Library Forms Models -->



	<!-- START Add-New-Matrial-File Form Models -->
	<!-- START Add-New-Matrial-File Form Models -->
	<!-- START Add-New-Matrial-File Form Models -->
    <div class="modal fade add-new-matrial-file" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dm" role="document">
            <div class="modal-content">
               <form enctype="multipart/form-data" method = "post" class="form-container" action = "{{route('teachers_materials.store')}}">
                    @csrf
					<legend>اضافة مادة تعليمية</legend>
                   <input name = "school_id" hidden value = "{{$school->id}}">
					<div class="form-group">
						<label>صاحب الملف</label>
						<select class="form-control" name="teacher_id">
							@foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->full_name}}</option>
                            @endforeach
						</select>
					</div><!-- /.form-group -->

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
							<label><input class="matrial-file-sorce-type" selected data-target=".matrial-type-file" type="radio" name="file-type"> رفع ملف</label>
							<label><input class="matrial-file-sorce-type" data-target=".matrial-type-link" type="radio" name="file-type"> رابط خارجي</label>

							<input type="text" class="form-control file-source matrial-type-link" name="file_link" placeholder="ادخل رابط الملف">

							<input type="file" class="file-source matrial-type-file" name="file_directory">
						</div><!-- /.special-form -->
					</div><!-- /.form-group -->

					<input type="submit" class="btn btn-default pull-left" value="اضافة ملف جديد">
					<div class="clearfix"></div>
				</form>
            </div>
        </div>
    </div><!-- /.modal -->
	<!-- END Add-New-Matrial-File Form Models -->
	<!-- END Add-New-Matrial-File Form Models -->
	<!-- END Add-New-Matrial-File Form Models -->



    <!-- START Assetes Forms Models -->
    <!-- START Assetes Forms Models -->
    <!-- START Assetes Forms Models -->
    <div class="modal fade add-asset-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method='post' action="" class="form-container-small">
                    @csrf
                    <legend class="text-right">اضافة اصل</legend>
                    <div class="form-group">
                        <label>نوع الاصل</label>
                        <select name="" class="form-control">
                            <option>اجهزة كهربائية</option>
                            <option>اجهزة الكترونية</option>
                            <option>دواليب</option>
                            <option>دسكات</option>
                            <option>بورد</option>
                            <option>انشطة</option>
                            <!--option>طلاب</option-->
                        </select>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>اسم الاصل</label>
                        <input type="text" class="form-control" name="" placeholder="ادخل اسم الاصل">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>حالة الاصل</label>
                        <select name="state" class="form-control">
                            <option>جديد</option>
                            <option>متوسط</option>
                            <option>__</option>
                        </select>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>الجهة المانحة</label>
                        <select class="form-control">
                            <option>وزراة التربية و التعليم</option>
                            <option>مجهودات اهلية</option>
                        </select>
                    </div><!-- /.form-group -->
                    <input type="submit" class="btn btn-primary" value="حفظ الاصل">
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade edit-asset-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method='post' action="test/" class="form-container-small">
                    @csrf
                    <legend class="text-right">تعديل الاصل</legend>
                    <input hidden name="schools" value="{{$school->id}}">
                    <input hidden name="investor_id" value="">
                    <input hidden name="category" value="اصول">
                    <div class="form-group">
                        <label>نوع الاصل</label>
                        <select id="category" name="sub_category" class="form-control">
                            <option>اجهزة كهربائية</option>
                            <option>اجهزة الكترونية</option>
                            <option>دواليب</option>
                            <option>دسكات</option>
                            <option>بورد</option>
                            <option>انشطة</option>
                            <!--option>طلاب</option-->
                        </select>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>اسم الاصل</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="ادخل اسم الاصل">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>حالة الاصل</label>
                        <select id="state" name="state" class="form-control">
                            <option>جديد</option>
                            <option>متوسط</option>
                            <option>__</option>
                        </select>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>الجهة المانحة</label>
                        <select name="investor_name" id="investor" class="form-control">
                            <option>وزراة التربية و التعليم</option>
                            <option>مجهودات اهلية</option>
                        </select>
                    </div><!-- /.form-group -->
                    <input type="submit" class="btn btn-primary" value="حفظ الاصل">
                </form>
            </div>
        </div>
    </div>
    <!-- END Assetes Forms Models -->
    <!-- END Assetes Forms Models -->
    <!-- END Assetes Forms Models -->



    <!-- START Support Forms Models -->
    <!-- START Support Forms Models -->
    <!-- START Support Forms Models -->
    <div class="modal fade add-support-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form method='post' action="{{route("assets.store")}}" class="form-container-small">
                    @csrf
                    <legend>اضافة دعم جديد</legend>

                    <!--
                        # If the root admin is the adding a new asset;
                        Then he needs to select an investors first.
                        # Case the inviestor
                    -->
                    <input hidden name="schools[]" value="{{$school->id}}">
                    <div class="form-group">
                        @if(\App\technical_user::find(\Illuminate\Support\Facades\Auth::user()->user_id)->user_category=="مدير نظام")
                            <label>الجهة الداعمة</label>
                            <select class="form-control" name="investor_id">
                                @foreach($technical_users as $technical_user)
                                    <option value="{{$technical_user->id}}">{{$technical_user->full_name}}</option>
                                @endforeach
                            </select>

                        @else

                            <input hidden name="investor_id" value="{{\Illuminate\Support\Facades\Auth::user()->user_id}}" >
                        @endif
                    </div><!-- /.form-group -->

                    <!-- START Support Category -->
                    <!-- START Support Category -->
                    <!-- START Support Category -->
                    <div class="form-group asset-category-action">
                        <label>النوع</label>
                        <select name="category" class="form-control">
                            <option value="option1">اصول</option>
                            <option value="option2">صيانة</option>
                            <option value="option3">طلاب</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group heading_field asset-category" id="assets-type">
                        <label>نوع الاصل</label>
                        <select name="sub_category" class="form-control">
                            <option>اجهزة كهربائية</option>
                            <option>اجهزة الكترونية</option>
                            <option>دواليب</option>
                            <option>دسكات</option>
                            <option>بورد</option>
                            <option>انشطة</option>
                            <!--option>طلاب</option-->
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group heading_field asset-category" id="maintenance-type">
                        <label>نوع الصيانة</label>
                        <select name="sub_category" class="form-control">
                            <option>كهرباء</option>
                            <option>ارضيات</option>
                            <option>ترميم</option>
                            <option>دهانات</option>
                            <option>نجارة</option>
                            <option>سباكة</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group heading_field asset-category" id="students-support">
                        <label>نوع دعم الطلاب</label>
                        <select name="sub_category" class="form-control">
                            <option>دعم صحي</option>
                            <option>دعم غذائي</option>
                            <option>دعم مالي</option>
                            <option>دعم المتفوقين</option>
                        </select>
                    </div><!-- /.form-group -->
                    <!-- END Support Category -->
                    <!-- END Support Category -->
                    <!-- END Support Category -->


                    <div class="form-group">
                        <label><span class="text-danger">*</span>اسم الدعم</label>
                        <input type="text" class="form-control" required name="name" placeholder="ادخل اسم الدعم">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>الكمية</label>
                        <input type="text" class="form-control" name="quantity" placeholder="ادخل الكمية">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>حالة الاصل</label>
                        <select name="state" class="form-control">
                            <option>جديد</option>
                            <option>متوسط</option>
                            <option>__</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label><span class="text-danger">*</span> تاريخ الارسال</label>
                        <input name="date_released" type="text" required class="form-control birth-date-input-field"
                               placeholder="تاريخ ارسال الدعم">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>تاريخ الانتهاء الصلاحية</label>
                        <input name="expired_date" type="text" class="form-control" placeholder="ادخل سنوات العمل">
                    </div><!-- /.form-group -->

                    <input type="submit" class="btn btn-primary" value="حفظ بيانات الدعم">
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade edit-support-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form method='post' action="{{route('assets.update', 'x')}}" class="form-container-small">
                    @csrf
                    <legend>تعديل دعم</legend>
                    <!--
                        # If the root admin is the adding a new asset;
                        Then he needs to select an investors first.
                        # Case the inviestor
                    -->
                    <div class="form-group">
                        <label>الجهة الداعمة</label>
                        <input id="investor" type="text" class="form-control" name="investor_id">
                    </div><!-- /.form-group -->

                    <!-- START Support Category -->
                    <!-- START Support Category -->
                    <!-- START Support Category -->
                    <div class="form-group asset-category-Generic-action">
                        <label>النوع</label>
                        <select id="category" class="form-control">
                            <option value="option1">اصول</option>
                            <option value="option2">صيانة</option>
                            <option value="option3">طلاب</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group heading_field asset-category assets-type" id="">
                        <label>نوع الاصل</label>
                        <select name="" class="form-control">
                            <option>اجهزة كهربائية</option>
                            <option>اجهزة الكترونية</option>
                            <option>دواليب</option>
                            <option>دسكات</option>
                            <option>بورد</option>
                            <option>انشطة</option>
                            <!--option>طلاب</option-->
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group heading_field asset-category maintenance-type" id="">
                        <label>نوع الصيانة</label>
                        <select name="" class="form-control">
                            <option>كهرباء</option>
                            <option>ارضيات</option>
                            <option>ترميم</option>
                            <option>دهانات</option>
                            <option>نجارة</option>
                            <option>سباكة</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group heading_field asset-category students-support" id="">
                        <label>نوع دعم الطلاب</label>
                        <select name="" class="form-control">
                            <option>دعم صحي</option>
                            <option>دعم غذائي</option>
                            <option>دعم مالي</option>
                            <option>دعم المتفوقين</option>
                        </select>
                    </div><!-- /.form-group -->
                    <!-- END Support Category -->
                    <!-- END Support Category -->
                    <!-- END Support Category -->


                    <div class="form-group">
                        <label><span class="text-danger">*</span>اسم الدعم</label>
                        <input id="name" type="text" class="form-control" required name="name" placeholder="ادخل اسم الدعم">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>الكمية</label>
                        <input id="quantity" type="text" class="form-control" name="quantity" placeholder="ادخل الكمية">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>حالة الاصل</label>
                        <select id="state" name="state" class="form-control">
                            <option>جديد</option>
                            <option>متوسط</option>
                            <option>__</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label><span class="text-danger">*</span> تاريخ الارسال</label>
                        <input id="date-recived" name="date_released" type="text" required class="form-control birth-date-input-field"
                               placeholder="تاريخ ارسال الدعم">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>تاريخ الانتهاء الصلاحية</label>
                        <input id="date-expied" name="expired_date" type="text" class="form-control" placeholder="ادخل سنوات العمل">
                    </div><!-- /.form-group -->

                    <input type="submit" class="btn btn-primary" value="حفظ بيانات الدعم">
                </form>
            </div>
        </div>
    </div>
    <!-- END Support Forms Models -->
    <!-- END Support Forms Models -->
    <!-- END Support Forms Models -->



    <!-- START Request Forms Models -->
    <!-- START Request Forms Models -->
    <!-- START Request Forms Models -->
    <div class="modal fade make-request-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="post" action="{{route("help.store")}}" class="form-container-small">
                    @csrf
                    <legend class="text-right">تقديم طلب للجهة الداعمة</legend>
                    <div class="form-group">
                        <input hidden name="school_id" value="{{$school->id}}">
                        <label>نوع الطلب</label>
                        <select name="type" class="form-control">
                            <option>تبديل اصل هالك</option>
                            <option>طلب صيانة</option>
                            <option>شكوي</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>عنوان الطلب</label>
                        <input name="title" class="form-control" style="resize:disable" placeholder="ادخل عنوان الطلب">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>محتوي الطلب</label>
                        <textarea name="content" class="form-control" style="resize:disable"
                                  placeholder="ادخل محتوي الطلب"></textarea>
                    </div><!-- /.form-group -->
                    <input type="submit" class="btn btn-primary" value="ارسال الطلب">
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade content-request-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="form-container-small">
                    <legend class="text-right">محتوي الطلب</legend>
                    <div class="form-group">
                        <label>نوع الطلب</label>
                        <input class="form-control type" disabled style="resize:disable" placeholder="....">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>عنوان الطلب</label>
                        <input class="form-control title" disabled style="resize:disable" placeholder="....">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>محتوي الطلب</label>
                        <textarea class="form-control" disabled style="resize:disable" placeholder="...."></textarea>
                    </div><!-- /.form-group -->
                </form>
            </div>
        </div>
    </div>
    <!-- END Request Forms Models -->
    <!-- END Request Forms Models -->
    <!-- END Request Forms Models -->



    <!-- START Request Forms Models -->
    <!-- START Request Forms Models -->
    <!-- START Request Forms Models -->
    <div class="modal fade make--model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="form-container-small">
                    <legend class="text-right">تقديم طلب للجهة الداعمة</legend>
                </form>
            </div>
        </div>
    </div>
    <!-- END Request Forms Models -->
    <!-- END Request Forms Models -->
    <!-- END Request Forms Models -->

	
	<!-- Start Matrials Models -->
	<!-- Start Matrials Models -->
	<!-- Start Matrials Models -->
	<div class="modal fade edit-matrial-model" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<form method='post' action="{{route('teachers_materials.update' , 'x')}}" class="form-container-small">
					@method('put')
					@csrf
					<legend>تعديل مادة</legend>
					<div class="form-group">
						<label>اختار نوع المادة</label>
						<br>
                        <input hidden name = "school_id" value = "{{$school->id}}">
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


<!-- END School Profile Forms Models -->
<!-- END School Profile Forms Models -->
<!-- END School Profile Forms Models -->

@endsection
