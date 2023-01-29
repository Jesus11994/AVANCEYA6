<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


   {{--
    <script src="{{asset('js/CheckPassword.js')}}"></script>
    <link href="{{asset('css/CheckPassword.css')}}" rel="stylesheet" />
   --}}
    <title>Registro</title>
</head>
<body>
    <form  action="{{ route("index.guardar")}}" method="POST">
        @csrf
        <div class="container py-3">
           
            <div class="row">
                <div class="col-md-12">            
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>Si cuenta con un boleto físico, ingrese el folio:</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                            </div>
                                            <input id="txtfolio"  name="txtfolio" value="{{ old('txtfolio') }}" Class="form-control" type="text"/>
                                            
                                        </div>
                                    
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        <div class="container py-3">
           
            <div class="row">
                <div class="col-md-12">            
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card border-secondary">
                                

                                <div class="card-header">
                                    <h3 class="mb-0 my-2">Registro</h3>
                                </div>
                                
                                
                                @if ($mensaje ?? '' > 0)
                                <div id="mensajes" class="alert alert-danger" role="alert">
                                    {{$mensaje}}
                                  </div>
                                @endif
                                
                                   
                              
                                
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input id="txtnombre"  name="txtnombre" value="{{ old('txtnombre') }}" Class="form-control" type="text"/>
                                            
                                        </div>
                                        @error('txtnombre')
                                            <div class="alert alert-danger">Favor de agregar su nombre</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input id="txtApeP" name="txtApeP" value="{{ old('txtApeP') }}" Class="form-control" type="text"/>
                                        </div>
                                        @error('txtApeP')
                                            <div class="alert alert-danger">Favor de agregar su Primer Apellido</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input  id="txtApemat" name="txtApemat" value="{{ old('txtApemat') }}" Class="form-control" type="text"/>
                                        </div>
                                        @error('txtApemat')
                                            <div class="alert alert-danger">Favor de agregar su Segundo Apellido</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                            </div>
                                            <input id="txtemail" name="txtemail" value="{{ old('txtemail') }}" type="email" Class="form-control"/>
                                        </div>
                                        @error('txtemail')
                                        <div class="alert alert-danger">Favor de agregar un correo</div>
                                    @enderror
                                    </div>
                                    {{--
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                            </div>
                                            <input  id="txtpasword" name="txtpasword" value="{{ old('txtpasword') }}" type="password" Class="form-control"/>
                                        </div>
                                        <div ID="strengthMessage"></div>
                                    </div>
                                --}}
                                    <div class="form-group">
                                        <label>Numero Telefonico</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <input  id="txtTelefono" name="txtTelefono" value="{{ old('txtTelefono') }}" Class="form-control"  type="tel"/>
                                        </div>
                                        @error('txtTelefono')
                                        <div class="alert alert-danger">Favor agregar un Telefono</div>
                                    @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tipo Institución</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                            </div>
                                                <select id="txttipoIns" name="txttipoIns" value="{{ old('txttipoIns') }}" class="form-select" aria-label="Default select example" Class="form-control">
                                                <option value="1" selected>Gobierno</option>
                                                <option value="2">Iniciativa privada</option>
                                                <option value="3">Catedratico</option>
                                                <option value="4">Particular</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Nombre Institución</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-university"></i></span>
                                            </div>
                                            <input  id="txtNomins" name="txtNomins" value="{{ old('txtNomins') }}" Class="form-control"  type="text"/>
                                        </div>
                                        @error('txtNomins')
                                        <div class="alert alert-danger">Favor agregar lugar de trabajo de procedencia</div>
                                        @enderror
                                    </div>
                                  
                                 
                                    <div class="form-group">
                                        <button  type="submit" id="" class="btn btn-success float-right rounded-0">Registrar</button>
                                    </div>

                                    
                                    <div class="form-group">
                                        
                                    <a href="{{route("index.recu")}}" target="_blank">Recuperar Usuario</a>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
   
</body>
<script>
/*
$("#mensajes").fadeTo(10000, 6000).slideUp(6000, function(){
    $("#mensajes").slideUp(6000);
});
*/
</script>


</html>