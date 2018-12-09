@extends("default")



<!--
			# The user profile contain information about the user, school under his care
			# The user profile 
		-->
@section("content")
    <div class="container-fluid">
        <div class="row" dir="rtl">
            <div class="col-md-2">
                <div class="list-group list-group-slide-controller">
                    <a href="#" class="list-group-item text-right" data-list-group-target="user-profile-privligies-container">الصلاحيات</a>
                    <a href="#" class="list-group-item text-right" data-list-group-target="user-profile--container">التقارير</a>
                    <a href="#" class="list-group-item text-right" data-list-group-target="user-profile-schools-container">المدارس</a>
                    <a href="#" class="list-group-item text-right" data-list-group-target="user-profile-support-container">الدعم</a>
                    <a href="#" class="list-group-item text-right" data-list-group-target="user-profile-requests-container">طلبات</a>
                </div>
            </div><!-- /.col-md-2 -->

            <div class="col-md-10">

                <!-- Start Investor Related Info -->
                <div class="panel panel-default ">
                    <div class="panel-heading speacial-bg">
                        <h3 class="panel-title">حساب {{$technical_user->full_name}}</h3>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="table table-striped table-condensed technichal-info-table">
                            <tr>
                                <th class="text-right">اسم الجهة/المستخدم</th>
                                <th class="text-right">{{$technical_user->full_name}}</th>
                            </tr>
                            <tr>
                                <th class="text-right">فئة الحساب</th>
                                <th class="text-right">{{$technical_user->user_category}}</th>
                            </tr>
                            <tr>
                                <th class="text-right">يتبع جهة</th>

                                <th class="text-right"><a
                                            href="{{route("technical_users.show",(integer)$technical_user->investor_id)}}"> {{$head}}</a>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-right">رقم الهاتف</th>
                                <th class="text-right">{{$technical_user->phone}}</th>
                            </tr>
                            <tr>
                                <th class="text-right">البريد الالكتروني</th>
                                <th class="text-right">{{$technical_user->email}}</th>
                            </tr>
                        </table>
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
                <!-- Start Investor Related Info -->

				
				
				<!-- Start Investor's privligies -->
				    <div class="customized-table-container user-profile-privligies-container list-group-slide-target">
                    <legend>صلاحيات المستخدم</legend>

                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الصلاحية</th>
                            </tr>
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
				<!-- End Investor's privligies -->
				

				
                <!-- Start Investor's Schools Manager -->
                <div class="customized-table-container user-profile-schools-container list-group-slide-target">
                    <legend>المدارس تحت الرعاية</legend>


                    <!-- Start investor's profile school search -->
                    <!-- this part works using Ajax -->
                    <div class="fast-search-container">
                        <form class="form user-profile-search">
                            <div class="form-group col-md-3 col-xs-12 pull-right">
                                <label>البحث بفئة</label>
                                <select name="" class="form-control user-profile-search-select">
                                    <option value="all" select="select">الكل</option>
                                    <option value="governorate">الادارة/المحافظة</option>
                                    <option value="rate">التقيم</option>
                                </select>
                            </div><!-- /.form-group -->

                            <div class="form-group  col-md-3 col-xs-12 pull-right user-profile-search-box">
                                <label></label>
                                <input type="text" class="form-control">
                            </div><!-- /.form-group -->
                            <div class="form-group  col-md-3 col-xs-12 pull-right submit-btn">
                                <input type="submit" class="btn btn-primary btn-sm" value="بحث">
                            </div><!-- /.form-group -->
                        </form>
                    </div><!-- /.fast-search-container -->
                    <!-- End investor's profile school search -->


                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">اسم المدرسة</th>
                                <th class="text-center">التقيم</th>
                                <th class="text-center">المديرية/المحافظة</th>
                                <th class="text-center">الادارة/المركز</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            @foreach($schools as $school)
                                <tr>
                                    <td class="text-center">{{$count++}}</td>
                                    <td class="text-center"><a
                                                href="{{route("schools.show",$school->school_id)}}">{{$school->name}}</a>
                                    </td>
                                    <td class="text-center">{{$school->rate}}</td>
                                    <td class="text-center">{{$school->governorate}}</td>
                                    <td class="text-center">{{$school->Adminstration}}</td>
                                    <td>
                                    @if(\Illuminate\Support\Facades\Auth::check() && \App\technical_user::find(\Illuminate\Support\Facades\Auth::user()->user_id)->user_category!="دعم فني")


                                        <!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".edit-book-model">التعديل</button> -->
                                            <form method="post"
                                                  action="{{route("supported_schools.destroy",$school->id)}}"
                                                  style="display:inline">

                                                @method("delete")
                                                @csrf
                                                <input type="hidden" name="book_id" value="<?php echo 1;?>">
                                                <input type="submit" class="btn btn-danger btn-xs confirm-delete"
                                                       data-confirm-dname="<?php echo 'مصر الخير';?>"
                                                       value="ازالة من قائمة الدعم">
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
                <!-- End School's Investor Manager -->

				
				
				<!-- Start Investor's privligies -->
				<div class="customized-table-container user-profile-support-container list-group-slide-target">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary pull-left" data-toggle="modal"
                              data-target=".add-support-model">ارسال دعم جديد
                      </button>
                    </div>
                    <legend>الدعم المقدم</legend>
                    <div class="table-container">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">نوع الدعم</th>
                                <th class="text-center">فئة الدعم</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">الكمية</th>
                                <th class="text-center">المدرسة</th>
                                <th class="text-center">المديرية/المحافظة</th>
                                <th class="text-center">حالة الدعم</th>
                                <th class="text-center">تاريخ الاستلام</th>
                                <th class="text-center">تاريخ انتهاء الصلاحية</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            <?php $count=1 ?>
                            @foreach($assets as $asset)

                            <tr>
								<td>{{$count++}}</td>
								<td>{{$asset->category}}</td>
								<td>{{$asset->sub_category}}</td>
								<td>{{$asset->name}}</td>
								<td>{{$asset->quantity}}</td>
								<td>{{$schools_take_asset[$asset->id]->name}}</td>
								<td>{{$schools_take_asset[$asset->id]->governorate}}</td>
								<td class="text-warning">{{$asset->state}}</td>
								<td>{{$asset->date_arrival}}</td>
								<td> {{$asset->expired_date}} </td>
								<td>
									<a href="{{route("changestate",$asset->id)}}" class="btn btn-default btn-xs">اضافة للاهلاك</a>
									<button type="button" href="#" class="btn btn-warning btn-xs btn-support-edit-action" data-toggle="modal"
										data-target=".add-support-model""edit-support-model"
										data-id="1" data-category="اصول" data-type="اجهزة الكترونية" data-name="تابلت"
										data-quantity="20" date-investor="مصر الخير" data-date-recived="10/10/2015" data-date-expied="2018">تعديل</button>
									<a href="#" class="btn btn-danger btn-xs">حذف</a>
								</td>
							</tr>
                            @endforeach

                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
				<!-- End Investor's privligies -->
				
				
				
				<!-- Start School's Requests Manager -->
				<!-- Start School's Requests Manager -->
				<!-- Start School's Requests Manager -->
                <div class="customized-table-container user-profile-requests-container list-group-slide-target">
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
                                <th class="text-center">المدرسة</th>
                                <th class="text-center">التحكم</th>
                            </tr>
							<tr>
                                @foreach( $helps as $h)
                                    @foreach($h as $help)
                                <td>1</td>
                                <td>{{$help->type}}</td>
                                <td>{{$help->title}}</td>
                                <td class="text-warning">متوسط الاهمية</td>
                                <td>{{$help->created_at}}</td>
                                <td>{{$help->seen_at}}</td>
                                <td>{{$help->state}}</td>
                                <td>{{\App\school::where("id", $help->school_id)->first()->name}}</td>
								<td>
									<button type="button" class="btn btn-primary btn-xs content-request-action" 
										data-toggle="modal" data-target=".content-request-model"
										data-request-content="يوجد نقص بالدسكات و الطلاب تحضر اليوم الدراسي علي الارض"
										data-request-title="دسكات جديدة"
										data-request-type="تبديل اصل هالك">محتوي الطلب</button>
										<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
											data-target=".accept-request-model">استجابة</button>
									<a href="#" class="btn btn-danger btn-xs">حذف</a>
								</td>
							</tr>
                            @endforeach
							@endforeach
                        </table>
                    </div><!-- /.table-container -->
                </div><!-- /.customized-table-container -->
                <!-- End School's Requests Manager -->
				<!-- End School's Requests Manager -->
				<!-- End School's Requests Manager -->
				
            </div><!-- /.col-md-10 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->


<!-- Start User Profile Forms Models -->	
<!-- Start User Profile Forms Models -->	
<!-- Start User Profile Forms Models -->	


	<!-- START Request Forms Models -->
	<!-- START Request Forms Models -->
	<!-- START Request Forms Models -->
    <div class="modal fade accept-request-model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="form-container-small">
                    <legend class="text-right">قبول الطلب</legend>
					<div class="form-group">
						<label>نوع الطلب</label>
						<select class="form-control">
							<option>جاري البحث</option>
							<option>في الارسال</option>
							<option>مرفوض</option>
						</select>
					</div><!-- /.form-group -->
					<input type="submit" class="btn btn-primary" value="حفظ">
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

	
	
	
<!-- END User Profile Forms Models -->
<!-- END User Profile Forms Models -->
<!-- END User Profile Forms Models -->
	
	
@endsection