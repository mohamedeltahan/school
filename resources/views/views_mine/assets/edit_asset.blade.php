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


                <form method="post" action="{{route('assets.update',$asset->id)}}">

                    @csrf
                    @method("put")
                    <legend>اضافة اصل جديد</legend>

                    <!--
                        # If the root admin is the adding a new asset;
                        Then he needs to select an investors first.
                        # Case the inviestor
                    -->
                    <div class="form-group">
                        <label>الجهة الداعمة</label>
                        <select class="form-control" name="investor_id">
                            @foreach($technical_users as $technical_user)
                                <option @if($technical_user->id==$asset->investor_id) selected="selected" @endif value="{{$technical_user->id}}">{{$technical_user->full_name}}</option>
                            @endforeach
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>المحافظة</label>
                        <select disabled class="form-control" name="">
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
                                    <td class="text-right"><input @if($school->id==$asset->school_id) checked @endif type="checkbox" name="schools[]" value="{{$school->id}}" data-checkbox-children="school-lists"></td>

                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.modal-body -->

                    <div class="form-group">
                        <label>النوع</label>
                        <select class="form-control">
                            <option @if($asset->category=="اصول") selected="selected" @endif>اصول</option>
                            <option  @if($asset->category=="مشتريات") selected="selected" @endif>مشتريات</option>
                            <option @if($asset->category=="صيانة") selected="selected" @endif>صيانة</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>اسم الاصل</label>
                        <input value="{{$asset->name}}" type="text" class="form-control" name="name" placeholder="ادخل اسم الاصل">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>الكمية</label>
                        <input value="{{$asset->quantity}}" type="text" class="form-control" name="" placeholder="ادخل الكمية">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>حالة الاصل</label>
                        <select name="state" class="form-control">
                            <option @if($asset->state=="جديد") selected="selected" @endif  >جديد</option>
                            <option @if($asset->state=="مستعمل") selected="selected" @endif>مستعمل</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>تاريخ الارسال</label>
                        <input name="date_released" value="{{$asset->date_released}}" type="text" class="form-control birth-date-input-field">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>تاريخ الانتهاء</label>
                        <input value="{{$asset->expired_date}}" name="expired_date" type="text" class="form-control birth-date-input-field">
                    </div><!-- /.form-group -->

                    <input type="submit" class="btn btn-primary pull-left" value="حفظ بيانات الاصل">
                </form>
            </div><!-- /.form-container -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <!-- End Project Main Page -->
@endsection
