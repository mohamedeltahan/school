@extends("default")

<!--
    Manage Customized admin accounts::
    This Shows the Root-admin all customized admin in a table
    in each row there is an user with a link to his profile
    the Root-admin can delete, edit, & create a customized admin;
  -->
@section("content")
    <div class="container-fluid">

        <!-- Start Add new user button -->
        <div class="row add-account-btn">
            @if(\Illuminate\Support\Facades\Auth::check() && \App\technical_user::find(\Illuminate\Support\Facades\Auth::user()->user_id)->user_category=="مدير نظام")

                <div class="col-md-12">
                    <a href="{{url('technical_users/create')}}" class="btn btn-primary pull-left">اضافة مستخدم جديد</a>
                </div><!-- /.col-md-12 -->
            @endif
        </div><!-- /.row -->
        <!-- End Add new user button -->

        <div class="panel panel-default">
            <div class="panel-heading speacial-bg">
                <h3 class="panel-title text-right">ادارة حسابات مدراء النظام</h3>
            </div><!-- /.panel-headding -->
            <div class="panel-body">

                <div class="row manage-users-search">
                    <form>
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث بالفئة</label>
                            <select class="form-control text-right">
                                <option>مدير نظام</option>
                                <option>جهة داعمة</option>
                                <option>دعم فني</option>
                            </select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث بأسم المستخدم</label>
                            <input class="form-control text-right" placeholder="ادخل اسم المستخدم او الجهة">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث بألرقم القومي</label>
                            <input class="form-control text-right" placeholder="ادخل الرقم القومي للمستخدم">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث بالرقم التسلسلي </label>
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
                            <th class="text-right">#</th>
                            <th class="text-right">الاسم</th>
                            <th class="text-right">فئة الحساب</th>
                            <th class="text-right">يتبع جهة داعمة</th>
                            <th class="text-right">رقم الهاتف</th>
                            <th class="text-right">البريد الالكتروني</th>
                            <th class="text-right">التحكم</th>
                        </tr>
                        @foreach($technical_users as $user)
                            <tr>
                                <td class="text-right"><a
                                            href='{{route('technical_users.show',$user->id)}}'>{{$user->id}}</a></td>
                                <td class="text-right"><a
                                            href='{{route('technical_users.show',$user->id)}}'>{{$user->full_name}}</a>
                                </td>
                                <td class="text-right">{{$user->user_category}}</td>
                                <td class="text-right">@if($user->user_category=="دعم فني") <a
                                            href="{{route("technical_users.show",(integer)$user->investor_id)}}"> {{$head[$user->id]}}</a>  @endif
                                </td>
                                <td class="text-right">{{$user->phone}}</td>
                                <td class="text-right">{{$user->email}}</td>
                                <td class="text-right">
                                    @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("تعديل مستخدم"))

                                        <a href="{{route('technical_users.edit', $user->id)}}"
                                           class="btn btn-xs btn-warning">تعديل</a>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("حذف مستخدم"))

                                        <form style="display:inline;" method="post"
                                              action="{{route("technical_users.destroy", $user->id)}}">
                                            @method("delete")
                                            @csrf
                                            <button class="btn btn-danger btn-xs confirm-delete"
                                                    data-confirm-name="{{$user->name}}" type="submit">حذف
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div><!-- /.panel-body -->
        </div><!-- /.panel-default -->
    </div><!-- container-fluid -->

@endsection
