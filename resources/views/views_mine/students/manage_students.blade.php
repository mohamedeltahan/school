@extends("default")
<!--

-->
@section("content")
    <div class="container-fluid">

        <!-- Start Add new user button -->

        <div class="row add-account-btn">
            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->can("اضافة طالب"))

                <div class="col-md-12">
                    <a href='{{route("students.create")}}' class="btn btn-primary pull-left">اضافة طالب جديد</a>
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
                            <label class="">البحث بالمحافظة</label>
                            <select class="form-control text-right">
                                <option>الجيزة</option>
                                <option>الفيوم</option>
                                <option>النيا</option>
                            </select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث باسم المدرسة</label>
                            <input class="form-control text-right" placeholder="ادخل اسم المدرسة">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث باسم الطالب</label>
                            <input class="form-control text-right" placeholder="ادخل اسم المعلمة">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث بالرقم التسلسلي</label>
                            <input class="form-control text-right" placeholder="ادخل الرقم التسلسلي">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <input type="submit" class="btn btn-primary" value="ابحث">
                        </div><!-- /.col-md-2 -->
                    </form>
                </div><!-- /.row /.manage-users-search -->


                <div class="users-control-table">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">الاسم</th>
                            <th class="text-center">المرحلة التعليمية</th>
                            <th class="text-center">المديرية</th>
                            <th class="text-center">حالتة الاجتماعية</th>
                            <th class="text-center">الموهبة</th>
                            <th class="text-center">التحكم</th>
                        </tr>
                        @foreach($schools as $school)
                            @foreach($students[$school->id] as $student)

                            <tr>
                                <td class="text-center"><a
                                            href="{{route('students.show',$student["id"])}}">{{ $student["id"] }}</a></td>
                                <td class="text-center"><a
                                            href="{{route('students.show', $student["id"])}}">{{ $student["full_name"] }}</a>
                                </td>
                                <td class="text-center">{{ $student["level"] }}</td>
                                <td class="text-center"> {{$school->Adminstration}} </td>
                                <td class="text-center">{{ $student["social_status"] }}</td>
                                <td class="text-center">{{ $student["talent"] }}</td>
                                <td class="text-center">
                                    @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("تعديل طالب"))

                                        <a href="{{route("students.edit",$student["id"])}}"
                                           class="btn btn-xs btn-warning">تعديل</a>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("حذف طالب"))

                                        <form style="display:inline;" method="post"
                                              action="{{route("students.destroy",$student["id"])}}">
                                            @method("delete")
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
