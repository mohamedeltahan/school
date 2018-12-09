@extends("default")
<!--

-->
@section("content")
    <!--

  Manage Schools profiles::
  This Shows the Root-admin, Customized-admins , and ..
  Technichal-supports (who had a privilege to see Schools on the system) to
  see schools table with detailed info and each row has a link to school profile
  Notice that Technichal-support sees the schools which admin linked to his account
-->
    <div class="container-fluid">

        <!-- Start Add new user button -->
        <div class="row add-account-btn">
            <div class="col-md-12">
				@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->can("اضافة معلمة"))
                    <a href='{{route("teachers.create")}}' class="btn btn-primary pull-left btn-margin">اضافة معلمة جديدة</a>
				@endif
					<a href='{{route("teachers_attendance.index")}}' class="btn btn-primary pull-left btn-margin">ادارة الغياب و الاجازات</a>
			</div><!-- /.col-md-12 -->
			
        </div><!-- /.row -->

        <!-- End Add new user button -->

        <div class="panel panel-default">
            <div class="panel-heading speacial-bg">
                <h3 class="panel-title text-right">ادارة حسابات المعلمات</h3>
            </div><!-- /.panel-headding -->
            <div class="panel-body">

                <div class="row manage-users-search">
                    <form>
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">المديرية/المحافظة</label>
                            <select class="form-control text-right fast-search-select" data-search-target=".find-teacher" data-target-coulmn="school-governorate">
								<option value="all">الكل</option>
                                <option>الجيزة</option>
                                <option>الفيوم</option>
                                <option>المنيا</option>
                            </select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">الادارة/المركز</label>
                            <select class="form-control text-right fast-search-select" data-search-target=".find-teacher" data-target-coulmn="school-adminstration">
								<option value="all">الكل</option>
                                <option>الجيزة</option>
                                <option>الفيوم</option>
                                <option>المنيا</option>
                            </select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label>المؤهل</label>
							<select name="education[]" class="form-control text-right fast-search-select" data-search-target=".find-teacher" data-target-coulmn="teacher-education">
							  <option value="all" class="text-right">الكل</option>
							  <option value="مؤهل عالي" class="text-right">مؤهل عالي</option>
							  <option value="مؤهل متوسط" class="text-right">مؤهل متوسط</option>
							  <option value="مؤهل فوق المتوسط" class="text-right">مؤهل فوق المتوسط</option>
							  <option value="دبلوم" class="text-right">دبلوم</option>
							</select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث باسم المعلمة</label>
                            <input class="form-control text-right fast-search" data-search-target=".find-teacher" data-target-coulmn="teacher-name" placeholder="ادخل اسم المعلمة">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث باسم المدرسة</label>
                            <input class="form-control text-right  fast-search" data-search-target=".find-teacher" data-target-coulmn="teacher-school" placeholder="ادخل اسم المدرسة">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث بالرقم القومي</label>
                            <input class="form-control text-right fast-search" data-search-target=".find-teacher" data-target-coulmn="teacher-ssn" placeholder="ادخل الرقم القومي">
                        </div><!-- /.col-md-2 -->
                    </form>
                </div><!-- /.row /.manage-users-search -->


                <div class="users-control-table">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">الاسم</th>
                            <th class="text-center">المؤهلي</th>
                            <th class="text-center">المدرسة</th>
                            <th class="text-center">الجهة التي تدفع الراتب</th>
                            <th class="text-center">نوع التعين</th>
                            <th class="text-center">المديرية/المحافظة</th>
                            <th class="text-center">الادارة/المركز</th>
                            <th class="text-center">التحكم</th>
                        </tr>
                        @foreach($schools as $school)
                            @foreach($teachers[$school->id] as $teacher)
                                <tr>
                                    <td class="text-center find-teacher"
										data-teacher-name="{{$teacher->full_name}}" data-teacher-school="{{$school->name}}"
										data-school-governorate="{{$school->governorate}}" data-school-adminstration="{{$school->Adminstration}}"
										data-teacher-education="<?php echo explode(':', $teacher->education)[0];?>" data-teacher-ssn="{{$teacher->ssn}}">
										<a href='{{route('teachers.show',$teacher->id)}}'>{{ $teacher->id }}</a>
									</td>
                                    <td class="text-center">
										<a href='{{route('teachers.show',$teacher->id)}}'>{{ $teacher->full_name }}</a>
                                    </td>
                                    <td class="text-center">{{ $teacher->education }}</td>
                                    <td class="text-center">
										<a href="{{route("schools.show",$teacher->school_id)}}">{{ $school->name }}</a>
                                    </td>
                                    <td class="text-center">
									@if($teacher->salary_investor_id==null)
										{{"وزارة التربية و التعليم"}}
									@else
										<a href="{{route("technical_users.show",$teacher->salary_investor_id)}}"> {{\App\technical_user::where("id",$teacher->salary_investor_id)->first()->full_name}}</a>
									@endif
                                    </td>
                                    <td class="text-center">{{$teacher->job_type}}</td>
                                    <td class="text-center">{{$school->governorate}}</td>
                                    <td class="text-center">{{$school->Adminstration}}</td>
                                    <td class="text-center">
                                        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->can("تعديل معلمة"))
                                            <a href="{{route("teachers.edit",$teacher->id)}}" class="btn btn-xs btn-warning">تعديل</a>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->can("حذف معلمة"))
                                            <form style="display:inline;" method="post"
                                                  action="{{route("teachers.destroy",$teacher->id)}}">
                                                @method("delete")
                                                @csrf
                                                <button class="btn btn-danger btn-xs confirm-delete"
                                                        data-confirm-name="{{$teacher->name}}" type="submit">حذف
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div><!-- /.panel-body -->
        </div><!-- /.panel-default -->
    </div><!-- container-fluid -->
@endsection
