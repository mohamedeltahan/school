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
      <a href='http://localhost/school/public/teachers/create' class="btn btn-primary pull-left">اضافة معلمة جديدة</a>
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
          <label class="">البحث باسم المعلمة</label>
          <input class="form-control text-right" placeholder="ادخل اسم المعلمة">
        </div><!-- /.col-md-2 -->
        <div class="col-md-2 col-xs-12 pull-right text-right">
          <label class="">البحث بالرقم القومي</label>
          <input class="form-control text-right" placeholder="ادخل الرقم القومي">
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
            <th class="text-right">المدرسة</th>
            <th class="text-right">الجهة التي تدفع الراتب</th>
            <th class="text-right">نوع التعين</th>
            <th class="text-right">المديرية/المحافظة</th>
            <th class="text-right">الادارة/المركز</th>
            <th class="text-right">التقيم</th>
              <th class="text-right">التحكم</th>
          </tr>
          @foreach($teachers as $teacher)
            <tr>
              <td class="text-right"><a href='{{route('teachers.show',$teacher->id)}}'>{{ $teacher->id }}</a></td>
              <td class="text-right"><a href='{{route('teachers.show',$teacher->id)}}'>{{ $teacher->full_name }}</a></td>
              <td class="text-right">{{ $teacher->name }}</td>
              <td class="text-right">@if($teacher->salary_investor_id==null){{
              "وزارة التربية و التعليم"
              }}
              @else
                {{\App\technical_user::where("id",$teacher->salary_investor_id)->first()->full_name}}
             @endif
              </td>
              <td class="text-right">{{ $teacher->job_type }}</td>
              <td class="text-right"> {{ $teacher->governorate}}</td>
              <td class="text-right"> {{ $teacher->Adminstration}}</td>
              <td class="text-right"> {{ $teacher->rate}} </td>
              <td class="text-right">
                <a href="{{route("teachers.edit",$teacher->id)}}" class="btn btn-xs btn-warning">تعديل</a>
                <form style="display:inline;" method="post" action="{{route("teachers.destroy",$teacher->id)}}">
                    @method("delete")
                    @csrf
                    <button class="btn btn-danger btn-xs confirm-delete" data-confirm-name="{{$teacher->name}}" type="submit">حذف</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div><!-- /.panel-body -->
  </div><!-- /.panel-default -->
</div><!-- container-fluid -->
@endsection
