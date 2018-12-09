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
                <form method="post" action="{{route('technical_users.update',$technical_user->id)}}">
                    @method("PUT")
                    @csrf
                    <legend>تعديل مستخدم </legend>

                    <!-- select the user category -->
                    <div class="form-group text-right">
                        <label><span style="color:red">*</span> فئة المستخدم</label>
                        <select disabled name="user_category" class="form-control text-right" id="flag-investor">
                            <option @if($technical_user->user_category=="مدير نظام") {{"selected=selected"}} @endif class=" text-right" value="مدير نظام" selected="selected">
                                مدير نظام
                            </option>
                            <option @if($technical_user->user_category=="جهه داعمة") {{"selected=selected"}} @endif  value="جهه داعمة" data-school-option="chosse-schools">
                                جهه داعمة
                            </option>
                            <option @if($technical_user->user_category=="دعم فني") {{"selected=selected"}} @endif  value="دعم فني" data-name="investor-client" data-school-option="chosse-schools">
                                دعم فني
                            </option>
                        </select>
                    </div><!-- /.form-group -->
                    <!-- End select user category -->

                    <div class="form-group">
                        <label><span style="color:red">*</span> اسم المستخدم او الهيئة</label>
                        <input value="{{$technical_user->full_name}}" name="full_name" type="text" class="form-control text-right" required="required" placeholder="اضف اسم المستخدم او الهيئة">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label><span style="color:red">*</span> رقم الهاتف</label>
                        <input value="{{$technical_user->phone}}" name="phone" type="text" class="form-control text-right" required placeholder="رقم الهاتف">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>البريد الالكتروني</label>
                        <input value="{{$technical_user->email}}" name="email" type="email" class="form-control text-right" placeholder="ادخل البريد الالكتروني ان وجد">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>الرقم القومي للمستخدم</label>
                        <input value="{{$technical_user->ssn}}" name="ssn" type="text" class="form-control text-right"  placeholder="اضف الرقم القومي للمستخدم">
                    </div><!-- /.form-group -->

                    <div class="form-group technichal-support-options">
                        <label>تاريخ الميلاد</label>
                        <input value="{{$technical_user->birth_date}}" name="birth_date" type="text" class="form-control text-right birth-date-input-field"  placeholder="ادخل تاريخ الميلاد">
                    </div><!-- /.form-group -->

                    <div class="form-group technichal-support-options">
                        <label>الديانة</label>
                        <select name="religion" class="form-control text-right">
                            <option @if($technical_user->religion=="مسلم") {{"selected=selected"}} @endif value="مسلم" class="text-right">مسلم</option>
                            <option @if($technical_user->religion=="مسيحي") {{"selected=selected"}} @endif value="مسيحي" class="text-right">مسيحي</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group technichal-support-options">
                        <label>النوع</label>
                        <select name="sex" class="form-control text-right">
                            <option @if($technical_user->sex=="ذكر") {{"selected=selected"}} @endif value="ذكر" class="text-right">ذكر</option>
                            <option @if($technical_user->sex=="انثي") {{"selected=selected"}} @endif value="انثي" class="text-right">انثي</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group technichal-support-options">
                        <label>المستوي التعليمي</label>
                        <select name="education[]" class="form-control text-right">
                            <option @if(explode(":",$technical_user->education)[0]=="مؤهل عالي") {{"selected=selected"}} @endif value="مؤهل عالي" class="text-right">مؤهل عالي</option>
                            <option @if(explode(":",$technical_user->education)[0]=="مؤهل متوسط") {{"selected=selected"}} @endif value="مؤهل متوسط" class="text-right">مؤهل متوسط</option>
                            <option @if(explode(":",$technical_user->education)[0]=="مؤهل فوق المتوسط") {{"selected=selected"}} @endif value="مؤهل فوق المتوسط" class="text-right">مؤهل فوق المتوسط</option>
                            <option @if(explode(":",$technical_user->education)[0]=="دبلوم") {{"selected=selected"}} @endif value="دبلوم" class="text-right">دبلوم</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group technichal-support-options">
                        <label>المؤهل</label>
                        <input value="{{explode(":",$technical_user->education)[1]}}" name="education[]" type="text" class="form-control text-right" placeholder="">
                    </div><!-- /.form-group -->

                    <div class="form-group technichal-support-options">
                        <label>تاريخ التعيين</label>
                        <input value="{{$technical_user->hiring_date}}" name="hiring_date"  class="form-control text-right" placeholder=" تاريخ التعيين">
                    </div><!-- /.form-group -->

                    <div class="form-group technichal-support-options">
                        <label>نوع التعين</label>
                        <select name="job_type" class="form-control text-right" data-name="investor">
                            <option @if($technical_user->job_type=="معين") {{"selected=selected"}} @endif value="معين">
                                معين
                            </option>
                            <option @if($technical_user->job_type=="مؤقت") {{"selected=selected"}} @endif value="مؤقت">
                                مؤقت
                            </option>
                            <option @if($technical_user->job_type=="منتدب") {{"selected=selected"}} @endif value="منتدب">
                                منتدب
                            </option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group technichal-support-options">
                        <label> الراتب</label>
                        <input value="{{$technical_user->salary}}" name="salary"  class="form-control text-right" placeholder=" الراتب">
                    </div><!-- /.form-group -->

                    <div class="form-group technichal-support-options">
                        <label>سنوات الخبرة</label>
                        <input value="{{$technical_user->experience_years}}" name="experience_years"  class="form-control text-right" placeholder="سنوات الخبرة">
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>العنوان</label>
                        <textarea name="address" rows="5" class="form-control" style="resize: none;"  placeholder="ادخل العنوان بالتفصيل">{{$technical_user->address}}</textarea>
                    </div><!-- /.form-group -->

                    <!-- this field is hidden untill the user chosses data-name: investor-clien -->
                    <div class="form-group investors-optional investors-options">
                        <label><span style="color:red">*</span> الجهة الداعمة</label>
                        <select name="investor_id" class="form-control text-right" data-name="investor">
                            @foreach($supports as $support)
                                <option @if($technical_user->investor_id==$support->id) {{"selected=selected"}} @endif  value="{{$support->id}}">{{$support->full_name}}</option>
                            @endforeach
                        </select>
                    </div><!-- /.form-group -->

                    <!-- Button trigger School modal -->
                    <div class="form-group select-schools-option">
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            اختار المدارس
                        </button>
                    </div><!-- /.form-group -->

                    <div class="form-group privliges-table">
                        <label class="text-right">اختر الصلاحيات</label>
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
                        <input value="{{$technical_user->account_name}}" name="account_name" type="text" class="form-control text-right"  required="required" placeholder="اسم الدخول">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label><span style="color:red">*</span> كلمة السر</label>
                        <input value="{{$technical_user->password}}" name="password" type="password" class="form-control text-right"  required="required" placeholder="كلمة السر">
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
                                                <td class="text-right"> {{$school->id}}</td>
                                                <td class="text-right">{{$school->name}}</td>
                                                <td class="text-right">{{$school->governorate}}</td>
                                                <td class="text-right"><input @if(in_array($school->id,$supporters)) {{"checked"}} @endif type="checkbox" name="schools[]" value="{{$school->id}}" data-checkbox-children="school-lists"></td>
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
