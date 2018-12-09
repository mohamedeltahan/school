@extends("default")

@section("content")
	<!-- Start Project Main Page -->
	<!-- Start Project Main Page -->
	<!-- Start Project Main Page -->
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<nav class="mine-toggle-navbar">
					<ul class="list-unstyled reports-nav-toggle">
						<li class="min-toggle-action mine-nav-active" data-target=".students-reports">تقارير الطلاب</li>
						<li class="min-toggle-action" data-reports-target=".">تقارير 1</li>
						<li class="min-toggle-action" data-reports-target=".">تقارير 1</li>
						<li class="min-toggle-action" data-reports-target=".">تقارير 1</li>
						<li class="min-toggle-action" data-reports-target=".">تقارير 1</li>
						<li class="min-toggle-action" data-reports-target=".">تقارير 1</li>
						<li class="min-toggle-action" data-reports-target=".">تقارير 1</li>
					</ul>
				</nav>
			</div><!-- /.col-md-12 -->
		</div><!-- /row -->


		<!-- Start Reports Panel -->
		<!-- Start Reports Panel -->
		<!-- Start Reports Panel -->
		<div class="row  genaric-toggle-table students-reports">
			<div class="col-md-4 col-xs-12">
				<form class="form-container">
					<legend>لوحة تحكم التقارير</legend>
					<div class="form-group">
						<label>نوع التقرير</label>
						<select class="form-control text-right">
							<option>تقرير عن المتسربين من التعليم</option>
							<option>تقرير عن معدلات الغياب</option>
							<option>تقرير عن عدد الطلاب بالمرحلة التعليمية</option>
						</select>
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>البحث علي مستوي</label>
						<select class="form-control text-right">
							<option>المحافظات</option>
							<option>المراكز</option>
						</select>
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>حدد المستوي</label>
						<select class="form-control text-right">
							<option>اعلي 10</option>
							<option>اعلي 100</option>
							<option>اعلي 1000</option>
						</select>
					</div><!-- /.form-group -->
					<input type="submit" class="btn btn-default pull-left" value="اصدار التقرير">
					<div class="clearfix"></div>
				</form>
			</div><!-- /.col-md-4 -->


			<div class="col-md-8 col-xs-12">
				<div class="row" style="padding: 0 0 20px 0;">
					<div class="col-md-6" style="border:; height: 400px;">
						<canvas id="myChart1" class="thumbnail" width="400" height="410px"></canvas>
					</div>
					<div class="col-md-6" style="border:; height: 400px;">
						<canvas id="myChart2" class="thumbnail" width="400" height="410px"></canvas>
					</div>
				</div><!-- /.row -->

				<div class="row" style="padding: 20px 0;">
					<div class="col-md-6" style="">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title text-right">علي مستوي المحافظات</h3>
							</div><!-- /.panel-headding -->
							<div class="panel-body">
								<div class="users-control-table" style="height:435px;">
									<table class="table table-striped table-hover">
										<tr>
											<th class="text-center">المحافظة</th>
											<th class="text-center">مجموع المتسربين</th>
											<th class="text-center">من الذكور</th>
											<th class="text-center">من الاناث</th>
										</tr>
										<tr class="chart-test" data-administrator="">
											<td class="text-center">الجيزة</td>
											<td class="text-center">10</td>
											<td class="text-center">10</td>
											<td class="text-center">20</td>
										</tr>
                                        @foreach($gov_array as $gov)
										<tr class="chart-test" data-administrator="[
											@foreach($gov['top_centers'] as $center)
												['{{$center->adminstration}}','{{$center->cnt}}'],
                                            @endforeach
											]">
											<td class="text-center">{{$gov["gov_name"]}}</td>
											<td class="text-center">{{intval($gov["male_stats"]) + intval($gov["female_stats"])}}</td>
											<td class="text-center">{{$gov["male_stats"]}}</td>
											<td class="text-center">{{$gov["female_stats"]}}</td>
                                        </tr>
                                        @endforeach
									</table>
								</div><!-- /.users-control-table -->
							</div><!-- /.panel-body -->
						</div><!-- /.panel-default -->
					</div><!-- /.col-md-6 -->

					<div class="col-md-6" style="">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title text-right">علي مستوي المركز</h3>
							</div><!-- /.panel-headding -->
							<div class="panel-body">
								<div class="users-control-table" style="height:435px;">
									<table class="table table-striped table-hover">
										<tr>
											<th class="text-center">المركز</th>
											<th class="text-center">مجموع المتسربين</th>
											<th class="text-center">من الذكور</th>
											<th class="text-center">من الاناث</th>
										</tr>
                                        @foreach($adm_array as $adm)
										<tr class="chart-test" data-schools="[
											@foreach($adm['top_schools'] as $school)
												['{{$school->adminstration}}','{{$school->cnt}}'],
                                            @endforeach
											]">
											<td class="text-center">{{$adm["adm_name"]}}</td>
											<td class="text-center">{{intval($gov["male_stats"]) + intval($gov["female_stats"])}}</td>
											<td class="text-center">{{$adm["male_stats"]}}</td>
											<td class="text-center">{{$adm["female_stats"]}}</td>
										</tr>
										
											@foreach($adm["top_schools"] as $school)
											<!--tr class="chart-test">
												<td></td>
												<td class="text-center">{{$adm["adm_name"]}}</td>
												<td class="text-center">{{$school->adminstration}}</td>
												<td class="text-center">{{$school->cnt}}</td>
												<td class="text-center">--</td>
												<td class="text-center">--</td>
											</tr-->
                                            @endforeach
											
                                        @endforeach
									</table>
								</div><!-- /.users-control-table -->
							</div><!-- /.panel-body -->
						</div><!-- /.panel-default -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.col-md-8 -->
		</div><!-- /.row -->


		<!-- Start Reports Panel -->
		<!-- Start Reports Panel -->
		<!-- Start Reports Panel -->
		<div class="row  genaric-toggle-table teachers-reports">
			<div class="col-md-4 col-xs-12">
				<form class="form-container">
					<legend>لوحة تحكم التقارير</legend>
					<div class="form-group">
						<label>نوع التقرير</label>
						<select class="form-control text-right">
							<option>تقرير عن المتسربين من التعليم</option>
							<option>تقرير عن معدلات الغياب</option>
							<option>تقرير عن عدد الطلاب بالمرحلة التعليمية</option>
						</select>
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>البحث المديرية/المحافظة</label>
						<select class="form-control text-right">
							<option>__</option>
							<option>الجيزة</option>
							<option>الفيوم</option>
							<option>النيا</option>
						</select>
					</div><!-- /.form-group -->
					<div class="form-group">
						<label>البحث بالمركز</label>
						<select class="form-control text-right">
							<option>__</option>
							<option>الجيزة</option>
							<option>الفيوم</option>
							<option>النيا</option>
						</select>
					</div><!-- /.form-group -->
					<input type="submit" class="btn btn-default pull-left" value="اصدار التقرير">
					<div class="clearfix"></div>
				</form>
			</div><!-- /.col-md-4 -->

			<div class="col-md-8 col-xs-12">
				<div class="row" style="padding: 0 0 20px 0;">
					<div class="col-md-6" style="border:; height: 400px;">
						<canvas id="myChart1" class="thumbnail" width="400" height="410px"></canvas>
					</div>
					<div class="col-md-6" style="border:; height: 400px;">
						<canvas id="myChart2" class="thumbnail" width="400" height="410px"></canvas>
					</div>
				</div><!-- /.row -->

				<div class="row" style="padding: 20px 0;">
					<div class="col-md-6" style="">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title text-right">علي مستوي المدارس</h3>
							</div><!-- /.panel-headding -->
							<div class="panel-body">
								<div class="users-control-table" style="height:435px;">
									<table class="table table-striped table-hover">
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">column 1</th>
											<th class="text-center">column 2</th>
											<th class="text-center">column 3</th>
											<th class="text-center">column 4</th>
										</tr>
										<?php for($i=0; $i<20; $i++): ?>
										<tr>
											<td class="text-center">__</td>
											<td class="text-center">__</td>
											<td class="text-center">__</td>
											<td class="text-center">__</td>
											<td class="text-center">__</td>
										</tr>
										<?php endfor; ?>
									</table>
								</div><!-- /.users-control-table -->
							</div><!-- /.panel-body -->
						</div><!-- /.panel-default -->
					</div><!-- /.col-md-6 -->

					<div class="col-md-6" style="">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title text-right">علي مستوي المحافظة</h3>
							</div><!-- /.panel-headding -->
							<div class="panel-body">
								<div class="users-control-table" style="height:435px;">
									<table class="table table-striped table-hover">
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">column 1</th>
											<th class="text-center">column 2</th>
											<th class="text-center">column 3</th>
											<th class="text-center">column 4</th>
										</tr>
										@foreach($gov_array as $gov)
										<tr>
											<td class="text-center"></td>
											<td class="text-center"></td>
											<td class="text-center">__</td>
											<td class="text-center">__</td>
											<td class="text-center">__</td>
										</tr>
										@endforeach
									</table>
								</div><!-- /.users-control-table -->
							</div><!-- /.panel-body -->
						</div><!-- /.panel-default -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.col-md-8 -->
		</div><!-- /.row -->

		<!-- End Reports Panel -->
		<!-- End Reports Panel -->
		<!-- End Reports Panel -->


	<!-- End Project Main Page -->
	<!-- End Project Main Page -->
	<!-- End Project Main Page -->
@endsection
