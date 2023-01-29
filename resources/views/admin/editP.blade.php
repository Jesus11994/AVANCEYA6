	<!-- Edit Leave Modal -->
    <div id="edit_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Participantes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label>Nombre <span class="text-danger">*</span></label>
                            <input  v-model="nombre"  id="txtnombre"  name="txtnombre" value="{{ old('txtnombre') }}" Class="form-control" type="text"/>
                        @error('txtnombre')
                            <div class="alert alert-danger">Favor de agregar su nombre</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Apellido Paterno <span class="text-danger">*</span></label>
                            <input  v-model="apep" id="txtApeP" name="txtApeP" value="{{ old('txtApeP') }}" Class="form-control" type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Apellido Materno <span class="text-danger">*</span></label>
                            <input  v-model="apem" id="txtApemat" name="txtApemat" value="{{ old('txtApemat') }}" Class="form-control" type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input v-model="email" id="txtemail" name="txtemail" value="{{ old('txtemail') }}" type="email" Class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Número Telefonico <span class="text-danger">*</span></label>
                            <input v-model="tel" id="txtTelefono" name="txtTelefono" value="{{ old('txtTelefono') }}" Class="form-control"  type="tel"/>
                        </div>
                        <div class="form-group">
                            <label>Segundo Telefono <span class="text-danger">*</span></label>
                            <input v-model="teldos"  id="txtNomins" name="txtNomins" value="{{ old('txtNomins') }}" Class="form-control"  type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Ext. Telefono <span class="text-danger">*</span></label>
                            <input v-model="exttel"  id="txtNomins" name="txtNomins" value="{{ old('txtNomins') }}" Class="form-control"  type="text"/>
                        </div>
                        <div >
                            <label>Confirmo Participación por otro medio <span class="text-danger">*</span></label>
                            <select class="form-control" v-model="enviconfir" class="form-select" id="enviconfir" name="enviconfir"  aria-label="Default select example">
                                {{--<select  v-model="tipins" class="select" id="tipins" name="tipins"  class="form-select" aria-label="Default select example">--}}
                                <option  value="1" >Si</option>
                                <option  value="0">No</option>
                            </select>
                        </div>
                        
                        <div >
                            <label>Tipo Participante<span class="text-danger">*</span></label>
                            <select class="form-control" v-model="tipoparti" class="form-select" id="tipoparti" name="tipoparti"  aria-label="Default select example">
                                {{--<select  v-model="tipins" class="select" id="tipins" name="tipins"  class="form-select" aria-label="Default select example">--}}
                                <option  value="1" >INTERESADO</option>
                                <option  value="2">INVITADO</option>
                                <option  value="3">CLIENTE</option>
                                <option  value="4">PONENTE</option>
                            </select>
                        </div>
                        <div >
                            <label>Tipo Institución<span class="text-danger">*</span></label>
                            <select class="form-control" v-model="tipins" class="form-select" id="tipins" name="tipins"  aria-label="Default select example">
                                {{--<select  v-model="tipins" class="select" id="tipins" name="tipins"  class="form-select" aria-label="Default select example">--}}
                                <option  value="1" >Gobierno</option>
                                <option  value="2">Iniciativa privada</option>
                                <option  value="3">Catedratico</option>
                                <option  value="4">Particular</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Dirección <span class="text-danger">*</span></label>
                            <input v-model="direccion"  id="txtNomins" name="txtNomins"  Class="form-control"  type="text"/>
                        </div>

                        
                        <div class="form-group">
                            <label>Identificación <span class="text-danger">*</span></label>
                            <input v-model="identifica"  id="txtNomins" name="txtNomins"  Class="form-control"  type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Grado de  Estudio <span class="text-danger">*</span></label>
                            <input v-model="Nestudio"  id="txtNomins" name="txtNomins"  Class="form-control"  type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Onomastico <span class="text-danger">*</span></label>
                            <input v-model="Onomas"  id="txtNomins" name="txtNomins"  Class="form-control"  type="text"/>
                        </div>
                        

                        <div class="submit-section">
                            <button v-on:click="editarenvusuario()" class="btn btn-primary submit-btn" >Guardar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Leave Modal -->
