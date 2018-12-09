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
					  <a href="#" class="list-group-item text-right" data-list-group-target="user-profile--container">الصلاحيات</a>
					  <a href="#" class="list-group-item text-right" data-list-group-target="user-profile--container">التقارير</a>
					  <a href="#" class="list-group-item text-right" data-list-group-target="user-profile-schools-container">المدارس</a>
					  <a href="#" class="list-group-item text-right" data-list-group-target="user-profile--container">الاصول</a>
					  <a href="#" class="list-group-item text-right" data-list-group-target="user-profile--container">طلبات</a>
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
									<th class="text-right">{{$technical_user->investor_name}}</th>
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
					
					
					<!-- Start Investor's Schools Manager -->
					<div class="customized-table-container user-profile-schools-container list-group-slide-target">
						<legend>الجهات الداعمة للمدرسة</legend>
						
						
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
								<?php for($i=0; $i<10; $i++):?>
									<tr>
										<td class="text-center">1</td>
										<td class="text-center"><a href="school_profile.php">ام الابطال</a></td>
										<td class="text-center">جيد</td>
										<td class="text-center">الجيزة</td>
										<td class="text-center">العمرانية</td>
										<td>
											<!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".edit-book-model">التعديل</button> -->
											<form method="post" action="test.php" style="display:inline">
												<input type="hidden" name="book_id" value="<?php echo 1;?>">
												<input type="submit" class="btn btn-danger btn-xs confirm-delete" data-confirm-dname="<?php echo 'مصر الخير';?>" value="ازالة من قائمة الدعم">
											</form>
										</td>
									</tr>
								<?php endfor;?>
							</table>
						</div><!-- /.table-container -->
					</div><!-- /.customized-table-container -->
				<!-- End School's Investor Manager -->
					
				</div><!-- /.col-md-10 -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		
		
@endsection