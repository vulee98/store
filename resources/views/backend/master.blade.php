
<!DOCTYPE html>
<html>
<head>

<base href="{{ asset('public/layout/backend') }}/">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') | Vietpro shop</title>
<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet"> --> 
 <link rel="stylesheet" href="{{ asset('layout/backend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('layout/backend/css/datepicker3.css') }}">
<link rel="stylesheet" href="{{ asset('layout/backend/css/styles.css') }}"> 
 <!-- <link href="css/styles.css" rel="stylesheet">  -->
 <!-- <script type="text/javascript" src="{{ asset('public/editor/ckeditor/ckeditor.js') }}"></script> -->
<script type="text/javascript" src="../../../public/editor/ckeditor/ckeditor.js"></script>
<script src="{{ asset('layout/backend/js/lumino.glyphs.js') }}"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('admin/home')}}"> Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{Auth::user()->email}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{asset('logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="{{asset('admin/home')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a href="{{asset('admin/product')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li><a href="{{asset('admin/category')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Danh mục</a></li>
			<li><a href="{{asset('admin/contacts')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> contact</a></li>
			<li><a href="{{asset('admin/orders')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Quản lý đơn hàng</a></li>
			
			<li role="presentation" class="divider"></li>
		</ul>
        </div><!--/.sidebar-->
        <!--main-->
        @yield('main')
		
		<script src="{{ asset('layout/backend/js/jquery-1.11.1.min.js') }}"></script>
		
	<script src="{{ asset('layout/backend/js/bootstrap.min.js') }}"></script>
	<!-- <script src="js/chart-data.js"></script> -->
	<script src="{{ asset('layout/backend/js/chart-data.js') }}"></script>
	<!-- <script src="js/easypiechart.js"></script> -->
	<script src="{{ asset('layout/backend/js/easypiechart.js') }}"></script>
	<!-- <script src="js/easypiechart-data.js"></script> -->
	<script src="{{ asset('layout/backend/js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('layout/backend/js/bootstrap-datepicker.js') }}"></script>
	<!-- <script src="js/bootstrap-datepicker.js"></script> -->
	<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
	<script>
  $('#calendar').datepicker({
  });

  !function ($) {
      $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
          $(this).find('em:first').toggleClass("glyphicon-minus");      
      }); 
      $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
  }(window.jQuery);

  $(window).on('resize', function () {
    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
  })
  $(window).on('resize', function () {
    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
  })
  // Chang Image add product
  function changeImg(input){
      //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
      if(input.files && input.files[0]){
          var reader = new FileReader();
          //Sự kiện file đã được load vào website
          reader.onload = function(e){
              //Thay đổi đường dẫn ảnh
              $('#avatar').attr('src',e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  $(document).ready(function() {
      $('#avatar').click(function(){
          $('#img').click();
      });
  });
 </script>
</body>

</html>
