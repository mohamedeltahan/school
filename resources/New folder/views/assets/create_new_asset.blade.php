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
            <div class="form-container col-md-6 col-md-offset-3">
                <form method="post" action="{{route('assets.store')}}">
                    @csrf
                    <legend>اضافة اصل جديد</legend>

					<!-- 
						# If the root admin is the adding a new asset;
						Then he needs to select an investors first.
						# Case the inviestor
                    -->
					<div class="form-group">
						<label>الجهة الداعمة</label>
						<select class="form-control" name="investor_id">
							<option>مصر الخير</option>
							<option>رسالة</option>
						</select>
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>المحافظة</label>
						<select class="form-control" name="investor_id">
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
									<td class="text-right"><input type="checkbox" name="schools[]" value="" data-checkbox-children="school-lists"></td>

								</tr>
							@endfor
						</table>
                    </div><!-- /.modal-body -->
					
					<div class="form-group">
						<label>النوع</label>
						<select class="form-control">
							<option>اصول</option>
							<option>مشتريات</option>
							<option>صيانة</option>
						</select>
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>اسم الاصل</label>
						<input type="text" class="form-control" name="name" placeholder="ادخل اسم الاصل">
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>الكمية</label>
						<input type="text" class="form-control" name="" placeholder="ادخل الكمية">
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>حالة الاصل</label>
						<select class="form-control">
							<option>جديد</option>
							<option>مستعمل</option>
						</select>
					</div><!-- /.form-group -->
					
					<div class="form-group">
						<label>تاريخ الارسال</label>
						<input type="text" class="form-control birth-date-input-field">
					</div><!-- /.form-group -->
					
					<input type="submit" class="btn btn-primary pull-left" value="حفظ بيانات الاصل">
                </form>
            </div><!-- /.form-container -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <!-- End Project Main Page -->
@endsection
