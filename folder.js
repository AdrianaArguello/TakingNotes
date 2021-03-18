$(function(){
    var activeFolder = 0;
    var oldFolder = '';
    var editMode = false;

    $.ajax({
        url: "foldercrud/loaddirectory.php",
        success: function (data){
            $('#folders').html(data);
            clickonFolder(); clickonDelete();
        },
        error: function(){
            $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
            $("#alert").fadeIn();
        }
    });

    $('#addFolder').click(function() {
        $.ajax({
            url: "foldercrud/createFolder.php",
            type: "POST",
            data: {foldername: 'default', id: activeFolder},
            success: function(data){
                if((/true/i).test(data)) {
                    oldFolder = 'default-0';
                    activeFolder = 0;
                    $("textarea").val("");
                    showHide(["#folderPad", "#rename"], ["#folders", "#table", "#addFolder", "#edit", "#done"]);
                    $("textarea").focus();
                } else if ((/false/i).test(data)) {
                    $('#alertContent').text("Error al crear un nuevo directorio.");
                    $("#alert").fadeIn();
                }
            },
            error: function(){
                $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
                $("#alert").fadeIn();
            }
        });
    });

    $("#rename").click(function(){
        update();
        showHide(["#folderPad", "#allfolders"], ["#folders", "#table", "#addFolder", "#edit", "#done", "#rename"]);
    });

    // $("textarea").keyup(function(){
    //     showHide(["#folderPad", "#rename"], ["#folders", "#table", "#addFolder", "#edit", "#done", "#allfolders"]);
    // })

    function update(){
        $.ajax({
            url: "foldercrud/updateFolder.php",
            type: "POST",
            data: {foldername: $("textarea").val(), oldfolder: oldFolder},
            success: function (data){
                if ((/true/i).test(data)) {
                    $('#success').text("Se guardo correctamente el nombre del directorio");
                    $("#success").fadeIn();
                } else if ((/false/i).test(data)) {
                    $('#alertContent').text("Hubo un problema al renombrar el directorio!");
                    $("#alert").fadeIn();
                } else {
                    showHide(["#folderPad", "#rename"], ["#folders", "#table", "#addFolder", "#edit", "#done", "#allfolders"]);
                    $('#alertContent').text(data);
                    $("#alert").fadeIn();
                }
            },
            error: function(){
                $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
                $("#alert").fadeIn();
            }
        });
    }

    $("#allfolders").click(function(){
        $("#alert").fadeOut();
        $("#success").fadeOut();
        $.ajax({
            url: "foldercrud/loaddirectory.php",
            success: function (data){
                $('#folders').html(data);
                showHide(["#addFolder", "#edit", "#folders", "#table"], ["#allfolders", "#rename", "#folderPad"]);
                clickonFolder(); clickonDelete();
            },
            error: function(){
                $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
                $("#alert").fadeIn();
            }
        });
    });

    $("#done").click(function(){
        editMode = false;
        // $(".folderheader").removeClass("col-xs-7 col-sm-9");
        showHide(["#edit"],[this, ".delete", ".action"]);
    });

    $("#edit").click(function(){
        editMode = true;
        // $(".folderheader").addClass("col-xs-7 col-sm-9");
        showHide(["#done", ".delete", ".action"],[this]);
    });

    function clickonFolder() {
        $(".folderheader").click(function(){
            if(!editMode){
                oldFolder = $(this).attr("id");
                $("textarea").val(oldFolder);
                showHide(["#folderPad", "#rename", "#allfolders"], ["#folders", "#table", "#addFolder", "#edit", "#done"]);
                $("textarea").focus();
            }
        });
    }

    function clickonDelete(){
        $(".delete").click(function(){
            var deleteButton = $(this);
            $.ajax({
                url: "foldercrud/deleteFolder.php",
                type: "POST",
                data: { foldername:deleteButton.prev().prev().prev().attr("id")},
                success: function (data) {
                    if((/true/i).test(data)) {
                        deleteButton.parent().remove();
                    } else if ((/false/i).test(data)) {
                        $('#alertContent').text("Error al borrar el directorio");
                        $("#alert").fadeIn();
                    }
                },
                error: function(){
                    $('#alertContent').text(data);
                    $("#alert").fadeIn();
                }
            });
        });
    }

    function showHide(array1, array2){
        for(i=0; i<array1.length; i++){
            $(array1[i]).show();
        }
        for(i=0; i<array2.length; i++){
            $(array2[i]).hide();
        }
    };

});