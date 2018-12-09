@extends("default")
			<!--
				#Create new asset page::
				-This page is used to add new asset to the system,
				-This template is used in edit user, by a GET request holding the id,
				then retaning the user related data to edit
			-->

<!-- Start Project Main Page -->
@section("content")
    <div class="container">
        <div class="row text-right">
			<div class="col-md-3"></div><!-- offset -->
            <div class="form-container col-md-6">
                <form method="post" action="{{route('assets.store')}}">
                    @csrf
                    <legend>اضافة دعم جديد</legend>
					<!-- 
						# If the root admin is the adding a new asset;
						Then he needs to select an investors first.
						# Case the inviestor
                    -->
					<div class="form-group">
						@if(\App\technical_user::find(\Illuminate\Support\Facades\Auth::user()->user_id)->user_category=="مدير نظام")
						<label>الجهة الداعمة</label>
						<select class="form-control" name="investor_id">
							@foreach($technical_users as $technical_user)
								<option value="{{$technical_user->id}}">{{$technical_user->full_name}}</option>
							@endforeach
						</select>
							@endif
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>المحافظة</label>
						<select  class="form-control" name="">
							<option>الجيزة</option>
							<option>المنيا</option>
						</select>
					</div><!-- /.form-group -->
					
					<div class="modal-body chosse-school-table">
						<table class="table table-striped  table-condensed">
							<tr>
								<th class="text-right">#</th>
								<th class="text-right">اسم المدرسة</th>
								<th class="text-right">المحافظة</th>
								<th class="text-right"><input type="checkbox" name="foo" id="select-all" data-checkbox-parent="school-lists"></th>
							</tr>
							@foreach($schools as $school)
								<tr>
									<td class="text-right">{{$count++}}</td>
									<td class="text-right">{{$school->name}}</td>
									<td class="text-right">{{$school->governorate}}</td>
									<td class="text-right"><input type="checkbox" name="schools[]" required value="{{$school->id}}" data-checkbox-children="school-lists"></td>

								</tr>
								@endforeach
						</table>
                    </div><!-- /.modal-body -->
					
					
					<!-- START Support Category -->
					<!-- START Support Category -->
					<!-- START Support Category -->
					<div class="form-group asset-category-action">
						<label>النوع</label>
						<select name="category" class="form-control">
							<option value="option1">اصول</option>
							<option value="option2">صيانة</option>
							<option value="option3">طلاب</option>
						</select>
					</div><!-- /.form-group -->
					
					<div class="form-group heading_field asset-category" id="assets-type">
						<label>نوع الاصل</label>
						<select name="sub_category" class="form-control">
							<option>اجهزة كهربائية</option>
							<option>اجهزة الكترونية</option>
							<option>دواليب</option>
							<option>دسكات</option>
							<option>بورد</option>
							<option>انشطة</option>
							<!--option>طلاب</option-->
						</select>
					</div><!-- /.form-group -->
					
					<div class="form-group heading_field asset-category" id="maintenance-type">
						<label>نوع الصيانة</label>
						<select name="sub_category" class="form-control">
							<option>كهرباء</option>
							<option>ارضيات</option>
							<option>ترميم</option>
							<option>دهانات</option>
							<option>نجارة</option>
							<option>سباكة</option>
						</select>
					</div><!-- /.form-group -->
					
					<div class="form-group heading_field asset-category" id="students-support">
						<label>نوع دعم الطلاب</label>
						<select name="sub_category" class="form-control">
							<option>دعم صحي</option>
							<option>دعم غذائي</option>
							<option>دعم مالي</option>
							<option>دعم المتفوقين</option>
						</select>
					</div><!-- /.form-group -->
					<!-- END Support Category -->
					<!-- END Support Category -->
					<!-- END Support Category -->
					
					
					<div class="form-group">
						<label><span class="text-danger">*</span>اسم الدعم</label>
						<input  type="text" class="form-control"  required name="name" placeholder="ادخل اسم الدعم">
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>الكمية</label>
						<input  type="text" class="form-control" name="quantity" placeholder="ادخل الكمية">
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>حالة الاصل</label>
						<select name="state" class="form-control">
							<option>جديد</option>
							<option>متوسط</option>
							<option>__</option>
						</select>
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label><span class="text-danger">*</span> تاريخ الارسال</label>
						<input name="date_released" type="text" required class="form-control birth-date-input-field" placeholder="تاريخ ارسال الدعم">
					</div><!-- /.form-group -->

					<div class="form-group">
						<label>تاريخ الانتهاء الصلاحية</label>
						<input name="expired_date" type="text" class="form-control birth-date-input-field" placeholder="ادخل سنوات العمل">
					</div><!-- /.form-group -->

					<input type="submit" class="btn btn-primary pull-left" value="حفظ بيانات الدعم">
                </form>
            </div><!-- /.form-container -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <!-- End Project Main Page -->
@endsection
