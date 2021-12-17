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
                        <a class="list-group-item list-group-item-action active" href="#transfer" aria-controls="transfer" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>Division transfer</a>
                        <a class="list-group-item list-group-item-action" href="#restriccion" aria-controls="restriccion" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>Restriction in Argentina Division</a>
                        <a class="list-group-item list-group-item-action" href="#solicitud" aria-controls="solicitud" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>Transfer request</a>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="transfer">
                            <h2>Division Transfer</h2>

                            <div class="separacion-tablas"></div>

                            <p style="text-align: justify">
                                A member may request a division transfer at any time.
                            </p>
                            <p style="text-align: justify">
                                However, the division transfer is not a right and all transfers must be approved by the HQ of division where the member request to be transferred to.</p>

                            <p style="text-align: justify">
                                The HQ of the member's actual division is not asked to express its opinion on accepting of refusing the transfer. In all cases, the HQ department of the destination division is the only final responsible of the approval or the refusal of a division transfer.                            </p>

                            <p style="text-align: justify">
                                Only one transfer is allowed over a period of 12 months.
                            </p>

                            <p style="text-align: justify">
                                In case a member has a pending practical exam, no division transfer request from this member is treated until the exam is validated or cancelled.                            </p>

                            <p style="text-align: justify">
                                Before asking for a division transfer, it is wise that the member contact the division he/she wishes to join in order to get all relevant information regarding eventual restrictions.
                            </p>




                        </div>
    
                        <div role="tabpanel" class="tab-pane" id="restriccion">
                            <h2>Specific restriction in Argentina Division</h2>
                            
                            <p style="text-align: justify">
                                Members wishing to leave Argentina division, for whatever reason, <strong>should consider their transfer as mostly permanent.</strong> A come back in Argentina division is eventually possible but it is submitted to a deep evaluation from AR-HQ in order to avoid any abuse.                            </p>

                            <p style="text-align: justify">
                                Members wishing to join Argentina division must send their motivations to <a class="text-info" href="mailto:ar-hq@ivao.aero"><strong>ar-hq@ivao.aero</strong></a>. Any transfer request not consisting of reasonable motivations is refused.
                            </p>

                            <p style="text-align: justify">
                                <strong>The management of the division has the right to reject, without any justification, any transfer to the Argentina division.</strong>
                            </p>

                        </div>
    
                        <div role="tabpanel" class="tab-pane" id="solicitud">
                            <h2>Transfer request</h2>

                            <p style="text-align: justify">
                                All transfer requests must be send by mail as indicated below, for lack of which it is not treated. 
                            </p>

                            <p style="text-align: justify">
                                <strong>Attention: the mail address indicated in your IVAO profile must be used for all transfer requests, for lack of which they are rejected.</strong>
                            </p>

                            <p style="text-align: justify">
                                Main recipients: <strong class="text-info">xx-hq@ivao.aero</strong> y <strong class="text-info"> yy-hq@ivao.aero</strong>
                                <br>
                                <div style="color: red">*Where <strong>"xx"</strong> is the 2-letter code of your current division and <strong>"yy"</strong> is the 2-letter code of the division you request to join. The 2-letter code of Argentina division is "ar"</div>
                            </p>

                            <p style="text-align: justify">
                                Recipient in copy (CC): <strong class="text-info">members@ivao.aero</strong>  (HQ Membership department)

                            </p>

                            <p style="text-align: justify">
                                Object of the mail: Division Change ID 123456 (where "123456" is your IVAO VID)
                            </p>

                            <p style="text-align: justify">
                                Text of the mail <strong>IN ENGLISH</strong> indicating the reasons of your request
                            </p>

                            <p style="text-align: justify">
                                This procedure is also available on the HQ forum.
                            </p>



                        </div>
                    </div>   
                </div>


            </div>

    
        </div>
    </div>


</div>

@endsection