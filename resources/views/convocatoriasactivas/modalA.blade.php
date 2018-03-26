@include('alerts.cargando')

@extends('layouts.cpanelp')

  @section('contenido')

<!-- Modal -->
<div id="ModalAdjuntar">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header" style="background: #3c8dbc; color: white">
        <h3 class="modal-title"><b>Envíe su Propuesta</b></h3>
      </div> 


            @if(Auth::user()->privilegio == 0)

              <div class="col-lg-6">

                <h3> Envíanos tu consulta </h3>

                {!!Form::open(['route'=>'correo.store', 'method'=>'POST','url'=>'/uploadfile','files'=>'true'])!!}

                  <div class="form-group">

                    <label style="font-size: 18px;">Asunto:</label><br>
                    <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" required style="border-radius: 5px; width: 85%;">

                        <br>

                    <label style="font-size: 18px;">Mensaje:</label>
                    <textarea class="form-control" rows="5" name="mensaje" id="mensaje" placeholder="Mensaje" required style="border-radius: 5px; width: 85%;"></textarea>

                    <input type="hidden" name="correo" value="<?php echo Auth::user()->correo; ?>">
                    

                          <input type="file" name="image" multiple />


                  </div>

                  <img src="images/cargando.gif" width="175" height="50" id="cargandoc" style="display: none;">

                  <button class="btn btn-lg btn-primary" type="submit" id="btnc" name="btnc">ENVIAR</button> <br><br>
         
                {!!Form::close()!!}

                @include('alerts.success')
                @include('alerts.errors')

              </div>

        @endif
              
 <script src="js/jquery.js"></script>

    {!!Html::script('js/myjs.js')!!}
    {!!Html::script('js/myjscargando.js')!!}
    <script>
     
      function activareditor(){   
        $("#contenido_mail").wysihtml5();
      };

      activareditor();
    </script>



    </div>
  </div>
</div>

       
 




@endsection
