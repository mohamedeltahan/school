@extends("default")

  <!--
    Manage Assets::
    This Shows the Inviestor all assetes he owns in a table
    in each row there is an asset with information about the owner,
	the , school that hold hand on the asset and its state (working/broken)
  -->
@section("content")
  <div class="container-fluid">

    <!-- Start Add new user button -->
    <div class="row add-account-btn">

        <div class="col-md-12">
        <a href="{{url('assets/create')}}" class="btn btn-primary pull-left">اضافة اصل جديد</a>
      </div><!-- /.col-md-12 -->

    </div><!-- /.row -->
      @
    <!-- End Add new user button -->

    <div class="panel panel-default">
      <div class="panel-heading speacial-bg">
        <h3 class="panel-title text-right">ادارة الاصول</h3>
      </div><!-- /.panel-headding -->
      <div class="panel-body">

        <div class="row manage-users-search">
          <form>
          <div class="col-md-2 col-xs-12 pull-right text-right">
            <label class="">البحث بالفئة</label>
            <select class="form-control text-right">
              <option>اصول</option>
              <option>مشتريات</option>
              <option>صيانة</option>
            </select>
          </div><!-- /.col-md-2 -->
          <div class="col-md-2 col-xs-12 pull-right text-right">
            <label class="">البحث بأسم الاصل</label>
            <input class="form-control text-right" placeholder="ادخل اسم المستخدم او الجهة">
          </div><!-- /.col-md-2 -->
          <div class="col-md-2 col-xs-12 pull-right text-right">
            <label class="">البحث برقم الاصل</label>
            <input class="form-control text-right" placeholder="ادخل الرقم القومي للمستخدم">
          </div><!-- /.col-md-2 -->
		  <div class="col-md-2 col-xs-12 pull-right text-right">
            <label class="">البحث بالمدرسة </label>
            <input class="form-control text-right" placeholder="ادخل الرقم التسلسلي">
          </div><!-- /.col-md-2 -->
		  <div class="col-md-2 col-xs-12 pull-right text-right">
            <label class="">البحث بالمحافظة </label>
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
	            <th class="text-center">اسم الجهة المانحة</th>
	            <th class="text-center">محافظة</th>
	            <th class="text-center">المدرسة الحاملة للاصل</th>
	            <th class="text-center">نوح الاصل</th>
				<th class="text-center">اسم الاصل</th>
				<th class="text-center">الكمية</th>
				<th class="text-center">حالة الاصل</th>
				<th class="text-center">تاريخ الاستلام</th>
				<th class="text-center">تاريخ انتهاء الصلاحية</th>
	            <th class="text-center">التحكم</th>
            </tr>
			@foreach($assets as $asset  )
			<tr>
				<td class="text-center">{{$count++}}</td>
				<td class="text-center"><a href="{{route("technical_users.show",$supports[$asset->id]->id)}}"> {{$supports[$asset->id]->full_name}} </a></td>
				<td class="text-center">{{$schools[$asset->id]->governorate}}</td>
                <td class="text-center"><a href="{{route("schools.show",$schools[$asset->id]->id)}}">{{$schools[$asset->id]->name}}</a></td>
				<td class="text-center">{{$asset->category}}</td>
				<td class="text-center">{{$asset->name}}</td>
				<td class="text-center">{{$asset->quantity}}</td>
				<td class="text-center">{{$asset->state}}</td>
				<td class="text-center">{{$asset->date_released}}</td>
				<td class="text-danger text-center">10/10/2019</td>
				<td>

                    <a href="{{route("assets.edit",$asset->id)}}"  class="btn btn-warning  btn-xs">تعديل</a>
					<form style="display:inline" action="{{route("assets.destroy",$asset->id)}}" method="post">
                        @csrf
                        @method("DELETE")
						<input type="submit" class="btn btn-danger btn-xs" value="حذف">
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
