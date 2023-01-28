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



    <title>Lista Participantes</title>
</head>
<body>
    
        <div class="container py-3">
           
            <div class="row">
                <div class="col-md-15">            
                    <div class="row">
                        <div class="col-md-15 mx-auto">
                            <div class="card border-secondary">
                                <div class="card-header">
                                    <h3 class="mb-0 my-2">Lista Participantes</h3>
                                </div>


                                <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido Paterno</th>
                                            <th scope="col">Apellido Materno</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Tipo Participante</th>
                                            <th scope="col">Tipo Dependencia</th>
                                            <th scope="col">Nombre Institución</th>
                                            <th scope="col">Fecha Registro</th>
                                            <th scope="col"></th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                @foreach($Liscat as $cat) 
                                              
                                            <tr>
                                            <th scope="row">{!! $cat->id_usuario !!}</th>
                                            
                                            <td>{!! $cat->nombre_C !!}</td>
                                            <td>{!! $cat->apep_C !!}</td>
                                            <td>{!! $cat->apem_C !!}</td>
                                            <td>{!! $cat->telefono_Cuno !!}</td>
                                            <td>{!! $cat->login_C !!}</td>
                                            <td>{!! $cat->desc_nivel!!}</td>
                                            <td>{!! $cat->descripcion!!}</td>
                                            <td>{!! $cat->Nom_Ins !!}</td>
                                            <td colspan="2">{!! date('d - m - y', strtotime($cat->created_at) )!!}</td>
                                            </tr>
                                    
                                             @endforeach
                                           
                                        </tbody>
                                        </table>

                                        <div class="form-group">
                                        
                                            <a  class="btn btn-success float-left rounded-0" href="{{route("index.inicio")}}" target="_blank">Registrar</a>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
   
</body>

</html>