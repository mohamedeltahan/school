@extends("default")
  <!--
    Manage Schools profiles::
    This Shows the Root-admin, Customized-admins , and ..
		Technichal-supports (who had a privilege to see Schools on the system) to
		see schools table with detailed info and each row has a link to school profile
		Notice that Technichal-support sees the schools which admin linked to his account
  -->
@section("content")
  <div class="container-fluid">
    <!-- Start Add new user button -->
    <div class="row add-account-btn">
      <div class="col-md-12">
        <a href='http://localhost/school/public/schools/create' class="btn btn-primary pull-left">اضافة مدرسة جديدة</a>
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
    <!-- End Add new user button -->

    <div class="panel panel-default">
      <div class="panel-heading speacial-bg">
        <h3 class="panel-title text-right">ادارة صفحات المدارس</h3>
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
            <label class="">البحث بكود المدرسة</label>
            <input class="form-control text-right" placeholder="ادخل كود المدرسة">
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
      				<th class="text-center">اسم المدرسة</th>
      				<th class="text-center">المديرية/المحافظة</th>
      				<th class="text-center">الادارة/المركز</th>
      				<th class="text-center">التقيم</th>
      				<th class="text-center">نوع المدرسة</th>
                <th class="text-center">التحكم</th>
            </tr>
            @foreach($schools as $school)
              <tr>
				        <td class="text-center"><a href="{{route('schools.show',$school->id)}}">{{$school->id}}</a></td>
                <td class="text-center"><a href='{{route('schools.show',$school->id)}}'>{{$school->name}}</a></td>
                <td class="text-center">{{$school->governorate}}</td>
                <td class="text-center">{{$school->Adminstration}}</td>
                <td class="text-center">{{$school->rate}}</td>
                <td class="text-center">{{$school->type}}</td>
                <td class="text-center">
                  <a href="{{route("schools.edit",$school->id)}}" class="btn btn-xs btn-warning">تعديل</a>
                  <form style="display:inline;" method="post" action="{{route("schools.destroy",$school->id)}}">
                      @method("delete")
                      @csrf
                      <button class="btn btn-danger btn-xs confirm-delete" data-confirm-name="{{$school->name}}" type="submit">حذف</button>
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
