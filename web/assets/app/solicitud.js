$(document).ready(function(){
    $("#formsolicitud").on("submit",function (e) {
        e.preventDefault();
        var titulo = ($("#titulo").val() != "")?$.trim($("#titulo").val()):"";
        var descripcion = ($("#descripcion").val() != "")?$.trim($("#descripcion").val()):"";
        var campoafin = ($("#campoafin").val() != "")?$.trim($("#campoafin").val()):"";

        if(titulo != "" && descripcion != "" && campoafin > 0){
            var Data = {
                titulo:titulo,
                descripcion:descripcion,
                campoafin:campoafin
            };

            var url = 'http://insys/app_dev.php/rest/solicitudes';
            fetch(url, {
                method: 'POST',
                body: JSON.stringify(Data),
                headers:{
                    'Content-Type': 'application/json'
                }
            }).then(function(res){
                if (res.ok) {
                    return res.json();
                }
                throw new Error('Problema al comunicarse con el servidor<br>Comunicarse con el departamento de TI');
            })
                .then((response) => {
                    console.log(response);
                    // if(response.error){
                    //     alert(reponse.message,"danger");
                    // }else{
                    //     alert("Data insertada");
                    //
                    // }
                })
                .catch((error) => {
                    console.log(error.message);
                });

            console.log(Data);
        }else{
            alert("Campos requeridos");
            $("#titulo").focus();
        }


    })
})