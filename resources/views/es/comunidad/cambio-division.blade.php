@extends('template')

@section('titulo')
<title>Transferencia de división :: IVAO Argentina</title>
@endsection

@section('contenido')

<div class="section">
    <div class="container marketing">
        <div class="tabla-novedades">
            <div class="row">
                <div class="col-sm-3">
                    <div class="list-group" role="tablist">
                        <a class="list-group-item list-group-item-action active" href="#transfer" aria-controls="transfer" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>Transferencia de división</a>
                        <a class="list-group-item list-group-item-action" href="#restriccion" aria-controls="restriccion" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>Restricción en la División Argentina</a>
                        <a class="list-group-item list-group-item-action" href="#solicitud" aria-controls="solicitud" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>Solicitud de transferencia</a>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="transfer">
                            <h2>Transferencia de división</h2>

                            <div class="separacion-tablas"></div>

                            <p style="text-align: justify">
                                Un miembro puede solicitar una transferencia de división en cualquier momento.   
                            </p>
                            <p style="text-align: justify">
                                Sin embargo, la transferencia de división no es un derecho y todas las transferencias deben ser aprobadas por la Dirección de la división a la que el miembro solicita ser transferido.
                            </p>

                            <p style="text-align: justify">
                                La división actual del miembro no es consultada para que exprese su opinión sobre la aceptación o rechazo de la transferencia. En todos los casos, la dirección de la división de destino es el único responsable final de la aprobación o el rechazo de una transferencia de división.
                            </p>

                            <p style="text-align: justify">
                                Solo se permite una transferencia durante un período de 12 meses.
                            </p>

                            <p style="text-align: justify">
                                En caso de que un miembro tenga un examen práctico pendiente, no se tratará ninguna solicitud de transferencia de división de este miembro hasta que el examen sea validado o cancelado.
                            </p>

                            <p style="text-align: justify">
                                Antes de solicitar una transferencia de división, es aconsejable que el miembro se comunique con la división a la que desea unirse para obtener toda la información relevante sobre posibles restricciones.
                            </p>




                        </div>
    
                        <div role="tabpanel" class="tab-pane" id="restriccion">
                            <h2>Restricción especifica en la División Argentina</h2>
                            
                            <p style="text-align: justify">
                                Los miembros que deseen abandonar la división de Argentina, por cualquier motivo, <strong>deben considerar su traslado como en su mayoría permanente.</strong> Un regreso a la división de Argentina es eventualmente posible, pero se somete a una evaluación profunda de AR-HQ para evitar cualquier abuso.
                            </p>

                            <p style="text-align: justify">
                                Los miembros que deseen unirse a la división Argentina deben enviar sus motivaciones a <a class="text-info" href="mailto:ar-hq@ivao.aero"><strong>ar-hq@ivao.aero</strong></a>. Se rechazará cualquier solicitud de transferencia que no tenga motivaciones razonables.
                            </p>

                            <p style="text-align: justify">
                                <strong>La Dirección de la División tiene el derecho a rechazar, sin ninguna justificación, cualquier transferencia a la división Argentina.</strong>
                            </p>

                        </div>
    
                        <div role="tabpanel" class="tab-pane" id="solicitud">
                            <h2>Solicitud de transferencia</h2>

                            <p style="text-align: justify">
                                Todas las solicitudes de transferencia deben ser enviadas por correo como se indica a continuación, por falta de la cual no se trata.
                            </p>

                            <p style="text-align: justify">
                                <strong>Atención: la dirección de correo indicada en su perfil de IVAO debe ser utilizada para todas las solicitudes de transferencia, por falta de las cuales son rechazadas.</strong>
                            </p>

                            <p style="text-align: justify">
                                Destinatarios principales: <strong class="text-info">xx-hq@ivao.aero</strong> y <strong class="text-info"> yy-hq@ivao.aero</strong>
                                <br>
                                <div style="color: red">*Donde <strong>"xx"</strong> es el código de 2 letras de su división actual e <strong>"yy"</strong> es el código de 2 letras de la división a la que solicita unirse. El código de 2 letras de la división Argentina es "AR"</div>
                            </p>

                            <p style="text-align: justify">
                                Destinatario en copia (CC): <strong class="text-info">members@ivao.aero</strong>  (Departamento de Membresía de HQ)

                            </p>

                            <p style="text-align: justify">
                                Objeto del correo: ID de cambio de división 123456 (donde "123456" es su IVAO VID)
                            </p>

                            <p style="text-align: justify">
                                Texto del correo <strong>EN INGLÉS</strong> indicando los motivos de su solicitud
                            </p>

                            <p style="text-align: justify">
                                Este procedimiento también está disponible en el foro del HQ.
                            </p>



                        </div>
                    </div>   
                </div>


            </div>

    
        </div>
    </div>


</div>

@endsection