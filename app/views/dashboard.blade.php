@extends('master')
@section('page_style')
{{HTML::style('css/gritter/jquery.gritter.css')}}
{{HTML::style('css/bootstrap-tagsinput/bootstrap-tagsinput.css')}}
{{HTML::style('css/jquery-jvectormap/jquery-jvectormap-1.2.2.css')}}
@stop
@section('body')
	<body class="fixed">
		@include('template.topbar')		 
		<!-- wrapper -->
        <div class="wrapper">
			@include('template.menu')
            <div class="rightside">
                <div class="page-head">
                    <h1>Dashboard  <small>Résumé global de l'activité</small></h1>
                    <ol class="breadcrumb">
						<li>Vous êtes ici :</li>
                        <li><a href="#">Accueil</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>

                <div class="content">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="custom-box palette-alizarin">
                                <h3 class="timer" data-start="0" data-from="0" data-to="155" data-speed="3000" data-refresh-interval="10"></h3>
                                <p>Registered users</p>
                                <i class="fa fa-users"></i>
							</div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="custom-box palette-nephritis">
                                <h3 class="timer" data-start="0" data-from="0" data-to="135" data-speed="3000" data-refresh-interval="10"></h3>
                                <p>Daily Visitors</p>
								<i class="fa fa-signal"></i>
							</div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="custom-box palette-peter-river">
                                <h3 class="timer" data-start="0" data-from="0" data-to="17" data-speed="3000" data-refresh-interval="10"></h3>
                                <p>Messages</p>
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="custom-box palette-wet-asphalt">
                                <h3 class="timer" data-start="0" data-from="0" data-to="45" data-speed="3000" data-refresh-interval="10"></h3>
                                <p>Subscribers</p>
                                <i class="fa fa-rss"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Main row -->
                    <div class="row">
						<div class="col-lg-6"> 
							<div class="box">
                                <div class="box-title">
                                    <i class="fa fa-signal"></i>
                                    <h3>Website Statistics</h3>
                                    <div class="pull-right box-toolbar">
                                        <a href="#" class="btn btn-link btn-xs collapse-box"><i class="fa fa-chevron-up"></i></a>
                                        <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="box-body">
                                   <div class="flot">
										<div id="placeholder" class="flot-placeholder"></div>
									</div>
                                </div>
                            </div>
						</div>	
						
						<div class="col-lg-6">
                            <div class="box">
                                <div class="box-title">
                                    <i class="fa fa-map-marker"></i>
                                    <h3>Vector Map</h3>
                                    <div class="pull-right box-toolbar">
                                        <a href="#" class="btn btn-link btn-xs collapse-box"><i class="fa fa-chevron-up"></i></a>
                                        <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                    </div>           
                                </div>
                                <div class="box-body no-padding">
                                    <div id="map" style="height: 395px;"></div>
                                </div>
                            </div>
						</div>
						
						<div class="clearfix"></div>
						<div class="hr"></div>
					</div>
					
					
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="box" style="height: 360px">
                                <div class="box-title">
                                    <i class="fa fa-envelope"></i>
                                    <h3>Quick Post</h3>
                                    <div class="pull-right box-toolbar">
                                        <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                    </div>          
                                </div>
                                <div class="box-body">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Title"/>
                                        </div> 
										<div class="form-group">
                                            <input type="text" class="form-control" value="post, article, tags, put" data-toggle="tags" />
                                        </div>
                                        <div>
                                            <textarea placeholder="Content" class="form-control" rows="5"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer clearfix">
                                    <button class="pull-left btn btn-success">Publish <i class="fa fa-arrow-circle-right"></i></button>
                                    <button class="pull-right btn btn-default">Reset <i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div><!-- /.Left col -->
					
                        <div class="col-lg-4">
                            <div class="box" style="height: 360px">
                                <div class="box-title">
									<i class="fa fa-comments-o"></i> 
                                    <h3>Chat</h3>
                                    <div class="pull-right box-toolbar">
                                        <a href="#" class="btn btn-link btn-xs" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#"><i class="fa fa-circle text-success"></i> Online</a></li>
                                                <li><a href="#"><i class="fa fa-circle text-danger"></i> Offline</a></li>
                                            </ul>
                                        <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="box-body chat" id="chat-box">
                                    <div class="item">
                                        <img src="{{asset('img/avatar2.jpg')}}" alt="user" class="img-thumbnail"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                                                Jill Doe
                                            </a>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been 
                                        </p>
                                    </div>
                                    <div class="item">
                                        <img src="{{asset('img/avatar.jpg')}}" alt="user image" class="img-thumbnail"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                                John Doe
                                            </a>
                                           
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been 
                                        </p>
                                    </div>
                                    <div class="item">
                                        <img src="{{asset('img/avatar3.jpg')}}" alt="user image" class="img-thumbnail"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                                                Jeremy Doe
                                            </a>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been 
                                        </p>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Send a message..."/>
                                        <div class="input-group-btn">
                                            <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                        <div class="col-lg-4">
                            <div class="box" style="height: 360px">
                                <div class="box-title">
                                    <i class="fa fa-check-square-o"></i>
                                    <h3>ToDo List</h3>
                                    <div class="pull-right box-toolbar">
                                        <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-plus"></i></a>
                                    </div> 
                                </div>
                                <div class="box-body">
                                    <ul class="todo">
                                        <li class="check">
                                            <input type="checkbox" id="checkbox" />            
                                            <span class="text">Write new article</span>
                                            <small class="label label-info"><i class="fa fa-clock-o"></i> 1 mins</small>
                                        </li>
                                        <li>                      
                                            <input type="checkbox"/>
                                            <span class="text">Test new item page</span>
                                            <small class="label label-warning"><i class="fa fa-clock-o"></i> 3 mins</small>
                                        </li>
                                        <li>
                                            <input type="checkbox"/>
                                            <span class="text">Create new plugins for theme</span>
                                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 42 mins</small>
                                        </li>
                                        <li>
                                            <input type="checkbox"/>
                                            <span class="text">Check mailbox and new mails</span>
                                            <small class="label label-default"><i class="fa fa-clock-o"></i> 3 hours</small>
                                        </li>
                                        <li>
                                            <input type="checkbox"/>
                                            <span class="text">Setup the new theme</span>
                                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 day</small>
                                        </li>
                                        <li>
                                            <input type="checkbox"/>
                                            <span class="text">Buy a goat</span>
                                            <small class="label label-success"><i class="fa fa-clock-o"></i> 1 week</small>
                                        </li>
                                    </ul>
                                </div>
                                <div class="box-footer clearfix no-border no-padding-top">
                                    <button class="btn btn-block btn-danger">See all tasks</button>
                                </div>
                            </div>
						</div>
                    </div>
                </div>
            </div>
        </div><!-- /.wrapper -->
