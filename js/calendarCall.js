// GUI = InterfazDeUsuario
// webCalendar = calendar

$(document).ready(function(){
    $('#calendar').fullCalendar({
        header:{
            left: 'today,prev,next',
            center: 'title',
            right:'month,basicWeek, basicDay, agendaWeek, agendaDay'
        },
        
        dayClick:function(date,jsEvent,view){

            $('#btnAgregar').prop("disabled",false);
            $('#btnModificar').prop("disabled",true);
            $('#btnEliminar').prop("disabled",true);

            limpiarformulario();
            $('#txtFecha').val(date.format());
            $("#ModalEventos").modal();
        },
        
        events:"assets/mostrarEventos.php",

           /* eventSources:[{
                events:[
                    {
                    id:3,
                    title:"Evento3",
                    descripcion:"Descripcion3",
                    color:"#F3BCD3",
                    textColor:"#FFFFFF",
                    start:'2018-12-13',
                    end:'2018-12-14'
                },
                {
                    id:4,
                    title:"Evento4",
                    descripcion:"Descripcion4",
                    color:"#03BCD3",
                    textColor:"#FFFFFF",
                    start:'2018-12-14',
                    end:'2018-12-14'
                },
                {
                    id:5,
                    title:"Evento5",
                    descripcion:"Descripcion5",
                    color:"#F3FDD8",
                    textColor:"#FF0000",
                    start:'2018-12-15',
                    end:'2018-12-16'
                },
                ]
            }],*/

            
                   

        eventClick:function(calEvent,jsEvent,view){

            $('#btnAgregar').prop("disabled",true);
            $('#btnModificar').prop("disabled",false);
            $('#btnEliminar').prop("disabled",false);

            // H2
            $('#tituloEvento').html(calEvent.title);

            // Mostrar la información del evento en los inputs
            $('#txtDescripcion').val(calEvent.descripcion);
            $('#txtID').val(calEvent.id);
            $('#txtTitulo').val(calEvent.title);
            $('#txtColor').val(calEvent.color);

            FechaHora= calEvent.start._i.split(" ");
            $('#txtFecha').val(FechaHora[0]);
            $('#txtHora').val(FechaHora[1]);

            $('#ModalEventos').modal();
        },

        editable:true,
        eventDrop:function(calEvent){
            $('#txtID').val(calEvent.id);
            $('#txtTitulo').val(calEvent.title);
            $('#txtColor').val(calEvent.color);
            $('#txtDescripcion').val(calEvent.descripcion);

            var FechaHora=calEvent.start.format().split("T");
            $('#txtFecha').val(FechaHora[0]);
            $('#txtHora').val(FechaHora[1]);

            RecolectarDatosGUI();
            EnviarInformacion('modificar',NuevoEvento,true);
            
        }

        

    });
    var NuevoEvento;

    $('#btnAgregar').click(function(){
        RecolectarDatosGUI();
        
        //$('#calendar').fullCalendar('renderEvent',NuevoEvento );
        //reemplazo por enviarinformacion
        EnviarInformacion('agregar',NuevoEvento);
    });

    $('#btnEliminar').click(function(){
        RecolectarDatosGUI();
        //$('#calendar').fullCalendar('renderEvent',NuevoEvento );
        //reemplazo por enviarinformacion
        EnviarInformacion('eliminar',NuevoEvento);
    });

    $('#btnModificar').click(function(){
        RecolectarDatosGUI();
        //$('#calendar').fullCalendar('renderEvent',NuevoEvento );
        //reemplazo por enviarinformacion
        EnviarInformacion('modificar',NuevoEvento);
    });


    function RecolectarDatosGUI(){
        
        NuevoEvento= {
            id:$('#txtID').val(),
            title:$('#txtTitulo').val(),
            start:$('#txtFecha').val()+" "+$('#txtHora').val(),
            color:$('#txtColor').val(),
            descripcion:$('#txtDescripcion').val(),
            textColor:'#FFFFFF',
            // Para la misma información.
            // (Si quiero enviar otra información que determine start y end hay que declarar un segundo valor de fecha y hora.)
            end:$('#txtFecha').val()+" "+$('#txtHora').val(),
        };


    }

    function EnviarInformacion(accion,objEvento, modal){
        $.ajax({
            type:'POST',
            url:'assets/abm_eventos.php?accion='+accion,
            data:objEvento,
            success:function(msg){
                if(msg){
                    $('#calendar').fullCalendar('refetchEvents');
                    if(!modal){
                    $("#ModalEventos").modal('toggle');
                    }
                }
            },
            error(){
                alert("hay un error wn");
            }

        });
    }

    $('.clockpicker').clockpicker();

    function limpiarformulario(){
        $('#txtID').val('');
        $('#txtTitulo').val('');
        $('#txtColor').val('');
        $('#txtDescripcion').val('');

    }

});


