
@extends('layout')

@section('participante')

  
<div id="app-4">  
        
            
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Participantes</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Participantes</li>
                            </ul>
                        </div>
                        
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_ticket"><i class="fa fa-plus"></i>Agregar Participante</a>
                        </div>
                        
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group m-b-30">

                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">Total de Participantes</span>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">{{ $totalparti  ?? ''}}</h3>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">Participantes Confirmados</span>
                                        </div>
                                    
                                    </div>
                                    <h3 class="mb-3">{{ $totalconfirm ?? ''}}</h3>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        
                            
                        </div>
                    </div>	
                </div>
                <br>
                
                <!-- Search Filter -->
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating"  v-model="formnnombre">
                            <label class="focus-label" >Nombre </label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating"  v-model="forapellidop"> 
                            <label class="focus-label">Apellido Paterno </label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating"  v-model="formapellidom" >
                            <label class="focus-label">Apellido Materno </label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" v-model="formcorreo" >
                            <label class="focus-label"> Correo Participante</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" v-model="formtelefono">
                            <label class="focus-label">Telefono Participante</label>
                        </div>
                    </div>
                    
                    

                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                        <a href="#" v-on:click="buscarparti()"  class="btn btn-success btn-block"> Buscar </a>  
                    </div>     
                </div>
                <!-- /Search Filter -->
                <br>
                <br>
                <div  v-if="bid > 0" class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img alt="" src="{{asset('/admintemp/img/profiles/avatar17.png') }}" ></a>
                                </div>
                            </div>
                            <div  class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">@{{ bnombre }} </h3>
                                            <h3 class="user-name m-t-0 mb-0">@{{ bappelidop }} </h3>
                                            <h3 class="user-name m-t-0 mb-0"> @{{ bapellidom }} </h3>
                                            <h3 class="user-name m-t-0 mb-0"> @{{ bfolio }} </h3>
                                            
                                         
                                           
                                            <div class="staff-msg"><button  class="btn btn-custom" v-on:click="confirmarpartici()" >Confirmar Participación</button></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Telefono:</div>
                                                <div class="text"><a href="">@{{ btelefono }} </a></div>
                                            </li>
                                            <li>
                                             
                                                <div class="title">Email:</div>
                                                <div class="text"><a href="">@{{ bcorreo }}</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Institución:</div>
                                                <div class="text">@{{ binstitu }}</div>
                                            </li>
                                           
                                            <li>
                                                
                                                <div class="title">Confimo Asistencia:</div>
                                                <a v-if="bconfirm == 1" class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Confirmado</a>
                                                <a v-if="bconfirm == 0" class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pendiente</a>
                                            </li>

                                          
            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>


                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
            <!-- Add Ticket Modal -->
            <div id="add_ticket" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Participante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
							<div class="form-group">
								<label>Nombre <span class="text-danger">*</span></label>
								<input  v-model="nombre"   Class="form-control" type="text"/>
							</div>
							
							<div class="form-group">
								<label>Apellido Paterno <span class="text-danger">*</span></label>
								<input  v-model="apep" id="txtApeP" name="txtApeP"  Class="form-control" type="text"/>
							</div>
							<div class="form-group">
								<label>Apellido Materno <span class="text-danger">*</span></label>
								<input  v-model="apem" id="txtApemat" name="txtApemat" Class="form-control" type="text"/>
							</div>
							<div class="form-group">
								<label>Email <span class="text-danger">*</span></label>
								<input v-model="email" id="txtemail" name="txtemail"  type="email" Class="form-control"/>
							</div>
							<div class="form-group">
								<label>Número Telefonico <span class="text-danger">*</span></label>
								<input v-model="tel" id="txtTelefono" name="txtTelefono" Class="form-control"  type="tel"/>
							</div>
							
							
								<input v-model="informal" id="informal" name="informal"   Class="form-control"   />

								<input   id="authinformal" name="authinformal"  value="{{auth()->user()->id}}" Class="form-control" type="hidden"/>
								
							

							<div>
								<label>Tipo Institución<span class="text-danger">*</span></label>
								<select  class="form-control" v-model="tipins"  id="tipins" name="tipins">
									{{--<select  v-model="tipins" class="select" id="tipins" name="tipins"  class="form-select" aria-label="Default select example">--}}
									<option  value="1" >Gobierno</option>
									<option  value="2">Iniciativa privada</option>
									<option  value="3">Catedratico</option>
									<option  value="4">Particular</option>
								</select>
							</div>
							
							<div class="form-group">
								<label>Nombre Institución <span class="text-danger">*</span></label>
								<input v-model="nombreins"  id="txtNomins" name="txtNomins"  Class="form-control"  type="text"/>
							</div>
					
							<div class="submit-section">
								<button v-on:click="Agregarparti()" class="btn btn-primary submit-btn" >Agregar</button>
							</div>
						
						</div>
                    </div>
                </div>
            </div>
            <!-- /Add Ticket Modal -->
</div>         

        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script>
		
			
				var app3 = new Vue({
			el: '#app-4',
                    
			data: {
				
                bid:null,

                bnombre:null,
                bappelidop:null,
                bapellidom:null,
                bcorreo:null,
                btelefono:null,
                binstitu:null,
                bfolio:null,
                bconfirm:null,

                formnnombre:null,
                forapellidop:null,
                formapellidom:null,
                formcorreo:null,
                formtelefono:null,


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
				this.obtenerParti()
			},
			methods: {
				
				obtenerParti:function(){
					var a=document.getElementById("authinformal").value;
                   

					if(a ==5 || a ==6 || a ==7 || a ==1 || a ==2){
						this.informal=9;
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
					nombreins:this.nombreins,
                    informal:this.informal,
                   

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


				
					

				},buscarparti:function(){
					
                    let arraydatos = {
                          
                            bnombre:this.formnnombre,
                            bappelidop:this.forapellidop,
                            bapellidom:this.formapellidom,
                            bcorreo:this.formcorreo,
                            btelefono:this.formtelefono,

                      
                        
                    };

                    axios.post('/buscarparti', arraydatos).then((response)=> {
						
						if (response.data) {
                            
                            this.bid=response.data.id_usuario;
							this.bnombre=response.data.nombre_C;
							this.bappelidop=response.data.apep_C;
							this.bapellidom=response.data.apem_C;
							this.bcorreo=response.data.login_C;
                            this.binstitu=response.data.Nom_Ins;
							this.btelefono=response.data.telefono_Cuno;
                            this.bfolio=response.data.Folio_parti;
                            this.bconfirm=response.data.confirmflag;
							
						}

					 });

                    
                    
				},confirmarpartici:function(){

                    let arraydatos = {
                    id:this.bid,
					
                };

                    if(this.bid != null){
                        axios.post('http://sistema.avanceya.com/Evento/public/actualiestadop', arraydatos).then((response)=> {
						
						if (response.data.result) {
                            this.bid=null;
							Swal.fire('EL Participante se Confirmo');
							setTimeout(function ds(){
                             location.reload();
                           },1500);

						}else{
							 
							Swal.fire('EL Participante no se Actualizo');
						}
					 });

                    }
					
                },
			        reservars:function(){
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
			});
			
						</script>
		
   
      

  
    

@endsection