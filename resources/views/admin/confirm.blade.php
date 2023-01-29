@extends('layout')


@section('participante')
<div id="app-6">
	
    <!-- Page Content -->
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Participantes</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Confirmados</li>
							</ul>
						</div>
						
					</div>
				</div>
				@if ($mensaje ?? '' > 0)
				<div id="mensajes" class="alert alert-success" role="alert">
					{{$mensaje}}
				</div>
				@endif

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped table-bordered" style="width:100%" id="participaexa">
								<thead>
									<tr>
										<th style="width: 30px;">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido Paterno</th>
                                        <th scope="col">Apellido Materno</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Correo</th>
                        
										<th scope="col">Asistencia Presencial</th>
                                        <th scope="col">Nombre Institución</th>
                                        <th scope="col">Fecha Registro</th>
                                        
                           				 {{--<th class="text-right">Action</th>--}}
									</tr>
								</thead>
								<tbody>
                                    @foreach($Liscat as $cat)  
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                
                                                <a>	{{ $loop->iteration }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $cat->nombre_C }}</td>
                                        <td>{{ $cat->apep_C }}</td>
                                        <td>{{ $cat->apem_C }}</td>
                                        <td>{{ $cat->telefono_Cuno }}</td>
                                        <td>{{ $cat->login_C }}</td>
                                        
										<td class="text-center">
											<div class="dropdown action-label">
												
												<div >

													@switch($cat->confirmflag)
														@case(1)
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Confirmado</a>
														@break
														
														@default
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pendiente</a>
														@endswitch
													
												</div>
											</div>
										</td>

                                       
                                        <td>{{ $cat->Nom_Ins }}</td>
                                        <td>{{date('d - m - y', strtotime($cat->created_at) )}}</td>

                                      {{--
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
											
                                                    <a class="dropdown-item" href="#" data-toggle="modal" v-on:click="editarusuario({{ $cat->id_usuario }})"  data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i>Edit</a>
													@switch(auth()->user()->id)
													@case(4)
													@break
													@case(3)
													@break
													@default
													<a class="dropdown-item" href="#" data-toggle="modal" v-on:click="deleteAll({{ $cat->id_usuario }})"  data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													@endswitch
													
                                                    
											 
													<a class="dropdown-item" href="#" v-on:click="enviarconfirma({{ $cat->id_usuario }})" ><i class="fa fa-envelope"></i> Confirmar email</a>
                                             
											
												</div>
                                            </div>
                                        </td>--}}
                                    </tr>
                                    @endforeach
                                          
								</tbody>
							</table>
						</div>
					</div>
				</div>

			
				
			</div>
			<!-- /Page Content -->
            @include('admin.appP')

			@include('admin.editP')

			@include('admin.deletp')
		
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script>
	
				var app3 = new Vue({
			el: '#app-6',
			
			data: {
				banderaid:null,
				nombre:null,
				apep:null,
				apem:null,
				email:null,
				tel:null,
				tipins:null,
				nombreins:null,
				teldos:null,
				exttel:null,
				direccion:null,
				identifica:null,
				Nestudio:null,
				Onomas:null,
				tipoparti:null,
				enviconfir:null,
				informal:null,
				arraydatos:[],
				

			},
			mounted:function() {
				this.obtenerParti();
				this.tabla();
			},
			methods: {
				
				obtenerParti:function(){
					var a=document.getElementById("authinformal").value;
					if(a ==3){
						this.informal=1;
					}else{
						this.informal=0;
					}
					
						
				},
				
				Agregarparti: function () {
				
                  
					let arraydatos = {
					nombre:this.nombre,
					apep:this.apep,
					apem:this.apem,
					email:this.email,
					tel:this.tel,
					tipoins:this.tipins,
					informal:this.informal,
					nombreins:this.nombreins,
                };

					
					axios.post('http://sistema.avanceya.com/Evento/public/guardarb', arraydatos).then((response)=> {
						
						if (response.data.result) {
							
							Swal.fire('EL Participante se Guardo');
							setTimeout(function ds(){
                             location.reload();
                           },1500);

						}else{
							 
							Swal.fire(response.data.mensaje);
						}
					 });


				
					

				},
				deleteAll: function (id) {
				this.banderaid=id;
				},
				enviarconfirma: function (id) {
					let arraydatos = {
                    array_dat:id
                };
					axios.post('http://sistema.avanceya.com/Evento/public/enviaremail', arraydatos).then((response)=> {
						
						if (response.data.result) {
							
							Swal.fire('Se envio correo de Confirmación');

						}else{
							 
							Swal.fire('Fallo de envio de correo de Confirmación');
						}
					 });

				},
				Confirdelet: function () {
				 let arraydatos = {
                    array_dat:this.banderaid
                };

				if(this.banderaid != null){
					
					axios.post('http://sistema.avanceya.com/Evento/public/eliminar', arraydatos).then((response)=> {
						console.log("aqui estoy 1");
						if (response.data.result) {
							
							Swal.fire('EL Participante se eliminino');
							setTimeout(function ds(){
                             location.reload();
                           },1500);

						}else{
							 
							Swal.fire('EL Participante no se elimino');
						}
					 });


				}
				},
				editarusuario: function (id) {
					this.reservars();
					axios.get('http://sistema.avanceya.com/Evento/public/modificarp/'+ id).then((response)=> {
						
						if (response.data) {
							this.banderaid=response.data[0].id_usuario;
							
							this.nombre=response.data[0].nombre_C;
							this.apep=response.data[0].apep_C;
							this.apem=response.data[0].apem_C;
							this.email=response.data[0].login_C;
							this.tel=response.data[0].telefono_Cuno;
							this.tipins=response.data[0].id_tipoIns;
							this.nombreins=response.data[0].Nom_Ins;
							this.teldos=response.data[0].telefono_Cdos;
							this.exttel=response.data[0].exten_Ctel;
							this.direccion=response.data[0].direccion_C;
							this.tipoparti=response.data[0].nivel
							this.identifica=response.data[0].Identi_C;
							this.Nestudio=response.data[0].Nivel_C;
							this.Onomas=response.data[0].Onomas_C;
							this.enviconfir=response.data[0].confirmflag;
						}else{
							 
							
						}
					
					 });

				},editarenvusuario: function () {

					let arraydatos = {
                    array_dat:this.banderaid,
					enombre:this.nombre,
					eapep:this.apep,
					eapem:this.apem,
					eemail:this.email,
					etel:this.tel,
					etipoins:this.tipins,
					enombreins:this.nombreins,
					etipoparti:this.tipoparti,
					eenviconfi:this.enviconfir,
					//campos extra
					eteldos:this.teldos,
					eexttel:this.exttel,
					edireccion:this.direccion,
					eidentifica:this.identifica,
					eNestudio:this.Nestudio,
					eOnomas:this.Onomas,
                };

				if(this.banderaid != null){
					
					axios.post('http://sistema.avanceya.com/Evento/public/actualizaparti', arraydatos).then((response)=> {
						console.log("aqui estoy 1");
						if (response.data.result) {
							
							Swal.fire('EL Participante se Actualizo');
							setTimeout(function ds(){
                             location.reload();
                           },1500);

						}else{
							 
							Swal.fire('EL Participante no se Actualizo');
						}
					 });


				}
			
				},tabla:function(){
					$('#participaexa').DataTable();
				}
				,reservars:function(){
					this.banderaid=null;
					this.nombre=null;
					this.apep=null;
					this.apem=null;
					this.email=null;
					this.tel=null;
					this.tipins=null;
					this.nombreins=null;
					this.teldos=null;
					this.exttel=null;
					this.tipoparti=null;
					this.direccion=null;
					this.identifica=null;
					this.Nestudio=null;
					this.Onomas=null;
					this.enviconfir=null;
				}
			}
			})
			
						</script>
		

@endsection