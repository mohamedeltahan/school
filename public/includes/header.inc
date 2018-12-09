<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0;">

		<title>Admin Page</title>

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;subset=arabic" rel="stylesheet">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<style>
			body {
				font-family: 'Cairo', sans-serif;
			}
			/*customized navbar*/
			.navbar-heading {
				min-height: 25px;
				padding: 3px;
				background:  linear-gradient(to bottom, #f5f5f5 0%,#e5e5e5 100%);
				margin-bottom: 0;
			}
			.navbar-brand {
				padding-top: 7px;
				padding-bottom: 7px;
				padding-right: 0;
			}
			.navbar-brand .brand-ar {
				display: inline-block;
				border-left: 1px solid #bbb;
				border-right: 1px solid #bbb;
				text-align: center;
			}
			.navbar-brand .brand-ar img {
				width: 130px;
				padding: 0 10px;
			}

		</style>
	</head>

	<body>

		<nav class="navbar-heading">
			<div class="container-fluid">
				<span class="text-primary">Welcome : <a href="#" class="label label-default">مصطفي</a><span>
				<span class="text-primary pull-right"><a href="#">تسجيل الخروج</a><span>
			</div><!-- /.container-fluid --->
		</nav><!-- /nav-headding -->

		<nav class="navbar navbar-default">
       <div class="container-fluid">
         <div class="navbar-header navbar-right">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="index.php">
						 	<div class="brand-ar">
								<img src="imgs/logo.png">
							</div><!-- /.brand-ar -->
					 </a><!-- /.navbar-brand -->
         </div>
         <div id="navbar" class="collapse navbar-collapse  navbar-right">
           <ul class="nav navbar-nav">
						 <li class="dropdown">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span> المزيد</a>
                <ul class="dropdown-menu">
									<li><a href="#" class=" text-right">بناء القدرات</a></li>
									<li><a href="#" class=" text-right">بنك الاسئلة</a></li>
									<li><a href="#" class=" text-right">المواد التعليمية</a></li>
									<li><a href="#" class=" text-right">غياب الطلاب</a></li>
									<li><a href="#" class=" text-right">غياب المعلمات</a></li>
                  <li role="separator" class="divider"></li>
                </ul>
              </li><!-- /.dropdown -->
             <li class=" text-right"><a href="#">ادارة الاصول</a></li>
						 <li class=" text-right"><a href="manage_students.php">ادارة الطلاب</a></li>
						 <li class=" text-right"><a href="manage_teachers.php">ادارة المعلمات</a></li>
						 <li class=" text-right"><a href="manage_schools.php">ادارة المدارس</a></li>
             <li class=" text-right"><a href="manage_users.php">ادارة المستخدمين</a></li>
           </ul>

         </div><!--/.nav-collapse -->
       </div><!-- /.container-fluid -->
     </nav>
		 <!-- end nav -->
