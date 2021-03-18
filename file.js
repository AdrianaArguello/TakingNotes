$(function(){
    var activeFile = 0;
    var oldFile = 'datos.txt';
    var editMode = false;

    $.ajax({
        url: "foldercrud/loadfiles.php",
        success: function (data){
            $('#files').html(data);
            clickonFile(); clickonDelete();
        },
        error: function(){
            $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
            $("#alert").fadeIn();
        }
    });

    $.ajax({
            url: "foldercrud/getfiles.php",
            success: function (data){
                $('#foldername').html(data);
            },
            error: function(){
                $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
                $("#alert").fadeIn();
            }
        });


    $('#addFile').click(function() {
        $("#filename").prop('disabled', false);
        $("#foldername").prop('disabled', false);
        showHide(["#folderPad","#allfiles",], ["#folders", "#table", "#addFile", "#edit", "#done", "#rename"]);
    });

    $("#form").submit(function(event){
        event.preventDefault();
        showHide(["#folderPad", "#allfiles"], ["#folders", "#table", "#addFile", "#edit", "#done", "#rename"]);
        var datatopost = $(this).serializeArray();
        $.ajax({
                url: "foldercrud/createFile.php",
                type: "POST",
                data: datatopost,
                success: function(data){
                    data = JSON.parse(data);
                    if(data.code === 200) {
                        activeFile = 0;
                        $("filename").val("");
                        $("filecontent").val("");
                        $('#success').text(data.mensaje);
                        $("#asuccess").fadeIn();
                    } else if(data.code === 404) {
                        $('#alertContent').text(data.mensaje);
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
        $.ajax({
            url: "foldercrud/updateFile.php",
            type: "POST",
            data: {filename: $('#filename').val(), filecontent: $('#filecontent').val(),
            foldername: $('#foldername').val()},
            success: function (data){
                data = JSON.parse(data);
                if(data.code === 200) {
                    activeFile = 0;
                    $('#success').text(data.mensaje);
                    $("#asuccess").fadeIn();
                } else if(data.code === 404) {
                    $('#alertContent').text(data.mensaje);
                    $("#alert").fadeIn();
                }
            },
            error: function(){
                $('#alertContent').text("Hubo un error con la llamada Ajax. Por favor, inténtelo de nuevo más tarde.");
                $("#alert").fadeIn();
            }
        });
        showHide(["#folderPad", "#allfiles"], ["#folders", "#table", "#addFile", "#edit", "#done", "#rename"]);
    });

    $("#allfiles").click(function(){
        $("#alert").fadeOut();
        $("#asuccess").fadeOut();
        $.ajax({
            url: "foldercrud/loadfiles.php",
            success: function (data){
                $('#files').html(data);
                showHide(["#addFile", "#edit", "#files", "#table"], ["#allfiles", "#rename", "#folderPad"]);
                clickonFile(); clickonDelete();
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

    function clickonFile() {
        $(".folderheader").click(function(){
            if(!editMode){
                var filename = $(this).attr("id");
                filename = filename.replace(".txt", "");
                $("#filename").val(filename);
                var a = $(this).parents("tr").find(".folderpath").attr("id");
                a = a.substring(0,a.length - 1);
                $("#foldername").val(a).change();
                obtenerContenido(filename,a);
                $("#filename").prop('disabled', true);
                $("#foldername").prop('disabled', true);
                showHide(["#folderPad", "#rename","#allfiles"], [".send", "#files", "#table", "#addFile", "#edit", "#done"]);
            }
        });
    }

    function obtenerContenido(filename, a) {
        console.log(filename, a);
        $.ajax({
            url: "foldercrud/getFile.php",
            type: "POST",
            data: { filename: filename, foldername: a },
            success: function (data) {
                data = JSON.parse(data);
                if(data.code === 200) {
                    $("#filecontent").val(data.contenido);
                } else if (data.code === 404) {
                    $('#alertContent').text(data.mensaje);
                    $("#alert").fadeIn();
                }
            },
            error: function(){
                $('#alertContent').text(data);
                $("#alert").fadeIn();
            }
        });
    }

    function clickonDelete(){
        $(".delete").click(function(){
            var deleteButton = $(this);
            var filename = deleteButton.parents("tr").find(".folderheader").attr("id");
            filename = filename.replace(".txt", "");
            var a = $(this).parents("tr").find(".folderpath").attr("id");
            a = a.substring(0,a.length - 1);
            console.log(filename+" "+a);

            $.ajax({
                url: "foldercrud/deleteFile.php",
                type: "POST",
                data: { filename: filename, folder: a },
                success: function (data) {
                    data = JSON.parse(data);
                    if(data.code === 200) {
                        $('#success').text(data.mensaje);
                        $("#asuccess").fadeIn();
                        deleteButton.parent().remove();
                    } else if (data.code === 404) {
                        $('#alertContent').text(data.mensaje);
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