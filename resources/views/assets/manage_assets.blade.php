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
        <!-- End Add new user button -->

        <div class="panel panel-default">
            <div class="panel-heading speacial-bg">
                <h3 class="panel-title text-right">ادارة الدعم</h3>
            </div><!-- /.panel-headding -->
            <div class="panel-body">

                <div class="row manage-users-search">
                    <form>
						<div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">المديرية/المحافظة</label>
                            <select class="form-control text-right fast-search-select" data-search-target=".find-asset" data-target-coulmn="asset-governorate">
								<option value="all">الكل</option>
                                <option>الجيزة</option>
                                <option>الفيوم</option>
                                <option>المنيا</option>
                            </select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">الادارة/المركز</label>
                            <select class="form-control text-right fast-search-select" data-search-target=".find-asset" data-target-coulmn="asset-adminstration">
								<option value="all">الكل</option>
                                <option>الجيزة</option>
                                <option>الفيوم</option>
                                <option>المنيا</option>
                            </select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">النوع</label>
                            <select class="form-control text-right fast-search-select" data-search-target=".find-asset" data-target-coulmn="asset-category">
								<option value="all">الكل</option>
                                <option>اصول</option>
                                <option>صيانة</option>
                                <option>طلاب</option>
                            </select>
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث بأسم الاصل</label>
                            <input class="form-control text-right fast-search" data-search-target=".find-asset" data-target-coulmn="asset-name" placeholder="ادخل اسم المستخدم او الجهة">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث برقم الاصل</label>
                            <input class="form-control text-right fast-search" data-search-target=".find-asset" data-target-coulmn="asset-id" placeholder="ادخل رقم الاصل التسلسلي">
                        </div><!-- /.col-md-2 -->
                        <div class="col-md-2 col-xs-12 pull-right text-right">
                            <label class="">البحث باسم المدرسة</label>
                            <input class="form-control text-right fast-search" data-search-target=".find-asset" data-target-coulmn="asset-school" placeholder="ادخل اسم المدرسة">
                        </div><!-- /.col-md-2 -->
                    </form>
                </div><!-- /.row /.manage-users-search -->


                <div class="users-control-table">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th class="text-center">#</th>
                            @if(\App\technical_user::find(\Illuminate\Support\Facades\Auth::user()->user_id)->user_category=="مدير نظام")
                                <th class="text-center">اسم الجهة المانحة</th>
                            @endif
                            <th class="text-center">المديرية/المحافظة</th>
                            <th class="text-center">الادارة/المركز</th>
                            <th class="text-center">المدرسة الحاملة للاصل</th>
                            <th class="text-center">نوح الاصل</th>
                            <th class="text-center">اسم الاصل</th>
                            <th class="text-center">الكمية</th>
                            <th class="text-center">حالة الاصل</th>
                            <th class="text-center">تاريخ الاستلام</th>
                            <th class="text-center">تاريخ انتهاء الصلاحية</th>
                            <th class="text-center">التحكم</th>
                        </tr>
                        @foreach($assets as $asset)
                            <tr>
                                <td class="text-center find-asset"
									data-asset-id="{{$asset->id}}" data-asset-name="{{$asset->name}}"
									data-asset-category="{{$asset->category}}" data-asset-state="{{$asset->state}}" data-asset-school="{{$schools[$asset->id]->name}}"
									data-asset-governorate="{{$schools[$asset->id]->governorate}}" data-asset-adminstration="{{$schools[$asset->id]->Adminstration}}">{{$asset->id}}</td>
                                @if(\App\technical_user::find(\Illuminate\Support\Facades\Auth::user()->user_id)->user_category=="مدير نظام")
                                    <td class="text-center">
										<a href="{{route("technical_users.show",$supports[$asset->id]->id)}}"> {{$supports[$asset->id]->full_name}} </a>
                                    </td> 
								@endif
                                <td class="text-center">{{$schools[$asset->id]->governorate}}</td>
                                <td class="text-center">{{$schools[$asset->id]->Adminstration}}</td>
                                <td class="text-center">
									<a href="{{route('schools.show',$schools[$asset->id]->id)}}">{{$schools[$asset->id]->name}}</a>
                                </td>
                                <td class="text-center">{{$asset->category}}</td>
                                <td class="text-center">{{$asset->name}}</td>
                                <td class="text-center">{{$asset->quantity}}</td>
                                <td class="text-center @if($asset->state == 'هالك') {{'text-danger'}} @elseif($asset->state == 'متوسط') {{'text-warning'}} @else {{'text-success'}} @endif">{{$asset->state}}</td>
                                <td class="text-center text-primary">{{$asset->date_released}}</td>
                                <td class="text-danger text-center">@if($asset->expired_date != '') {{$asset->expired_date}} @else {{'__'}} @endif</td>
                                <td>
                                    <a href="{{route('assets.edit',$asset->id)}}" class="btn btn-warning  btn-xs">تعديل</a>
                                    <form style="display:inline" action="{{route('assets.destroy',$asset->id)}}" method="post">
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