@stop
@section('scripts')
        {{HTML::script('js/plugins/gritter/jquery.gritter.min.js')}}
		
		<!-- Charts -->
		{{HTML::script('js/plugins/flot/jquery.flot.min.js')}}
		{{HTML::script('js/plugins/flot/jquery.flot.resize.min.js')}}
		{{HTML::script('js/plugins/flot/jquery.flot.pie.min.js')}}
		{{HTML::script('js/plugins/flot/jquery.flot.stack.min.js')}}
		{{HTML::script('js/plugins/flot/jquery.flot.crosshair.min.js')}}
        {{HTML::script('js/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js')}}
        {{HTML::script('js/plugins/jquery-jvectormap/jquery-jvectormap-europe-merc-en.js')}}
		
		<!-- Interface -->
        {{HTML::script('js/plugins/jquery-countTo/jquery.countTo.js')}}
        {{HTML::script('js/plugins/slimScroll/jquery.slimscroll.min.js')}}
        {{HTML::script('js/plugins/pace/pace.min.js')}}
		
		<!-- Forms -->
        {{HTML::script('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}
        {{HTML::script('js/plugins/iCheck/icheck.min.js')}}
        {{HTML::script('js/custom.js')}}
		
		<!-- Dashboard -->
        <script type="text/javascript">
		(function($) {
		"use strict";
			// number count
			$('.timer').countTo();
			
			//TagsInput
			$("[data-toggle='tags']").tagsinput({ 
				tagClass: function(item) { 
					return 'label label-primary';
				} 
			});
			
			// chat scroll
			$('#chat-box').slimScroll({
				height: '250px'
			}); 
			
			//iCheck
			$("input[type='checkbox'], input[type='radio']").iCheck({
				checkboxClass: 'icheckbox_minimal',
				radioClass: 'iradio_minimal'
			});
	
			// ToDo
			$('#checkbox').on('ifChecked', function(event){
				$('.check').addClass('through')
			});
			$('#checkbox').on('ifUnchecked', function(event){
				$('.check').removeClass('through')
			});
			
			// gritter
			setTimeout(function() {
                $.gritter.add({
                    title: 'You have one new task for today',
                    text: 'Go and check <a href="mailbox.html" class="text-warning">tasks</a> to see what you should do.<br/> Check the date and today\'s tasks.'
                });
            }, 2000);
			
			// flot
						var v1 = [[1,50],[2,53],[3,40],[4,55],[5,47],[6,39],[7,44],[8,55],[9,43],[10,61],[11,52],[12,57],[13,64],[14,54],[15,49],[16,55],[17,53],[18,57],[19,68],[20,71],[21,84],[22,72],[23,88],[24,74],[25,87],[26,83],[27,76],[28,86],[29,93],[30,95]];
						var v2= [[1,13],[2,18],[3,14],[4,25],[5,23],[6,17],[7,20],[8,26],[9,24],[10,27],[11,32],[12,37],[13,32],[14,28],[15,25],[16,21],[17,25],[18,33],[19,30],[20,27],[21,35],[22,28],[23,29],[24,28],[25,34],[26,27],[27,40],[28,29],[29,33],[30,45]];
						var C= ["#7fb9d1","#e65353"];
						var plot = $.plot("#placeholder", [
							{ data: v1, label: "Total Visitors",lines:{fillColor: "#f8fcfd"}},
							{ data: v2, label: "Unique Visitors",lines:{fillColor: "#fdf8f8"}}
						], {
							series: {
								lines: {
									show: true,
									fill: true
								},
								points: {
									show: true
								},
								shadowSize: 0
							},
							grid: {
								hoverable: true,
								clickable: true,
								aboveData: true,
								borderWidth: 0
							},
							legend:{
								noColumns: 0,
								margin: [0,-23],
								labelBoxBorderColor: null
							},
							colors: C,
							tooltip: true
						});

						function showTooltip(x, y, contents) {
							$("<div id='flot_tip'>" + contents + "</div>").css({
								top: y - 20,
								left: x + 5,
							}).appendTo("body").fadeIn(200);
						}

						var previousPoint = null;
						$("#placeholder").bind("plothover", function (event, pos, item) {
						if (item) {
							if (previousPoint != item.dataIndex) {
								previousPoint = item.dataIndex;
								$("#flot_tip").remove();
								var x = item.datapoint[0].toFixed(0),
								y = item.datapoint[1].toFixed(0);
								showTooltip(item.pageX, item.pageY,
										 y + " " + item.series.label + " on the " + x + "th");
								}
								} else {
									$("#flot_tip").remove();
									previousPoint = null;            
								}
							});

			// jvectormap
			$('#map').vectorMap({
				map: 'europe_merc_en',
				zoomMin: '3',
				backgroundColor: "#fff",
				focusOn: { x: 0.5, y: 0.7, scale: 3 },
				markers: [
					{latLng: [42.5, 1.51], name: 'Andorra'},
					{latLng: [43.73, 7.41], name: 'Monaco'},
					{latLng: [47.14, 9.52], name: 'Liechtenstein'},
					{latLng: [41.90, 12.45], name: 'Vatican City'},
					{latLng: [43.93, 12.46], name: 'San Marino'},
					{latLng: [35.88, 14.5], name: 'Malta'}
				    ],
				    markerStyle: {
				      initial: {
				        fill: '#fa4547',
				        stroke: '#fa4547',
					    "stroke-width": 6,
					    "stroke-opacity": 0.3,
    				      }
				    },	
				regionStyle: {
					initial: {
						fill: '#e4e4e4',
						"fill-opacity": 1,
						stroke: 'none',
						"stroke-width": 0,
						"stroke-opacity": 1
					}
				}
			});
		})(jQuery);
		</script>
@stop