@extends('master')
@section('page_style')
{{HTML::style('//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css')}}
{{HTML::style('css/gritter/jquery.gritter.css')}}
@stop
@section('body')
	<body class="fixed">
		<!-- /.header -->
		@include('template.topbar')		 
		<!-- wrapper -->
        <div class="wrapper">
            @include('template.menu')
            <div class="rightside">
                <div class="page-head">
                    <h1>Network</h1>
                    <ol class="breadcrumb">
						<li>Vous êtes ici :</li>
                        <li>Network</li>
                    </ol>
                </div>

                <div class="content">
                <!-- Main row -->
				<div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-title">
                                    <h3><span style="margin-right:20px;">Vos Réseaux</span> <button data-toggle="modal" data-target="#addNetwork" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>Ajouter</button> <button name="delete_btn" class="btn btn-labeled btn-danger" data-confirm="Etes-vous certain de vouloir supprimer ce(s) Hébergement(s) ?" disabled=""><span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Supprimer</button></h3>
                                </div><!-- /.box-title -->
                                <div class="box-body">
                                   <table id="network" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
	                                                <button class="select_all_networks btn btn-mini" data-toggle="button" type="button"><i class="fa fa-check-square-o"></i></button>
												</th>
                                                <th>Nom</th>
                                                <th>Nombre de sites</th>
                                                <th>Nombre de Keywords</th>
                                                <th>CA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if($networks->count() == 0)
											<tr>
												<td>Aucun enregistrement</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
                                        	@else
                                        	@foreach($networks as $network)
                                            <tr>
                                                <td>
													<input type="checkbox" name="hostId{{$network->id}}" value="{{$network->id}}">
												</td>
                                                <td>{{$network->name}}</td>
                                                <td>{{$network->sites->count()}}</td>
                                                <td>{{$networks->count()}}</td>
                                                <td>0 €</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
            </div>
        </div><!-- /.wrapper -->
		</div>
<div class="modal fade" id="addNetwork">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>Ajouter un Réseau</h4>
      </div>
      <div class="modal-body">
		<form role="form" id="newNetwork" action="#">
			<div class="form-group">
				<label for="name">Nom :</label>
				<input type="text" name="name" class="form-control" id="name" placeholder="Nom du réseau">
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="prim_kw">Keywords Principaux</label>
						<textarea name="prim_kw" class="form-control" rows="10"></textarea>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="sec_kw">Keywords Secondaires</label>
						<textarea name="sec_kw" class="form-control" rows="10"></textarea>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="oth_kw">Autres Keywords</label>
						<textarea name="oth_kw" class="form-control" rows="10"></textarea>
					</div>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-labeled btn-danger" data-dismiss="modal"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>Annuler</button>
        <button class="btn btn-labeled btn-success" id="addNewNetwork"><span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Ajouter</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop
@section('scripts')
        {{HTML::script('js/plugins/slimScroll/jquery.slimscroll.min.js')}}
        {{HTML::script('js/plugins/pace/pace.min.js')}}
        {{HTML::script('//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js')}}
        {{HTML::script('//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js')}}
        {{HTML::script('js/custom.js')}}
        {{HTML::script('js/plugins/iCheck/icheck.min.js')}}
        {{HTML::script('js/plugins/gritter/jquery.gritter.min.js')}}
        <script type="text/javascript">
          $(document).ready(function(){
                var table = $("#network").DataTable();
			    $('.select_all_networks').on('click', function(e) {
				     e.preventDefault();     
					$("input[type='checkbox']").iCheck('toggle');
			    });		
	        $('#addNewNetwork').click(function(e){
		         e.preventDefault();
		         $("#newNetwork").submit();
		      });
		      $("#newNetwork").on('submit', function(e){
			      e.preventDefault();
				  var nNetwork = $(this).serialize();
				  $.ajax({
				  	url:'network',
			        type:'PUT',
			        data: nNetwork
		          }).done(function(d){
			          if(d.result == "ok"){
					      	$.gritter.add({
		                    	title: '<i class="fa fa-check"></i> Hosting',
								text: 'Ajout du Network : <b>'+nNetwork.name+'</b> réussi !',
								class_name: 'text-success'
				            });
				            $('#addNetwork').modal('hide');
							var json = JSON.parse(d.data);
							var data = JSON.parse(json[0]);
				            table.row.add([
					            '<input type="checkbox" name="hostId" value="'+data.id+'">',
					            data.name,
					            json[1],
					            '0',
					            '0 €'
				            ]).draw();
			          }else{
					      	$.gritter.add({
		                    	title: '<i class="fa fa-exclamation-triangle"></i> Hosting',
								text: 'Erreur dans l\'ajout du Network : <b>'+nNetwork.name+'</b> !',
								class_name: 'text-danger'
				            });
				            $('#addNetwork').modal('hide');
			          }
			          $("input[type='checkbox']").trigger('icheck');
		          });     
		      });
				function checkboxChecked(){
					if($("input[type='checkbox']:checked").length > 0){
						return true;
					}else{
						return false;
					}
				}
				$(document).on('ifChanged', "input[type='checkbox']", function(event){
					if(checkboxChecked()){
						$("[name='delete_btn']").removeAttr("disabled");
					}else{
						$("[name='delete_btn']").attr('disabled','');
					}
				});
	
				$(function() {
					$('button[data-confirm]').click(function(ev) {
							var choosenNetworks = $("input[type='checkbox']:checked").serialize();
						if (!$('#dataConfirmModal').length) {
							$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel" class="text-danger"><i class="fa fa-exclamation-triangle"></i> Attention !</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
						}
						$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
						$('#dataConfirmOK').on('click', function(){
							$.ajax({
								url:'network',
								type:'DELETE',
								data: choosenNetworks
			          		}).done(function(d){
					  			if(d.result == "ok"){
						  			$.gritter.add({
			                    	title: '<i class="fa fa-check"></i> Network',
									text: 'Suppression réussi',
									class_name: 'text-success'
					            	});
					            	var indexes = table.rows().eq(0).filter(function(rowIdx){
						            	for(var a=0;a<d.ids.length;++a){
										if((table.cell(rowIdx,0).data()).indexOf('value=\"'+d.ids[a]+'\"') > -1){
											return true;
											}
										}
										return false;
									});
					            	table.rows(indexes).remove().draw();
					  			}else{
						  			$.gritter.add({
			                    	title: '<i class="fa fa-exclamation-triangle"></i> Network',
									text: 'Erreur dans la suppression !',
									class_name: 'text-danger'
					            	});
					  			}
					  			$('#dataConfirmModal').modal('hide');
			          		});
						});
						$('#dataConfirmModal').modal({show:true});
						
						return false;
					});
				});
				$(document).on('icheck', function(){
				  $('input[type=checkbox], input[type=radio]').iCheck({
				    checkboxClass: 'icheckbox_square-blue',
				    radioClass: 'iradio_square-blue'
				  });
				}).trigger('icheck'); // trigger it for page load
            });
        </script>
@stop