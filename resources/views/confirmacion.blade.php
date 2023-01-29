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



    <title>Confirmación Registro</title>
</head>
<body>
    
        <div class="container py-3">
           
            <div class="row">
                <div class="col-md-12">            
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="card border-secondary">
                                <div class="card-header">
                                    <h3 class="mb-0 my-2">ACUSE DE REGISTRO</h3>
                                </div>
                                <div style="padding-left:20px;">
                                    <br>
                                   
                                    
                                    <p class="text-secondary"> Folio: <b>{!! $res_regis->Folio_parti !!}</b></p>
                                    <p class="text-secondary"> Nombre: <b>{!! $res_regis->nombre_C !!} {!! $res_regis->apep_C !!} {!! $res_regis->apem_C !!}</b></p>
                                    <p class="text-secondary"> Institución: <b>{!! $Nivel_P->descripcion !!}</b></p>
                                    
                                
                                    
                                        <p class="text-secondary" style="text-align: left">Muchas gracias por registrarte.</p>
                                        <br>
                                        <p class="text-secondary" style="text-align: left">El personal de Avance Ya se pondrá en contacto contigo muy pronto.
                                        </p>
                                        <br>
                                        {{--<p class="text-secondary" style="text-align: left">Costo del boleto:<b> $3,000.00 Mx.</b></p>--}}
                                        <p class="text-secondary" style="text-align: left">Lugar : "Teatro de la Ciudad”. Circuito Chinchorro entre Avenida 115 y 120, a un costado de Walmart de la Cruz. Playa del Carmen. Quintana Roo.
                                            "</p>
                                            <p class="text-secondary" style="text-align: left">Fechas: 9 y 10 de Febrero 2023.</p>
                                            <p class="text-secondary" style="text-align: left">Horarios:</p>
                                            <p class="text-secondary" style="text-align: left"> - 1er día: de  8:00 am. a 2:30 pm.</p>
                                            <p class="text-secondary" style="text-align: left"> - 2do día: de 9:00 am. a 2:30 pm.</p>
                                            <br>
                                            <p class="text-secondary" style="text-align: left">Contacto:</p>
                                            <ul class="text-secondary"> 
                                                <li >Correo electrónico: <a href="mailto:congresonacional@avanceya.com?subject=Questions"> congresonacional@avanceya.com</a> </li> 
                                                <li>Claudia López. 984 110 80 65. y 984 109 41 30</li> 
                                               
                                            </ul>
                                </div> 
                                    
                                <div   class="form-group">
                                
                                    <a  class="btn btn-success float-right rounded-0" href="http://avanceya.com/index.php/registro-al-6to-congreso" target="_blank">Nuevo Registro</a>
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