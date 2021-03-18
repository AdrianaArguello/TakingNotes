$(function(){
    var activeNote = 0;
    var editMode = false;

    // FUNCIONA
    $.ajax({
        url: "loadnotes.php",
        success: function (data){
            $('#notes').html(data);
            clickonNote(); clickonDelete();
        },
        error: function(){
            $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
            $("#alert").fadeIn();
        }
    });

    // FUNCIONA
    $('#addNote').click(function() {
        $.ajax({
            url: "createnote.php",
            success: function(data){
                console.log(data);
                if(data == 'error'){
                    $('#alertContent').text("Hubo un problema al insertar la nueva nota en la base de datos!");
                    $("#alert").fadeIn();
                }else{
                    activeNote = data;
                    $("textarea").val("");
                    showHide(["#notePad", "#allNotes"], ["#notes", "#addNote", "#edit", "#done"]);
                    $("textarea").focus();
                }
            },
            error: function(){
                $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
                $("#alert").fadeIn();
            }
        });
    });

    // FUNCIONA
    $("textarea").keyup(function(){
        $.ajax({
            url: "updatenote.php",
            type: "POST",
            data: {note: $(this).val(), id:activeNote},
            success: function (data){
                if(data == 'error'){
                    $('#alertContent').text("Hubo un problema al actualizar la nota en la base de datos!");
                    $("#alert").fadeIn();
                }
            },
            error: function(){
                $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
                $("#alert").fadeIn();
            }
        });
    });

    $("#allNotes").click(function(){
        $.ajax({
            url: "loadnotes.php",
            success: function (data){
                $('#notes').html(data);
                showHide(["#addNote", "#edit", "#notes"], ["#allNotes", "#notePad"]);
                clickonNote(); clickonDelete();
            },
            error: function(){
                $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
                $("#alert").fadeIn();
            }
        });
    });

    $("#done").click(function(){
        editMode = false;
        $(".noteheader").removeClass("col-xs-7 col-sm-9");
        showHide(["#edit"],[this, ".delete"]);
    });

    $("#edit").click(function(){
        editMode = true;
        $(".noteheader").addClass("col-xs-7 col-sm-9");
        showHide(["#done", ".delete"],[this]);
    });

    function clickonNote() {
        $(".noteheader").click(function(){
            if(!editMode){
                activeNote = $(this).attr("id");
                $("textarea").val($(this).find('.text').text());
                showHide(["#notePad", "#allNotes"], ["#notes", "#addNote", "#edit", "#done"]);
                $("textarea").focus();
            }
        });
    }

    // FUNCIONA
    function clickonDelete(){
        $(".delete").click(function(){
            var deleteButton = $(this);
            $.ajax({
                url: "deletenote.php",
                type: "POST",
                data: {id:deleteButton.next().attr("id")},
                success: function (data) {
                    if(data == 'error'){
                        $('#alertContent').text("Hubo un problema al borrar la nota de la base de datos.");
                        $("#alert").fadeIn();
                    } else {
                        deleteButton.parent().parent().remove();
                    }
                },
                error: function(){
                    $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
                    $("#alert").fadeIn();
                }
            });
        });
    }

    // FUNCIONA
    function showHide(array1, array2){
        for(i=0; i<array1.length; i++){
            $(array1[i]).show();
        }
        for(i=0; i<array2.length; i++){
            $(array2[i]).hide();
        }
    };

});