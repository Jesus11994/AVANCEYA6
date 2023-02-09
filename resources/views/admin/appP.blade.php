
        <!-- Add Leave Modal -->
			<div id="add_leave" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Agregar Participante</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						
						<div class="modal-body">
							<div class="form-group">
								<label><b>Si cuenta con un boleto físico, ingrese el folio:</b></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-hashtag"></i></span>
									</div>
									<input id="folio_even" name="folio_even" v-model="folio_even" Class="form-control" type="text"/>
								</div>
							</div>
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
							
							
								<input v-model="informal" id="informal" name="informal"  value="1" Class="form-control"  type="hidden" />

								<input  id="authinformal" name="authinformal"  value="{{auth()->user()->id}}" Class="form-control" type="hidden"/>
								
							

							<div>
								<label>Tipo Institución<span class="text-danger">*</span></label>
								<select  class="form-control" v-model="tipins"  id="tipins" name="tipins">
									{{--<select  v-model="tipins" class="select" id="tipins" name="tipins"  class="form-select" aria-label="Default select example">--}}
									<option  value="1" >Gobierno</option>
									<option  value="2">Iniciativa privada</option>
									<option  value="3">Catedratico</option>
									<option  value="4">Particular</option>
									<option  value="5">Estudiante</option>
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
			<!-- /Add Leave Modal -->
			