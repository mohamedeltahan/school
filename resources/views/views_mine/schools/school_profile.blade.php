@extends("default")

@section("content")

    <div class="container-fluid">
        <div class="row" dir="rtl">

            <div class="col-md-2">
                <div class="list-group list-group-slide-controller">
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-students-container">الطلاب</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-books-container">المكتبة</a>
                    <a href="#" class="list-group-item text-right"
                       data-list-group-target="school-profile-investors-container">الجهات الداعمة</a>
                    <a href="#" class="list-group-item text-right">التقارير</a>
                    <a href="#" class="list-group-item text-right">الاصول</a>
                    <a href="#" class="list-group-item text-right">الطلبات</a>
                </div>
            </div><!-- /.col-md-2 -->

            <div class="col-md-10">
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
                            <div class="col-md-3 col-xs-12 pull-right">
                                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("اضافة طالب"))

                                    <a class="btn btn-primary btn-block" href="{{route("students.create")}}">اضافة
                                        طالب</a>
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


                <!-- Start School's Book Manager -->
                <div class="customized-table-container school-profile-books-container list-group-slide-target">
                    <legend class="text-right">المكتبة</legend>
                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr class="text-center">
                                <th class="text-center">#</th>
                                <th class="text-center">اسم الكتاب</th>
                                <th class="text-center">نوعية الكتاب</th>
                                <th class="text-center">حالة الاستعارة</th>
                                <th class="text-center">المستعير</th>
                                <th class="text-center">معاد التسليم</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            <?php for($i = 0; $i < 10; $i++):?>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">عالم الحيوان</td>
                                <td class="text-center">قصص اطفال</td>
                                <td class="text-center">في المكتبة</td>
                                <td class="text-center"> __</td>
                                <td class="text-center"> __</td>
                                <td class="">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                            data-target=".borrow-book-model">استعارة
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
                                            data-target=".edit-book-model">تعديل
                                    </button>
                                    <form method="post" action="test.php" style="display:inline">
                                        <input type="hidden" name="book_id" value="<?php echo 1;?>">
                                        <input type="submit" class="btn btn-danger btn-xs confirm-delete"
                                               data-confirm-dname="<?php echo 'عالم الحيوان';?>" value="حذف">
                                    </form>
                                </td>
                            </tr>
                            <?php endfor;?>
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.cusyomized-table-container -->
                <!-- End School's Book Manager -->


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
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
                <!-- End School's Students Manager -->


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
                                        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->user_category=="مدير نظام")

                                            <a href="{{route('technical_users.edit',$support->id)}}" type="button"
                                               class="btn btn-warning btn-xs">تعديل
                                            </a>
                                            <form method="post" action="{{route("delete_support")}}"
                                                  style="display:inline">
                                                @csrf
                                                <input type="hidden" name="support_id" value="{{$support->id}}">
                                                <input type="hidden" name="school_id" value="{{$school->id}}">
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

            </div><!-- /.col-md-10 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="modal fade borrow-book-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="form-container-small">
                    <legend class="text-right">اضافى استعارة</legend>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade edit-book-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="form-container-small">
                    <legend class="text-right">تعديل بيانات كتاب</legend>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade make-request-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="form-container-small">
                    <legend class="text-right">تقديم طلب للجهة الداعمة</legend>
                </form>
            </div>
        </div>
    </div>
@endsection
