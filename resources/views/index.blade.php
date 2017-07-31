<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Lazada test font-end compare specific of products</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{URL::asset('ace_admin/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('ace_admin/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{URL::asset('ace_admin/assets/css/fonts.googleapis.com.css')}}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{URL::asset('ace_admin/assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{URL::asset('ace_admin/assets/css/ace-part2.min.css')}}" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{URL::asset('ace_admin/assets/css/ace-skins.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('ace_admin/assets/css/ace-rtl.min.css')}}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{URL::asset('ace_admin/assets/css/ace-ie.min.css')}}" />
    <![endif]-->

    <link rel="stylesheet" href="{{URL::asset('ace_admin/assets/css/my-app.css')}}" />
    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{URL::asset('ace_admin/assets/js/ace-extra.min.js')}}')}}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{URL::asset('ace_admin/assets/js/html5shiv.min.js')}}')}}"></script>
    <script src="{{URL::asset('ace_admin/assets/js/respond.min.js')}}')}}"></script>
    <![endif]-->
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="index.html" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Test Front-End
                </small>
            </a>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <div class="main-content content-width">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Lazada test font-end compare specific of products
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        @if ( count($errors) > 0 )
                            <div class="error-msg">
                                @foreach ($errors->all() as $error)
                                    <div style="color:red;"><strong>{{ $error }}</strong></div>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{URL::route('Home.postCompare')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>URL product A</label>
                                    <input class="form-control input-mask-date" type="text" name="urlA" placeholder="Please input URL" value="{{old('urlA')}}">
                                </div>
                                <div class="col-xs-6">
                                    <label>URL product B</label>
                                    <input class="form-control input-mask-date" type="text" name="urlB" placeholder="Please input URL" value="{{old('urlB')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2 col-xs-4">
                                    <label></label>
                                    <button class="form-control btn btn-sm btn-default" type="submit">
                                        <i class="ace-icon fa fa-search bigger-110"></i>
                                        Compare
                                    </button>
                                </div>
                            </div>

                            @if(count($errors) <= 0 && !(empty($specA) || empty($specB)))
                                <div class="row result-compare">
                                    <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                                        <div class="widget-box ui-sortable-handle" id="widget-box-1">
                                            <div class="widget-header">
                                                <h5 class="widget-title">{{$specA['product_name']}}</h5>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <div class="widget-main no-padding">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2"><img src="{{$specA['product_img']}}" class="media-object"/></td>
                                                            </tr>

                                                            @foreach($specA as $key => $value)
                                                                    @if($key != 'product_name' && $key != 'product_img')
                                                                        <tr>
                                                                            <td class="">{{$key}}</td>
                                                                            <td class="">{{$value}}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                                        <div class="widget-box ui-sortable-handle" id="widget-box-1">
                                            <div class="widget-header">
                                                <h5 class="widget-title">{{$specB['product_name']}}</h5>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <div class="widget-main no-padding">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2"><img src="{{$specB['product_img']}}" class="media-object"/></td>
                                                                </tr>

                                                                @foreach($specB as $key => $value)
                                                                    @if($key != 'product_name' && $key != 'product_img')
                                                                    <tr>
                                                                        <td class="">{{$key}}</td>
                                                                        <td class="">{{$value}}</td>
                                                                    </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{URL::asset('ace_admin/assets/js/jquery-2.1.4.min.js')}}')}}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{{URL::asset('ace_admin/assets/js/jquery-1.11.3.min.js')}}')}}"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{URL::asset('ace_admin/assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
</script>
<script src="{{URL::asset('ace_admin/assets/js/bootstrap.min.js')}}')}}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="{{URL::asset('ace_admin/assets/js/excanvas.min.js')}}')}}"></script>
<![endif]-->
<script src="{{URL::asset('ace_admin/assets/js/jquery-ui.custom.min.js')}}')}}"></script>
<script src="{{URL::asset('ace_admin/assets/js/jquery.ui.touch-punch.min.js')}}')}}"></script>
<script src="{{URL::asset('ace_admin/assets/js/jquery.easypiechart.min.js')}}')}}"></script>
<script src="{{URL::asset('ace_admin/assets/js/jquery.sparkline.index.min.js')}}')}}"></script>
<script src="{{URL::asset('ace_admin/assets/js/jquery.flot.min.js')}}')}}"></script>
<script src="{{URL::asset('ace_admin/assets/js/jquery.flot.pie.min.js')}}')}}"></script>
<script src="{{URL::asset('ace_admin/assets/js/jquery.flot.resize.min.js')}}')}}"></script>

<!-- ace scripts -->
<script src="{{URL::asset('ace_admin/assets/js/ace-elements.min.js')}}')}}"></script>
<script src="{{URL::asset('ace_admin/assets/js/ace.min.js')}}')}}"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">

</script>
</body>
</html>
