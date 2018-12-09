<!DOCTYPE html>

<html dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Page</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/wickedpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;subset=arabic" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

<nav class="navbar-heading">
    <div class="container-fluid">
        <span class="text-primary">اهلا : <a href="#" class="label label-default">مصطفي</a></span>
        <span class="text-primary pull-left">
                @if(Auth::check())
                <form method="post" action="{{route("logout")}}">

                    @csrf
                    <input type="submit" value="تسجيل الخروج"></a>
                    </form>
				@endif
                </span>
    </div><!-- /.container-fluid --->
</nav><!-- /nav-headding -->

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header navbar-right">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/home') }}">
                <div class="brand-ar">
                    <img src="{{asset('imgs/logo.png')}}">
                </div><!-- /.brand-ar -->
            </a><!-- /.navbar-brand -->
        </div>
        <div id="navbar" class="collapse navbar-collapse  navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"><span class="caret"></span> المزيد</a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class=" text-right">بناء القدرات</a></li>
                        <li><a href="#" class=" text-right">بنك الاسئلة</a></li>
                        <li><a href="{{ url('teachers_materials') }}" class=" text-right">المواد التعليمية</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('reports') }}" class=" text-right">التقارير</a></li>
                    </ul>
                </li><!-- /.dropdown -->

                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("ادارة الدعم"))
                    <li class=" text-right"><a href="{{ url('assets') }}">ادارة الدعم</a></li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("ادارة الطلاب"))
                    <li class=" text-right"><a href="{{ url('students') }}">ادارة الطلاب</a></li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("ادارة المعلمين"))
                    <li class=" text-right"><a href="{{ url('teachers') }}">ادارة المعلمات</a></li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("ادارة المدارس"))
                    <li class=" text-right"><a href="{{ url('schools') }}">ادارة المدارس</a></li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->can("ادارة المستخدمين"))
                    <li class=" text-right"><a href="{{ url('technical_users') }}">ادارة المستخدمين</a></li>
                @endif
            </ul>

        </div><!--/.nav-collapse -->
    </div><!-- /.container-fluid -->
</nav>
@yield("content")

<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/wickedpicker.min.js') }}"></script>
<!--script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script>

</script>
</body>
</html>
