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
    <title>Recuperar Usuario</title>
</head>
<body>
    <form  action="{{ route("index.recuser")}}" method="POST">
        @csrf
        <div class="container py-3">
           
            <div class="row">
                <div class="col-md-12">            
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card border-secondary">
                                <div class="card-header">
                                    <h3 class="mb-0 my-2">Recuperar Usuario</h3>
                                </div>
                                @if ($mensaje ?? '' > 0)
                                    <div id="mensajes" class="alert alert-success" role="alert">
                                        {{$mensaje}}
                                    </div>
                                @endif
                               
                            
                                <div class="card-body">        
                              

                                    <a>Favor de proporcionar su email y numero telefono con el que se registro</a>
                                    <br>
                                    <br>
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
                                        <button  type="submit" id="" class="btn btn-success float-right rounded-0">Enviar</button>
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

$("#mensajes").fadeTo(10000, 6000).slideUp(6000, function(){
    $("#mensajes").slideUp(6000);
});

</script>


</html>