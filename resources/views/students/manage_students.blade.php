@extends("default")
<!--

-->
@section("content")
    <div class="container-fluid">

        <!-- Start Add new user button -->

        <div class="row add-account-btn">
            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->can("اضافة طالب"))

                <div class="col-md-12">
                    <a href="{{route('students.create')}}" class="btn btn-primary pull-left btn-margin">اضافة طالب جديد</a>
                    <a href="{{url('students_attendance')}}" class="btn btn-primary pull-left btn-margin">ادارة الغياب و الاجازات</a>
                </div><!-- /.col-md-12 -->@endif
        </div><!-- /.row -->

        <!-- End Add new user button -->

        <div class="panel panel-default">
            <div class="panel-heading speacial-bg">
                <h3 class="panel-title text-right">ادارة حسابات الطلاب</h3>
            </div><!-- /.panel-headding -->
            <div class="panel-body">

                <div class="row manage-users-search">
                    <form>
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">المديرية/المحافظة</label>
                            <select class="form-control text-right fast-search-select" data-search-target=".find-student" data-target-coulmn="student-governorate">
								<option value="all">الكل</option>
                                <option>الجيزة</option>
                                <option>الفيوم</option>
                                <option>المنيا</option>
                            </select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">الادارة/المركز</label>
                            <select class="form-control text-right fast-search-select" data-search-target=".find-student" data-target-coulmn="student-adminstration">
								<option value="all">الكل</option>
                                <option>الجيزة</option>
                                <option>الفيوم</option>
                                <option>المنيا</option>
                            </select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث باسم الطالب</label>
                            <input class="form-control text-right fast-search" data-search-target=".find-student" data-target-coulmn="student-name" placeholder="ادخل اسم الطالب">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث باسم المدرسة</label>
                            <input class="form-control text-right fast-search" data-search-target=".find-student" data-target-coulmn="student-school" placeholder="ادخل اسم المدرسة">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث برقم شهادة الميلاد</label>
                            <input class="form-control text-right fast-search" data-search-target=".find-student" data-target-coulmn="student-ssn" placeholder="ادخل الرقم التسلسلي">
                        </div><!-- /.col-md-2 -->
                    </form>
                </div><!-- /.row /.manage-users-search -->


                <div class="users-control-table">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">الاسم</th>
                            <th class="text-center">المرحلة التعليمية</th>
                            <th class="text-center">اسم المدرسة</th>
                            <th class="text-center">الموهبة</th>
                            <th class="text-center">الحالة الصحية</th>
                            <th class="text-center">المديرية/المحافظة</th>
                            <th class="text-center">الادارة/المركز</th>
                            <th class="text-center">المجتمع</th>
                            <th class="text-center">التحكم</th>
                        </tr>
                        @foreach($schools as $school)
                            @foreach($students[$school->id] as $student)
                                <tr>
                                    <td class="text-center find-student"
										data-student-id="{{$student['id']}}" data-student-ssn="{{$student['ssn']}}"
										data-student-name="{{$student['full_name']}}" data-student-school="{{$school->name}}"
										data-student-governorate="{{$school->governorate}}" data-student-adminstration="{{$school->Adminstration}}">
										<a href="{{route('students.show',$student['id'])}}">{{ $student['id'] }}</a>
									</td>
                                    <td class="text-center">
										<a href="{{route('students.show', $student['id'])}}">{{ $student['full_name'] }}</a>
                                    </td>
                                    <td class="text-center">{{ $student["level"] }}</td>
                                    <td class="text-center"><a href="{{route('schools.show', $school->id)}}">{{$school->name}}</a></td>
                                    
                                    <td class="text-center">{{ $student['health_state'] }}</td>
                                    <td class="text-center">{{ $student['talent'] }}</td>
									<td class="text-center"> {{$school->governorate}} </td>
                                    <td class="text-center"> {{$school->Adminstration}} </td>
                                    <td class="text-center"> {{$student['society']}} </td>
                                    <td class="text-center">
                                        @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can('تعديل طالب'))
                                            <a href="{{route('students.edit',$student['id'])}}" class="btn btn-xs btn-warning">تعديل</a>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can('حذف طالب'))
                                            <form style="display:inline;" method="post"
                                                  action="{{route('students.destroy',$student['id'])}}">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-xs confirm-delete"
                                                        data-confirm-name="{{$student["full_name"]}}" type="submit">حذف
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
