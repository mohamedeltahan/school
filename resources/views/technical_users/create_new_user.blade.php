@extends("default")
<!--
				#Create new user page::
				-This page is used to add new customized users to the system,
				the Root-admin is the only user how can view this page (and customized-admin who had a privilege to see add Users on the system)
				-This template is used in edit user, by a GET request holding the id,
				then retaning the user related data to edit
			-->

<!-- Special class used to view the proper form ".investors-options", ".technichal-support-options" -->

<!-- Start Project Main Page -->
@section("content")
    <div class="container">
        <div class="row text-right">
			<div class="col-md-3"></div><!-- offset don -->
            <div class="form-container col-md-6">
                <form method="post" action="{{ route('technical_users.store') }}">
                    @csrf
                    <legend>اضافى مستخدم جديد</legend>

                    <!-- select the user category -->
                    <div class="form-group text-right">
                        <label>فئة المستخدم</label>
                        <select name="user_category" class="form-control text-right" id="flag-investor">
                            <option class=" text-right" value="مدير نظام" selected="selected">
                                مدير نظام
                            </option>
                            <option value="جهه داعمة" data-school-option="chosse-schools">
                                جهه داعمة
                            </option>
                            <option value=" دعم فني" data-name="investor-client" data-school-option="chosse-schools">
                                دعم فني
                            </option>
                        </select>
                    </div><!-- /.form-group -->
                    <!-- End select user category -->

                    <div class="form-group">
                        <label><span style="color:red">*</span> اسم المستخدم او الهيئة</label>
                        <input name="full_name" type="text" class="form-control text-right" required placeholder="اضف اسم المستخدم او الهيئة">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label><span style="color:red">*</span> الرقم القومي للمستخدم</label>
                        <input name="ssn" type="text" class="form-control text-right"  required placeholder="اضف الرقم القومي للمستخدم">
                    </div><!-- /.form-group -->

                    <!-- /.form-group -->
                    <div class="form-group"><!--  technichal-support-options -->
                        <label><span style="color:red">*</span> رقم الهاتف</label>
                        <input name="phone" type="text" required class="form-control text-right" placeholder="رقم الهاتف">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>البريد الالكتروني</label>
                        <input name="email" type="email" class="form-control text-right" placeholder="ادخل البريد الالكتروني ان وجد">
                    </div><!-- /.form-group -->


					<!-- deit by Dr.Nashwa -->
                    <!-- div class="form-group technichal-support-options">
                        <label>تاريخ الميلاد</label>
                        <input name="birth_date" type="text" class="form-control text-right birth-date-input-field" placeholder="ادخل تاريخ الميلاد">
                    </div> --><!-- /.form-group -->

					<!-- deit by Dr.Nashwa -->
                    <!-- div class="form-group technichal-support-options">
                        <label>الديانة</label>
                        <select name="religion" class="form-control text-right">
                            <option value="مسلم" class="text-right">مسلم</option>
                            <option value="مسيحي" class="text-right">مسيحي</option>
                        </select>
                    </div> -->

                    <div class="form-group technichal-support-options">
                        <label>النوع</label>
                        <select name="sex" class="form-control text-right">
                            <option value="ذكر" class="text-right">ذكر</option>
                            <option value="انثي" class="text-right">انثي</option>
                        </select>
                    </div><!-- /.form-group -->

					<!-- deit by Dr.Nashwa -->
                    <div class="form-group technichal-support-options">
                        <label>المستوي التعليمي</label>
                        <select name="education[]" class="form-control text-right">
                            <option value="مؤهل عالي" class="text-right">مؤهل عالي</option>
                            <option value="مؤهل متوسط" class="text-right">مؤهل متوسط</option>
                            <option value="مؤهل فوق المتوسط" class="text-right">مؤهل فوق المتوسط</option>
                            <option value="دبلوم" class="text-right">دبلوم</option>
                        </select>
                    </div><!-- /.form-group -->

					<!-- deit by Dr.Nashwa -->
                    <div class="form-group technichal-support-options">
                        <label>اسم المؤهل</label>
                        <input name="education[]" type="text" class="form-control text-right" placeholder="ادخل اسم المؤهل">
                    </div><!-- /.form-group -->

					<!-- deit by Dr.Nashwa -->
                    <!-- div class="form-group technichal-support-options">
                        <label>تاريخ التعيين</label>
                        <input name="hiring_date"  class="form-control text-right birth-date-input-field" placeholder=" تاريخ التعيين">
                    </div> --> <!-- /.form-group -->

					<!-- deit by Dr.Nashwa -->
                    <!-- div class="form-group technichal-support-options">
                        <label>نوع التعين</label>
                        <select name="job_type" class="form-control text-right" data-name="investor">
                            <option value="معين">
                                معين
                            </option>
                            <option value="مؤقت">
                                مؤقت
                            </option>
                            <option value="منتدب">
                                منتدب
                            </option>
                        </select>
                    </div> --><!-- /.form-group -->

					<!-- deit by Dr.Nashwa -->
                    <!-- div class="form-group technichal-support-options">
                        <label>الراتب</label>
                        <input name="salary"  class="form-control text-right" placeholder=" الراتب">
                    </div> --> <!-- /.form-group -->

					<!-- deit by Dr.Nashwa -->
                    <!-- div class="form-group technichal-support-options">
                        <label>سنوات الخبرة</label>
                        <input name="experience_years"  class="form-control text-right" placeholder="سنوات الخبرة">
                    </div> --><!-- /.form-group -->

					<!-- deit by Dr.Nashwa -->
                    <!-- div class="form-group">
                        <label>العنوان</label>
                        <textarea name="address" rows="5" class="form-control" style="resize: none;"  placeholder="ادخل العنوان بالتفصيل"></textarea>
                    </div> --> <!-- /.form-group -->

                    <!-- this field is hidden untill the user chosses data-name: investor-clien -->
                    <div class="form-group investors-optional investors-options">
                        <label><span style="color:red">*</span> الجهة الداعمة</label>
                        <select name="investor_id" class="form-control text-right fast-search-select" data-search-target=".schools-container" data-target-coulmn="inverstor" data-target="#schools-container"  data-type="table" data-name="investor">
                            @foreach($supports as $support)
                                <option value="{{$support->id}}">{{$support->full_name}}</option>
                            @endforeach
                        </select>
                    </div><!-- /.form-group -->


                    <!-- Button trigger School modal -->
                    <!--div class="form-group select-schools-option">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-type="table">
                            اختار المدارس
                        </button>
                    </div--><!-- /.form-group -->
					
					<div class="form-group">
                        <label class="text-right"> اختار المدارس</label>
						<!--div class="row">
							<div class="col-md-3">x</div>
							<div class="col-md-3">x</div>
							<div class="col-md-3">x</div>
							<div class="col-md-3">x</div>
						</div --><!-- /.row -->
						<div class=" privliges-table">
                        <table class="table table-striped  table-condensed " id="schools-container">
							<tr>
								<th class="text-right">#</th>
								<th class="text-right">اسم المدرسة</th>
								<th class="text-right">المحافظة</th>
								<th class="text-right">المركز</th>
								<th class="text-right"><input type="checkbox" name="foo" id="select-all" data-checkbox-parent="school-lists"></th>
							</tr>
							@foreach($schools as $school)
							<tr class="onfly">
								<td class="text-right schools-container" data-id="{{$school->id}}" data-name="{{$school->name}}" data-inverstor="{{$school->investor}}"
								data-governorate="{{$school->governorate}}" data-adminstration="{{$school->Adminstration}}">{{$school->id}}</td>
								<td class="text-right">{{$school->name}}</td>
								<td class="text-right">{{$school->governorate}}</td>
								<td class="text-right">{{$school->Adminstration}}</td>
								<td class="text-right"><input type="checkbox" name="schools[]" value="{{$school->id}}" data-checkbox-children="school-lists"></td>
							</tr>
							@endforeach
						</table>
						</div>
                    </div><!-- form-group -->

                    <div class="form-group privliges-table">
                        <label class="text-right"> اختر الصلاحيات</label>
                        <table class="table table-striped table-condensed">
                           @foreach($permissions as $permission)
                            <tr>
                                <td class="text-right">
                                    <input name="permissions[]" value="{{$permission->name}}" type="checkbox">
                                </td>
                                <td class="text-right">
                                    {{$permission->name}}
                                </td>
                            </tr>
                               @endforeach
                        </table>
                    </div><!-- form-group -->


                    <div class="form-group">
                        <label><span style="color:red">*</span> اسم الدخول</label>
                        <input name="account_name" type="text" class="form-control text-right"  required="required" placeholder="اسم الدخول">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label><span style="color:red">*</span> كلمة السر</label>
                        <input name="password" type="password" class="form-control text-right"  required="required" placeholder="كلمة السر">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label><span style="color:red">*</span> اعاد كتابة كلمة السر</label>
                        <input  type="password" class="form-control text-right"  required="required" placeholder="كلمة السر">
                    </div><!-- /.form-group -->

                    <!-- Show School Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-right" id="myModalLabel">مدارس تحت رعاية مصر الخير</h4>
                                </div><!-- /.modal-header -->
                                <div class="modal-body chosse-school-table">
                                    <table class="table table-striped  table-condensed" id="schools-container">
                                        <tr>
                                            <th class="text-right">#</th>
                                            <th class="text-right">اسم المدرسة</th>
                                            <th class="text-right">المحافظة</th>
                                            <th class="text-right"><input type="checkbox" name="foo" id="select-all" data-checkbox-parent="school-lists"></th>
                                        </tr>
										@foreach($schools as $school)
										<tr class="onfly">
											<td class="text-right">$school->id</td>
											<td class="text-right">'+ajaxResult[i]['name']+'</td>
											<td class="text-right">'+ajaxResult[i]['governorate']+'</td>
											<td class="text-right"><input type="checkbox" name="schools[]" value="'+ajaxResult[i]['id']+'" data-checkbox-children="school-lists"></td>
										</tr>
										@endforeach
                                    </table>
                                </div><!-- /.modal-body -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div><!-- /.modal-footer -->
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal fade -->
                    <!-- End Show School Modal -->
                    <input type="submit" class="btn btn-primary" value="حفظ">

                </form>
            </div><!-- /.form-container -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <!-- End Project Main Page -->
@endsection
