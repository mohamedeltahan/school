@extends("default")
<!--
				#Create new user page::
				-This page is used to add new customized users to the system,
				the Root-admin is the only user how can view this page (and customized-admin who had a privilege to see add Users on the system)
				-This template is used in edit user, by a GET request holding the id,
				then retaning the user related data to edit
			-->

<!-- Start Project Main Page -->
@section("content")
    <div class="container">
        <div class="row text-right">
            <div class="form-container col-md-6 col-md-offset-3">
                <form method="post" action="{{route("technical_users.store")}}">
                    @csrf
                    <legend>اضافى مستخدم جديد</legend>

                    <!-- select the user category -->
                    <div class="form-group text-right">
                        <label><span style="color:red">*</span> فئة المستخدم</label>
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
                        <input name="full_name" type="text" class="form-control text-right" required="required" placeholder="اضف اسم المستخدم او الهيئة">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label><span style="color:red">*</span> الرقم القومي للمستخدم</label>
                        <input name="ssn" type="text" class="form-control text-right"  placeholder="اضف الرقم القومي للمستخدم">
                    </div>
                    <div class="form-group technichal-support-options">
                        <label><span style="color:red">*</span> تاريخ الميلاد</label>
                        <input name="birth_date" type="text" class="form-control text-right birth-date-input-field"  placeholder="ادخل تاريخ الميلاد">
                    </div><!-- /.form-group -->
                    <div class="form-group technichal-support-options">
                        <label><span style="color:red">*</span> الديانة</label>
                        <select name="religion" class="form-control text-right">
                            <option value="مسلمة" class="text-right">مسلمة</option>
                            <option value="مسيحية" class="text-right">مسيحية</option>
                        </select>
                    </div><!-- /.form-group -->
                    <div class="form-group technichal-support-options">
                        <label>المستوي التعليمي</label>
                        <select name="education" class="form-control text-right">
                            <option value="شهادة الثانوية" class="text-right">شهادة الثانوية</option>
                            <option value="مؤهل عالي" class="text-right">مؤهل عالي</option>
                            <option value="مؤهل متوسط" class="text-right">مؤهل متوسط</option>
                            <option value="مؤهل فوق المتوسط" class="text-right">مؤهل فوق المتوسط</option>
                            <option value="دبلوم" class="text-right">دبلوم</option>
                        </select>
                    </div><!-- /.form-group -->
                    <div class="form-group technichal-support-options">
                        <label>الحالة الاجتماعية</label>
                        <select name="social_status " class="form-control text-right">
                            <option value="غير متزوج" class="text-right">غير متزوج</option>
                            <option value="متزوج" class="text-right">متزوج</option>
                        </select>
                    </div><!-- /.form-group -->
                    <div class="form-group technichal-support-options">
                        <label><span style="color:red">*</span> رقم الهاتف</label>
                        <input name="phone" type="text" class="form-control text-right placeholder= رقم الهاتف">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label> البريد الالكتروني</label>
                        <input name="email" type="email" class="form-control text-right" placeholder="ادخل البريد الالكتروني ان وجد">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label><span style="color:red">*</span> العنوان</label>
                        <textarea name="address" rows="5" class="form-control" style="resize: none;"  placeholder="ادخل العنوان بالتفصيل"></textarea>
                    </div><!-- /.form-group -->

                    <!-- this field is hidden untill the user chosses data-name: investor-clien -->
                    <div class="form-group investors-optional investors-options">
                        <label><span style="color:red">*</span> الجهة الداعمة</label>
                        <select name="investor_name" class="form-control text-right" data-name="investor">
                            <option value="مصر الخير">مصر الخير</option>
                            <option value="مصر الخير">مصر الخير</option>
                        </select>
                    </div><!-- /.form-group -->
                    <!-- ### -->

                    <!-- this field is hidden untill the user chosses data-name: investor-clien data-school-option: chosse-school -->
                    <div class="form-group investors-optional school-options">
                        <label><span style="color:red">*</span> المدارس</label>
                        <select name="school_name" class="form-control text-right" data-name="investor">
                            <option value="مصر الخير">مصر الخير</option>
                            <option value="مصر الخير">مصر الخير</option>
                        </select>
                    </div><!-- /.form-group -->
                    <!-- ### -->


                    <!-- Button trigger School modal -->
                    <div class="form-group select-schools-option">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <span style="color:red">*</span> اختار المدارس
                        </button>
                    </div><!-- /.form-group -->

                    <div class="form-group privliges-table">
                        <label class="text-right"><span style="color:red">*</span> اختر الصلاحيات</label>
                        <table class="table table-striped table-condensed">
                            <tr>
                                <td class="text-right">
                                    <input  type="checkbox">
                                </td>
                                <td class="text-right">
                                    تحت الانشاء
                                </td>
                            </tr>
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
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-right" id="myModalLabel">مدارس تحت رعاية مصر الخير</h4>
                                </div><!-- /.modal-header -->
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
                                                <td class="text-right"><input type="checkbox" name="schools[]" value="{{$school->id}}"
                                                                              data-checkbox-children="school-lists"></td>
                                                <td class="text-right">{{$school->governorate}}</td>
                                                <td class="text-right">{{$school->name}}</td>
                                                <td class="text-right">1</td>

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
