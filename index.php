<?php
  session_start();
  require "assets/config.php";
  


?>
<!DOCTYPE html> 
  <html> 
  <head> 
      <meta charset="utf-8" /> 
      <title>Agenda Cultural</title> 

      <link rel="stylesheet" href="css/bootstrap.min.css" />

      <link rel="stylesheet" href="node_modules/fullcalendar/dist/fullcalendar.min.css" />

      <link rel="stylesheet" href="css/bootstrap-clockpicker.css"/>

      <link rel="stylesheet" href="css/ajustes.css"/>

      <link rel="x-icon" href="img/favicon.jpg"/>

  </head> 
  <body> 
    <header>
      <h1>
        Agenda Cultural
      </h1>
    </header>

    <nav id="navBar">
      <span class="topDate">
        <?php echo "Hoy es: ". date("d/m/Y"); ?>
        
      </span>

      <span class="topDate"> Mes y flechas? </span>
    </nav>

    <section id="sideBar">
      Texto y filtros
    </section>

    <section id="cal">
      <div class="container">
        <div class ="row">
          <div class="col"></div>
          <div class="col-8"><div id="calendar"></div></div>
         
        </div>
      </div>

      <!-- Modal (agregar, modificar, borrar, etc) -->
      <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tituloEvento">Agregar Título</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <input type="hidden" id="txtID" name="txtID" /><br>
              <input type="hidden" id="txtFecha" name="txtFecha" /><br>

              <div class="form-row">

                <div class="form-group col-md-8">
                  <label>Título: </label>
                  <input type="text" id="txtTitulo" class="form-control" placeholder="Título del Evento" />
                </div>
                
                <div class="form-group col-md-4">
                  <label>Hora del evento: </label>

                  <div class="input-group clockpicker" data-autoclose="true">
                    <input type="text" id="txtHora" value="10:30" class="form-control" />
                  </div>

                </div>
              </div>

              <div class="form-group">
                <label>Descripción: </label>
                <textarea id="txtDescripcion" rows="3" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label>Color: </label>
                <input name="txtColor" id="txtColor" value="#ff0000" class="form-control jscolor {required:false}" style="height: 36px" />
              </div>
              
            </div>

            <div class="modal-footer">

              <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
              <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
              <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              
            </div>
          </div>
        </div>
      </div>
      
      <script src="node_modules/jquery/dist/jquery.min.js"></script>

      <script src="node_modules/moment/min/moment.min.js"></script>  

      <script src="node_modules/fullcalendar/dist/fullcalendar.min.js"></script>

      <script src="node_modules/fullcalendar/dist/locale/es.js"></script>
      
      <script src="js/popper.min.js"></script>
      
      <script src="js/bootstrap.min.js"></script>

      <script src="js/calendarCall.js"></script>

      <script src="js/bootstrap-clockpicker.js"></script>

      <script src="js/jscolor.js"></script>

    </section>
    
    <footer>
      Proyecto Final - Tadeo Chaves Painefil
    </footer>
  </body> 
  </html>