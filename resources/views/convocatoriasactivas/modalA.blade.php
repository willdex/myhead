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

                       <?php $convo = DB::select('SELECT * FROM convocatoria WHERE estado="activa"'); 
                   ?>
                    
                    {!!Form::label('titulo','Convocatorias Activas:')!!}
                  <select name="asunto" id="asunto" class="form-control selectpicker" data-live-search="true" required>
                    <option value=""> Seleccione la Convocatoria... </option>
                      @foreach($convo as $movC)
                        <option value="{{$movC->titulo}}">{{$movC->titulo}}</option>
                      @endforeach
                  </select>
                  <br><br>

                    <label style="font-size: 18px;">Mensaje:</label>
                    <textarea class="form-control" rows="5" name="mensaje" id="mensaje" placeholder="Mensaje" required style="border-radius: 5px; width: 100%;"></textarea>

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
