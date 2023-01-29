<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje Enviado</title>
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
                               
                                <p class="text-secondary"> Folio: <b>{{$datosE->Folio_parti}}</b></p>
                                <p class="text-secondary"> Nombre: <b>{{$datosE->nombre_C}} {{$datosE->apep_C}} {{$datosE->apem_C}}</b></p>
                                <p class="text-secondary"> Nombre Institución: <b>{{$datosE->Nom_Ins }}</b></p>
                                {{--
                                <p class="text-secondary"> Login: <b>{{$datosE->login_C}}</b></p>
                                <p class="text-secondary"> Contraseña: <b>{{$datosE->pass}}</b></p>
                            --}}
                            
                                
                                    <p class="text-secondary" style="text-align: left">Muchas gracias por registrarte al:.</p>
                                        <br>
                                        <p class="text-secondary" style="text-align: left"><b>6to. Congreso Nacional Fiscal y Capital Humano Riviera Maya 2023</b> </p>
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
                                                <li>Claudia López. 984 110 80 65. y 984 109 41 30.</li> 
                                               
                                            </ul>

                                        <p class="text-secondary" style="text-align: left"><b>Mtro.Octavio Ávila Chaurand.</b></p>
                                        <p class="text-secondary" style="text-align: left"><b>Director de Avance Ya  Consultores Empresariales.</b></p>
                                                <div   class="form-group">
                                                      <b><p class="text-secondary"> Para confirmar tu participación, ingresa <a href="{{url('http://sistema.avanceya.com/Evento/public/register/verify/'.$datosE->confirmmail)}}" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true"><b>AQUÍ</b></a></p></b>
                                                </div>
                                        <img style='display:block;margin-left: auto; margin-right: auto;' src='http://avanceya.com/images/2023/congreso6/bannercongreso6b.jpg?width=1000&height=600' />

   
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