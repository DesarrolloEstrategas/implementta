var calle = false;
var noExt = false;
var codigoPostal = false;
var colonia = false;
var municipio = false;
var estado = false;
let today = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1;
let yyyy = today.getFullYear();

if (dd < 10) {
    dd = '0' + dd
}
if (mm < 10) {
    mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("fechaNacimiento").setAttribute("max", today);


(function () {
    let x = document.getElementsByClassName("get-current-year");
    for (let i = 0; i < x.length; i++) {
        x[i].innerHTML = new Date().getFullYear();
    }
})();

var openmodal = document.querySelectorAll('.modal-open')
for (var i = 0; i < openmodal.length; i++) {
    openmodal[i].addEventListener('click', function (event) {
        event.preventDefault()
        toggleModal()
    })
}

const overlay = document.querySelector('.modal-overlay')
overlay.addEventListener('click', toggleModal)

var closemodal = document.querySelectorAll('.modal-close')
for (var i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', toggleModal)
}

document.onkeydown = function (evt) {
    evt = evt || window.event
    var isEscape = false
    if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
        isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal();
    }
};

document.getElementById('aceptarTerminos').addEventListener('change', function (e) {
    if (document.getElementById('aceptarTerminos').checked) {
        $("#continuar").fadeIn(100);
    } else {
        $("#continuar").fadeOut(100);
    }
});

function toggleModal() {
    const body = document.querySelector('body');
    const modal = document.querySelector('.modal');
    modal.classList.toggle('opacity-0');
    modal.classList.toggle('pointer-events-none');
    body.classList.toggle('modal-active');
    document.getElementById('modal').scrollTo(0, 0);
}

$("#nombre").on("keyup paste", function () {
    validarNombre();
});

function validarNombre() {
    if ($('#nombre').val() == "") {
        $(".nombre-vacio").fadeIn(200);
        $("#nombre").removeClass('focus:ring-blue-900');
        $("#nombre").removeClass('border-grey-lighter');
        $("#nombre").addClass('border-red-900');
        $("#nombre").addClass('focus:ring-red-900');
        $("#nombre-label").removeClass('text-grey-darker');
        $("#nombre-label").addClass('text-red-700');

        return false;

    } else {
        $("#nombre").removeClass('focus:ring-red-900');
        $("#nombre").addClass('focus:ring-blue-900');
        $("#nombre").removeClass('border-red-900');
        $("#nombre").addClass('border-grey-lighter');
        $(".nombre-vacio").fadeOut(200);
        $("#nombre-label").addClass('text-grey-darker');
        $("#nombre-label").removeClass('text-red-700');

        return true;
    }
}

$("#apellidoPaterno").on("keyup paste", function () {
    validarApellidoPaterno();
});

function validarApellidoPaterno() {
    if ($('#apellidoPaterno').val() == "") {
        $(".apellidoPaterno-vacio").fadeIn(200);
        $("#apellidoPaterno").removeClass('focus:ring-blue-900');
        $("#apellidoPaterno").removeClass('border-grey-lighter');
        $("#apellidoPaterno").addClass('border-red-900');
        $("#apellidoPaterno").addClass('focus:ring-red-900');
        $("#apellidoPaterno-label").removeClass('text-grey-darker');
        $("#apellidoPaterno-label").addClass('text-red-700');

        return false;

    } else {
        $("#apellidoPaterno").removeClass('focus:ring-red-900');
        $("#apellidoPaterno").addClass('focus:ring-blue-900');
        $("#apellidoPaterno").removeClass('border-red-900');
        $("#apellidoPaterno").addClass('border-grey-lighter');
        $(".apellidoPaterno-vacio").fadeOut(200);
        $("#apellidoPaterno-label").addClass('text-grey-darker');
        $("#apellidoPaterno-label").removeClass('text-red-700');

        return true;

    }
}

$("#apellidoMaterno").on("keyup paste", function () {
    validarApellidoMaterno();
});

function validarApellidoMaterno() {
    if ($('#apellidoMaterno').val() == "") {
        $(".apellidoMaterno-vacio").fadeIn(200);
        $("#apellidoMaterno").removeClass('focus:ring-blue-900');
        $("#apellidoMaterno").removeClass('border-grey-lighter');
        $("#apellidoMaterno").addClass('border-red-900');
        $("#apellidoMaterno").addClass('focus:ring-red-900');
        $("#apellidoMaterno-label").removeClass('text-grey-darker');
        $("#apellidoMaterno-label").addClass('text-red-700');

        return false;

    } else {
        $("#apellidoMaterno").removeClass('focus:ring-red-900');
        $("#apellidoMaterno").addClass('focus:ring-blue-900');
        $("#apellidoMaterno").removeClass('border-red-900');
        $("#apellidoMaterno").addClass('border-grey-lighter');
        $(".apellidoMaterno-vacio").fadeOut(200);
        $("#apellidoMaterno-label").addClass('text-grey-darker');
        $("#apellidoMaterno-label").removeClass('text-red-700');

        return true;

    }
}

$("#fechaNacimiento").on("keyup change paste", function () {
    validarFechaNacimiento();
});

function validarFechaNacimiento() {
    if ($('#fechaNacimiento').val() == "") {
        $(".fechaNacimiento-vacio").fadeIn(200);
        $("#fechaNacimiento").removeClass('focus:ring-blue-900');
        $("#fechaNacimiento").removeClass('border-grey-lighter');
        $("#fechaNacimiento").addClass('border-red-900');
        $("#fechaNacimiento").addClass('focus:ring-red-900');
        $("#fechaNacimiento-label").removeClass('text-grey-darker');
        $("#fechaNacimiento-label").addClass('text-red-700');

        return false;

    } else {
        $("#fechaNacimiento").removeClass('focus:ring-red-900');
        $("#fechaNacimiento").addClass('focus:ring-blue-900');
        $("#fechaNacimiento").removeClass('border-red-900');
        $("#fechaNacimiento").addClass('border-grey-lighter');
        $(".fechaNacimiento-vacio").fadeOut(200);
        $("#fechaNacimiento-label").addClass('text-grey-darker');
        $("#fechaNacimiento-label").removeClass('text-red-700');

        return true;

    }
}

$("#curp").on("keyup paste", function () {
    validarCURP();
});

function validarCURP() {
    if ($('#curp').val() == "") {
        $(".curp-vacio").fadeIn(200);
        $("#curp").removeClass('focus:ring-blue-900');
        $("#curp").removeClass('border-grey-lighter');
        $("#curp").addClass('border-red-900');
        $("#curp").addClass('focus:ring-red-900');
        $("#curp-label").removeClass('text-grey-darker');
        $("#curp-label").addClass('text-red-700');

        return false;

    } else {
        $("#curp").removeClass('focus:ring-red-900');
        $("#curp").addClass('focus:ring-blue-900');
        $("#curp").removeClass('border-red-900');
        $("#curp").addClass('border-grey-lighter');
        $(".curp-vacio").fadeOut(200);
        $("#curp-label").addClass('text-grey-darker');
        $("#curp-label").removeClass('text-red-700');

        return true;

    }
}

$("#escolaridad").on("change", function () {
    validarEscolaridad();
});

function validarEscolaridad() {
    if ($('#escolaridad').val() == null) {
        $(".escolaridad-vacio").fadeIn(200);
        $("#escolaridad").removeClass('focus:ring-blue-900');
        $("#escolaridad").removeClass('border-grey-lighter');
        $("#escolaridad").addClass('border-red-900');
        $("#escolaridad").addClass('focus:ring-red-900');
        $("#escolaridad-label").removeClass('text-grey-darker');
        $("#escolaridad-label").addClass('text-red-700');

        return false;

    } else {
        $("#escolaridad").removeClass('focus:ring-red-900');
        $("#escolaridad").addClass('focus:ring-blue-900');
        $("#escolaridad").removeClass('border-red-900');
        $("#escolaridad").addClass('border-grey-lighter');
        $(".escolaridad-vacio").fadeOut(200);
        $("#escolaridad-label").addClass('text-grey-darker');
        $("#escolaridad-label").removeClass('text-red-700');

        return true;

    }
}

$("#escuela").on("keyup paste", function () {
    validarEscuela();
});

function validarEscuela() {
    if ($('#escuela').val() == '') {
        $(".escuela-vacio").fadeIn(200);
        $("#escuela").removeClass('focus:ring-blue-900');
        $("#escuela").removeClass('border-grey-lighter');
        $("#escuela").addClass('border-red-900');
        $("#escuela").addClass('focus:ring-red-900');
        $("#escuela-label").removeClass('text-grey-darker');
        $("#escuela-label").addClass('text-red-700');

        return false;

    } else {
        $("#escuela").removeClass('focus:ring-red-900');
        $("#escuela").addClass('focus:ring-blue-900');
        $("#escuela").removeClass('border-red-900');
        $("#escuela").addClass('border-grey-lighter');
        $(".escuela-vacio").fadeOut(200);
        $("#escuela-label").addClass('text-grey-darker');
        $("#escuela-label").removeClass('text-red-700');

        return true;

    }
}



$("#sexo").on("change", function () {
    validarSexo();
});

function validarSexo() {
    if ($('#sexo').val() == null) {
        $(".sexo-vacio").fadeIn(200);
        $("#sexo").removeClass('focus:ring-blue-900');
        $("#sexo").removeClass('border-grey-lighter');
        $("#sexo").addClass('border-red-900');
        $("#sexo").addClass('focus:ring-red-900');
        $("#sexo-label").removeClass('text-grey-darker');
        $("#sexo-label").addClass('text-red-700');

        return false;

    } else {
        $('#fotoTemp').html('');
        $('#fotoDiv').html('');
        if($('#sexo').val() == 'MASCULINO'){
            $('#fotoTemp').append('<img id="image" class="object-contain w-56 h-56 items-center rounded-full shadow-lg" src="src/img/hombre.png">');
            $('#fotoDiv').append('<img src="src/img/hombre.png" class="selfieIMG rounded-lg sm:w-auto sm:h-28 w-full h-auto opacity-50">');
        }else{
            $('#fotoTemp').append('<img id="image" class="object-contain w-56 h-56 items-center rounded-full shadow-lg" src="src/img/mujer.png">');
            $('#fotoDiv').append('<img src="src/img/mujer.png" class="selfieIMG rounded-lg sm:w-auto sm:h-28 w-full h-auto opacity-50">');
        }

        $("#sexo").removeClass('focus:ring-red-900');
        $("#sexo").addClass('focus:ring-blue-900');
        $("#sexo").removeClass('border-red-900');
        $("#sexo").addClass('border-grey-lighter');
        $(".sexo-vacio").fadeOut(200);
        $("#sexo-label").addClass('text-grey-darker');
        $("#sexo-label").removeClass('text-red-700');

        return true;

    }
}

$("#entidadNacimiento").on("change", function () {
    validarentidadNacimiento();
});

function validarentidadNacimiento() {

    if ($('#entidadNacimiento').val() == null) {

        $(".entidadNacimientoDiv").removeClass('lg:w-1/2');
        $(".municipioDelegacionDiv").fadeOut(100);

        $(".entidadNacimiento-vacio").fadeIn(200);
        $("#entidadNacimiento").removeClass('focus:ring-blue-900');
        $("#entidadNacimiento").removeClass('border-grey-lighter');
        $("#entidadNacimiento").addClass('border-red-900');
        $("#entidadNacimiento").addClass('focus:ring-red-900');
        $("#entidadNacimiento-label").removeClass('text-grey-darker');
        $("#entidadNacimiento-label").addClass('text-red-700');

        return false;

    } else {

        getMunicipios($("#entidadNacimiento").val());

        $(".entidadNacimientoDiv").addClass('lg:w-1/2');
        $(".municipioDelegacionDiv").fadeIn(100);
        $("#entidadNacimiento").removeClass('focus:ring-red-900');
        $("#entidadNacimiento").addClass('focus:ring-blue-900');
        $("#entidadNacimiento").removeClass('border-red-900');
        $("#entidadNacimiento").addClass('border-grey-lighter');
        $(".entidadNacimiento-vacio").fadeOut(200);
        $("#entidadNacimiento-label").addClass('text-grey-darker');
        $("#entidadNacimiento-label").removeClass('text-red-700');

        return true;

    }
}


function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}


$("#continuarButton").on("click", function () {

    let nombre = validarNombre();
    let apellidoPaterno = validarApellidoPaterno();
    let apellidoMaterno = validarApellidoMaterno();
    let fechaNacimiento = validarFechaNacimiento();
    let curp = validarCURP();
    let escolaridad = validarEscolaridad();
    let escuela = validarEscuela();
    let sexo = validarSexo();

    if (nombre && apellidoPaterno && apellidoMaterno && fechaNacimiento && curp && escolaridad && escuela && sexo) {

        let validacionEdad = getAge($("#fechaNacimiento").val());
        let validacionEscolaridad = $('#escolaridad').val();

        if( validacionEdad >= 20 && validacionEdad <40 && validacionEscolaridad != "SECUNDARIA" ){

            $("#nameSpan").html($("#nombre").val().toLowerCase());

            $("#estadoCivil").html('');

            $(".part-1").fadeOut(100,
                function () {
                    $('.part-2').fadeIn(100);
                }
            );

            $('html, body').animate({
                scrollTop: $('.go-to-2').offset().top
            }, 100);

            if ($('#sexo').val() == 'MASCULINO') {
                $("#estadoCivil").append('<option disabled selected>Elige tu estado civil</option><option value="SOLTERO">SOLTERO</option><option value="CASADO">CASADO</option><option value="CONCUBINATO">CONCUBINATO</option><option value="DIVORCIADO">DIVORCIADO</option><option value="VIUDO">VIUDO</option>');
            } else {
                $("#estadoCivil").append('<option disabled selected>Elige tu estado civil</option><option value="SOLTERA">SOLTERA</option><option value="CASADA">CASADA</option><option value="CONCUBINATO">CONCUBINATO</option><option value="DIVORCIADA">DIVORCIADA</option><option value="VIUDA">VIUDA</option>');
            }

        }else{
            let msg1 = false, msg2 = false;

            if(validacionEdad < 20 || validacionEdad >=36){
                msg1 = true;
            }
            if(validacionEscolaridad == "SECUNDARIA"){
                msg2 = true;
            }
            let mensajeInvalido = '';

            if(msg1 && msg2){
                mensajeInvalido = '<div>No puedes continuar porque no cuentas con la edad solicitada y con la escolaridad mínima requerida.</div><div class="text-lg font-bold pt-4">GRACIAS POR PARTICIPAR</div>';
            }else{
                if(msg1 == true && msg2 == false){
                    mensajeInvalido = '<div>No puedes continuar porque no cuentas con la edad requerida.</div><div class="text-lg font-bold pt-4">GRACIAS POR PARTICIPAR</div>';
                }else if(msg1 == false && msg2 == true){
                    mensajeInvalido = '<div>No puedes continuar porque no cuentas con la escolaridad mínima requerida.</div><div class="text-lg font-bold pt-4">GRACIAS POR PARTICIPAR</div>';
                }
            }

            let formDataRechazado = new FormData();

            formDataRechazado.append("nombre", $("#nombre").val());
            formDataRechazado.append("apellidoPaterno", $("#apellidoPaterno").val());
            formDataRechazado.append("apellidoMaterno", $("#apellidoMaterno").val());
            formDataRechazado.append("curp", $("#curp").val());
            formDataRechazado.append("sexo", $("#sexo").val());
            formDataRechazado.append("fechaNacimiento", $("#fechaNacimiento").val());
            formDataRechazado.append("escolaridad", $("#escolaridad").val());

            $.ajax({
                type: 'POST',
                url: 'data/insertDataRechazado.php',
                data: formDataRechazado,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                  Swal.fire({
                    title: 'Lo sentimos',
                    html: mensajeInvalido,
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: "Aceptar",
                  }).then(function (isConfirm) {
                    if (isConfirm) {
                      window.location.href = "./";
                    }
                  });

                },
                error: function () {
                  Swal.fire({
                      title: 'A ocurrido un error, intentalo más tarde.',
                    icon: 'error',
                      allowOutsideClick: true
                  });
                }
              });

        }

    } else {
        $('html, body').animate({
            scrollTop: $('.text-red-700:first').offset().top
        }, 100);
    }
});



function app() {
    return {
        step: 1
    }
}

$("#cancel").on("click", function () {

    $(".part-2").fadeOut(100,
        function () {
            $('.part-1').fadeIn(100);
        }
    );

    $('html, body').animate({
        scrollTop: $('.go-to-1').offset().top
    }, 100);

});

$("#next-step").on("click", function () {

    $(".part-2").fadeOut(100,
        function () {
            $('.part-3').fadeIn(100);
        }
    );

    $('html, body').animate({
        scrollTop: $('.go-to-3').offset().top
    }, 100);

});

getEstados();

function getEstados() {

    $.ajax({
        url: "data/getLocation.php?request=estados",
        dataType: 'json'
    }).done(function (data) {

        var estados = data;

        for (id in estados) {
            $('#entidadNacimiento').append('<option value="' + estados[id].id + '">' + estados[id].nombre + '</option>');
        }

    });

}

function getMunicipios(estado) {

    $.ajax({
        url: "data/getLocation.php?request=municipios&estado=" + estado,
        dataType: 'json'
    }).done(function (data) {

        var municipios = data;

        $('#municipioDelegacion').html('<option disabled selected>Municipio o delegación</option>');

        for (id in municipios) {
            $('#municipioDelegacion').append('<option value="' + municipios[id].id + '">' + municipios[id].nombre + '</option>');
        }

    });

}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

$("#codigoPostal").on("keyup paste", function (evt) {

    var charCode = (evt.which) ? evt.which : event.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        codigoPostal = validarCodigoPostal();
        return true;
    }
});

function validarCodigoPostal() {

    if ($('#codigoPostal').val().length == 5) {

        codigoPostal = true;

        $('#municipio').val('');
        $('#estado').val('');
        $('#coloniaAppend').html('');

        $.ajax({
            url: "data/getLocation.php?request=getFromCP&codigoPostal=" + $('#codigoPostal').val(),
            dataType: 'json'
        }).done(function (data) {

            if (data[0] != null) {

                $('#coloniaAppend').html('');
                $('#municipio').val('');
                $('#estado').val('');

                $('#municipio').prop('readonly', false);
                $('#estado').prop('readonly', false);

                $("#municipio").removeClass('bg-blue-100');
                $("#estado").removeClass('bg-blue-100');

                if (data.length > 1) {

                    $('#coloniaAppend').html('');

                    $('#coloniaAppend').append('<div class="relative inline-flex w-full"><svg class="w-2 h-2 absolute top-1 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero" /></svg><select id="colonia" name="colonia" autocomplete="ŃÖcompletes" class="colonia bg-white appearance-none block w-full text-grey-darker border border-grey-lighter focus:outline-none focus:ring-2 focus:ring-blue-900 rounded py-3 px-4 mb-3 uppercase"><option disabled selected>Elige tu colonia</option>');

                    for (id in data) {
                        $('#colonia').append('<option value="' + data[id].colonia + '">' + data[id].colonia + '</option>');
                    }

                    $('#coloniaAppend').append('</select></div><p class="h-8 -mt-1 text-red-600 text-xs italic colonia-vacio" style="display:none;">Por favor, elige tu colonia.</p>');

                    // $(document).on('change','#colonia',function(){
                    //     colonia = validarColonia();
                    //     validateToSearch();
                    // });


                } else {

                    $('#coloniaAppend').html('');
                    $('#coloniaAppend').append('<input autocomplete="ŃÖcompletes" readonly value="' + data[0].colonia + '" class="colonia bg-blue-100 appearance-none block w-full text-grey-darker border border-grey-lighter focus:outline-none focus:ring-2 focus:ring-blue-900 rounded py-3 px-4 mb-3 uppercase" id="colonia" name="colonia" type="text" placeholder="Colonia"><p class="h-8 -mt-1 text-red-600 text-xs italic colonia-vacio" style="display:none;">Por favor, ingresa tu colonia.</p>');
                    $('#municipio').val(data[0].municipio);
                    $('#estado').val(data[0].estado);

                }

                $('#municipio').val(data[0].municipio);
                $('#estado').val(data[0].estado);

                $('#municipio').prop('readonly', true);
                $('#estado').prop('readonly', true);

                $("#municipio").addClass('bg-blue-100');
                $("#estado").addClass('bg-blue-100  ');

                $('.coloniaDiv').fadeIn(100);
                $('.municipioDiv').fadeIn(100);
                $('.estadoDiv').fadeIn(100);

                validateToSearch();

                return true;

            } else {

                $('#coloniaAppend').html('');

                $('#municipio').prop('readonly', false);
                $('#estado').prop('readonly', false);

                $("#municipio").removeClass('bg-blue-100');
                $("#estado").removeClass('bg-blue-100');

                $('#coloniaAppend').append('<input autocomplete="ŃÖcompletes" class="appearance-none block w-full text-grey-darker border border-grey-lighter focus:outline-none focus:ring-2 focus:ring-blue-900 rounded py-3 px-4 mb-3 uppercase" id="colonia" name="colonia" type="text" placeholder="Colonia"><p class="-mt-1 text-red-600 text-xs italic colonia-vacio" style="display:none;">Por favor, ingresa tu colonia.</p>');

                $('.coloniaDiv').fadeIn(100);
                $('.municipioDiv').fadeIn(100);
                $('.estadoDiv').fadeIn(100);

                validateToSearch();

                return false;
            }

        });

        validateToSearch();

        return true;

    } else {

        codigoPostal = false;

        $('.coloniaDiv').fadeOut(100);
        $('.municipioDiv').fadeOut(100);
        $('.estadoDiv').fadeOut(100);

        $('#coloniaAppend').html('');
        $('#municipio').val('');
        $('#estado').val('');

        if ($('#codigoPostal').val() == "") {
            $(".codigoPostal-vacio").fadeIn(200);
            $("#codigoPostal").removeClass('focus:ring-blue-900');
            $("#codigoPostal").removeClass('border-grey-lighter');
            $("#codigoPostal").addClass('border-red-900');
            $("#codigoPostal").addClass('focus:ring-red-900');
            $("#codigoPostal-label").removeClass('text-grey-darker');
            $("#codigoPostal-label").addClass('text-red-700');

            validateToSearch();

            return false;

        } else {

            $("#codigoPostal").removeClass('focus:ring-red-900');
            $("#codigoPostal").addClass('focus:ring-blue-900');
            $("#codigoPostal").removeClass('border-red-900');
            $("#codigoPostal").addClass('border-grey-lighter');
            $(".codigoPostal-vacio").fadeOut(200);
            $("#codigoPostal-label").addClass('text-grey-darker');
            $("#codigoPostal-label").removeClass('text-red-700');

            validateToSearch();

            return true;

        }

    }

}


function getCoordinates(address) {

    $('#mapText').fadeIn(100);
    $('#map').fadeIn(100);

    const geocoder = new google.maps.Geocoder();

    geocoder.geocode({ address: address }, (results, status) => {

        if (status === "OK") {
            $('#map').fadeIn(0);
            drawMap(results);
        }

    });

}


var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 17,
    gestureHandling: 'greedy',
    streetViewControl: false,
    mapTypeControl: false,
    fullscreenControl: true,
    zoomControl: true,
    center: { lat: 19.408572, lng: -99.018348 },
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [{ "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#d6e2e6" }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#cfd4d5" }] }, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#7492a8" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{ "lightness": 25 }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{ "color": "#dde2e3" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.stroke", "stylers": [{ "color": "#cfd4d5" }] }, { "featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{ "color": "#dde2e3" }] }, { "featureType": "landscape.natural", "elementType": "labels.text.fill", "stylers": [{ "color": "#7492a8" }] }, { "featureType": "landscape.natural.terrain", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "color": "#dde2e3" }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#588ca4" }] }, { "featureType": "poi", "elementType": "labels.icon", "stylers": [{ "saturation": -100 }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "color": "#a9de83" }] }, { "featureType": "poi.park", "elementType": "geometry.stroke", "stylers": [{ "color": "#bae6a1" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.fill", "stylers": [{ "color": "#c6e8b3" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.stroke", "stylers": [{ "color": "#bae6a1" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#41626b" }] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "saturation": -45 }, { "lightness": 10 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#c1d1d6" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#a6b5bb" }] }, { "featureType": "road.highway", "elementType": "labels.icon", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.fill", "stylers": [{ "color": "#9fb6bd" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "transit", "elementType": "labels.icon", "stylers": [{ "saturation": -70 }] }, { "featureType": "transit.line", "elementType": "geometry.fill", "stylers": [{ "color": "#b4cbd4" }] }, { "featureType": "transit.line", "elementType": "labels.text.fill", "stylers": [{ "color": "#588ca4" }] }, { "featureType": "transit.station", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.station", "elementType": "labels.text.fill", "stylers": [{ "color": "#008cb5" }, { "visibility": "on" }] }, { "featureType": "transit.station.airport", "elementType": "geometry.fill", "stylers": [{ "saturation": -100 }, { "lightness": -5 }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#a6cbe3" }] }]
});

var marker = new google.maps.Marker({
    map: map,
    draggable: true,
    icon: {
        url: "src/icons/home646.svg",
        size: new google.maps.Size(64, 64),
        scaledSize: new google.maps.Size(64, 64)
    }
});

google.maps.event.addListener(marker, 'dragend', (event) => {

    $('#lat').val(event.latLng.lat());
    $('#lng').val(event.latLng.lng());

    marker.setPosition(event.latLng.toJSON());
    map.panTo(event.latLng.toJSON());

    getCuadraData($("#lat").val(), $("#lng").val());

});

map.addListener("click", (event) => {

    $('#lat').val(event.latLng.lat());
    $('#lng').val(event.latLng.lng());

    marker.setPosition(event.latLng.toJSON());
    map.panTo(event.latLng.toJSON());

    getCuadraData($("#lat").val(), $("#lng").val());

});



function drawMap(results) {

    map.panTo(results[0].geometry.location.toJSON());
    marker.setPosition(results[0].geometry.location.toJSON());

    $('#lat').val(results[0].geometry.location.lat());
    $('#lng').val(results[0].geometry.location.lng());

    getCuadraData($("#lat").val(), $("#lng").val());

}





$("#estadoCivil").on("change", function () {
    validarEstadoCivil();
});

function validarEstadoCivil() {
    if ($('#estadoCivil').val() == null) {
        $(".estadoCivil-vacio").fadeIn(200);
        $("#estadoCivil").removeClass('focus:ring-blue-900');
        $("#estadoCivil").removeClass('border-grey-lighter');
        $("#estadoCivil").addClass('border-red-900');
        $("#estadoCivil").addClass('focus:ring-red-900');
        $("#estadoCivil-label").removeClass('text-grey-darker');
        $("#estadoCivil-label").addClass('text-red-700');

        return false;

    } else {
        $("#estadoCivil").removeClass('focus:ring-red-900');
        $("#estadoCivil").addClass('focus:ring-blue-900');
        $("#estadoCivil").removeClass('border-red-900');
        $("#estadoCivil").addClass('border-grey-lighter');
        $(".estadoCivil-vacio").fadeOut(200);
        $("#estadoCivil-label").addClass('text-grey-darker');
        $("#estadoCivil-label").removeClass('text-red-700');

        return true;

    }
}




$("#entidadNacimiento").on("change", function () {
    validarEntidadNacimiento();
});

function validarEntidadNacimiento() {
    if ($('#entidadNacimiento').val() == null) {
        $(".entidadNacimiento-vacio").fadeIn(200);
        $("#entidadNacimiento").removeClass('focus:ring-blue-900');
        $("#entidadNacimiento").removeClass('border-grey-lighter');
        $("#entidadNacimiento").addClass('border-red-900');
        $("#entidadNacimiento").addClass('focus:ring-red-900');
        $("#entidadNacimiento-label").removeClass('text-grey-darker');
        $("#entidadNacimiento-label").addClass('text-red-700');

        return false;

    } else {
        $("#entidadNacimiento").removeClass('focus:ring-red-900');
        $("#entidadNacimiento").addClass('focus:ring-blue-900');
        $("#entidadNacimiento").removeClass('border-red-900');
        $("#entidadNacimiento").addClass('border-grey-lighter');
        $(".entidadNacimiento-vacio").fadeOut(200);
        $("#entidadNacimiento-label").addClass('text-grey-darker');
        $("#entidadNacimiento-label").removeClass('text-red-700');

        return true;

    }
}


$("#municipioDelegacion").on("change", function () {
    validarMunicipioDelegacion();
});

function validarMunicipioDelegacion() {
    if ($('#municipioDelegacion').val() == null) {
        $(".municipioDelegacion-vacio").fadeIn(200);
        $("#municipioDelegacion").removeClass('focus:ring-blue-900');
        $("#municipioDelegacion").removeClass('border-grey-lighter');
        $("#municipioDelegacion").addClass('border-red-900');
        $("#municipioDelegacion").addClass('focus:ring-red-900');
        $("#municipioDelegacion-label").removeClass('text-grey-darker');
        $("#municipioDelegacion-label").addClass('text-red-700');

        return false;

    } else {
        $("#municipioDelegacion").removeClass('focus:ring-red-900');
        $("#municipioDelegacion").addClass('focus:ring-blue-900');
        $("#municipioDelegacion").removeClass('border-red-900');
        $("#municipioDelegacion").addClass('border-grey-lighter');
        $(".municipioDelegacion-vacio").fadeOut(200);
        $("#municipioDelegacion-label").addClass('text-grey-darker');
        $("#municipioDelegacion-label").removeClass('text-red-700');

        return true;

    }
}



$("#correo").on("keyup paste", function () {
    validarCorreo();
});

function validarCorreo() {
    if ($('#correo').val() == '') {
        $(".correo-vacio").fadeIn(200);
        $("#correo").removeClass('focus:ring-blue-900');
        $("#correo").removeClass('border-grey-lighter');
        $("#correo").addClass('border-red-900');
        $("#correo").addClass('focus:ring-red-900');
        $("#correo-label").removeClass('text-grey-darker');
        $("#correo-label").addClass('text-red-700');

        return false;

    } else {
        $("#correo").removeClass('focus:ring-red-900');
        $("#correo").addClass('focus:ring-blue-900');
        $("#correo").removeClass('border-red-900');
        $("#correo").addClass('border-grey-lighter');
        $(".correo-vacio").fadeOut(200);
        $("#correo-label").addClass('text-grey-darker');
        $("#correo-label").removeClass('text-red-700');

        return true;

    }
}

$("#telCelular").on("keyup paste", function () {
    validarTelCelular();
});

function validarTelCelular() {
    if ($('#telCelular').val() == '') {
        $(".telCelular-vacio").fadeIn(200);
        $("#telCelular").removeClass('focus:ring-blue-900');
        $("#telCelular").removeClass('border-grey-lighter');
        $("#telCelular").addClass('border-red-900');
        $("#telCelular").addClass('focus:ring-red-900');
        $("#telCelular-label").removeClass('text-grey-darker');
        $("#telCelular-label").addClass('text-red-700');

        return false;

    } else {
        $("#telCelular").removeClass('focus:ring-red-900');
        $("#telCelular").addClass('focus:ring-blue-900');
        $("#telCelular").removeClass('border-red-900');
        $("#telCelular").addClass('border-grey-lighter');
        $(".telCelular-vacio").fadeOut(200);
        $("#telCelular-label").addClass('text-grey-darker');
        $("#telCelular-label").removeClass('text-red-700');

        return true;

    }
}




$("#calle").on("keyup paste", function () {
    calle = validarCalle();
    validateToSearch();
});

function validarCalle() {
    if ($('#calle').val() == '') {
        $(".calle-vacio").fadeIn(200);
        $("#calle").removeClass('focus:ring-blue-900');
        $("#calle").removeClass('border-grey-lighter');
        $("#calle").addClass('border-red-900');
        $("#calle").addClass('focus:ring-red-900');
        $("#calle-label").removeClass('text-grey-darker');
        $("#calle-label").addClass('text-red-700');

        return false;

    } else {
        $("#calle").removeClass('focus:ring-red-900');
        $("#calle").addClass('focus:ring-blue-900');
        $("#calle").removeClass('border-red-900');
        $("#calle").addClass('border-grey-lighter');
        $(".calle-vacio").fadeOut(200);
        $("#calle-label").addClass('text-grey-darker');
        $("#calle-label").removeClass('text-red-700');

        return true;

    }
}

$("#noExt").on("keyup paste", function () {
    noExt = validarNoExt();
    validateToSearch();
});

function validarNoExt() {
    if ($('#noExt').val() == '') {
        $(".noExt-vacio").fadeIn(200);
        $("#noExt").removeClass('focus:ring-blue-900');
        $("#noExt").removeClass('border-grey-lighter');
        $("#noExt").addClass('border-red-900');
        $("#noExt").addClass('focus:ring-red-900');
        $("#noExt-label").removeClass('text-grey-darker');
        $("#noExt-label").addClass('text-red-700');

        return false;

    } else {
        $("#noExt").removeClass('focus:ring-red-900');
        $("#noExt").addClass('focus:ring-blue-900');
        $("#noExt").removeClass('border-red-900');
        $("#noExt").addClass('border-grey-lighter');
        $(".noExt-vacio").fadeOut(200);
        $("#noExt-label").addClass('text-grey-darker');
        $("#noExt-label").removeClass('text-red-700');

        return true;

    }
}



$("#entreCalle").on("keyup paste", function () {
    entreCalle = validarEntreCalle();
    // validateToSearch();
});

function validarEntreCalle() {
    if ($('#entreCalle').val() == '') {
        $(".entreCalle-vacio").fadeIn(200);
        $("#entreCalle").removeClass('focus:ring-blue-900');
        $("#entreCalle").removeClass('border-grey-lighter');
        $("#entreCalle").addClass('border-red-900');
        $("#entreCalle").addClass('focus:ring-red-900');
        $("#entreCalle-label").removeClass('text-grey-darker');
        $("#entreCalle-label").addClass('text-red-700');

        return false;

    } else {
        $("#entreCalle").removeClass('focus:ring-red-900');
        $("#entreCalle").addClass('focus:ring-blue-900');
        $("#entreCalle").removeClass('border-red-900');
        $("#entreCalle").addClass('border-grey-lighter');
        $(".entreCalle-vacio").fadeOut(200);
        $("#entreCalle-label").addClass('text-grey-darker');
        $("#entreCalle-label").removeClass('text-red-700');

        return true;

    }
}



$("#yCalle").on("keyup paste", function () {
    yCalle = validarYCalle();
    // validateToSearch();
});

function validarYCalle() {
    if ($('#yCalle').val() == '') {
        $(".yCalle-vacio").fadeIn(200);
        $("#yCalle").removeClass('focus:ring-blue-900');
        $("#yCalle").removeClass('border-grey-lighter');
        $("#yCalle").addClass('border-red-900');
        $("#yCalle").addClass('focus:ring-red-900');
        $("#yCalle-label").removeClass('text-grey-darker');
        $("#yCalle-label").addClass('text-red-700');

        return false;

    } else {
        $("#yCalle").removeClass('focus:ring-red-900');
        $("#yCalle").addClass('focus:ring-blue-900');
        $("#yCalle").removeClass('border-red-900');
        $("#yCalle").addClass('border-grey-lighter');
        $(".yCalle-vacio").fadeOut(200);
        $("#yCalle-label").addClass('text-grey-darker');
        $("#yCalle-label").removeClass('text-red-700');

        return true;

    }
}

$(document).on('keyup paste change', '#colonia', function () {
    colonia = validarColonia();
    validateToSearch();
});


function validarColonia() {

    if ($('#colonia').val() == "" || $('#colonia').val() == null) {
        $(".colonia-vacio").fadeIn(0);
        $("#colonia").removeClass('focus:ring-blue-900');
        $("#colonia").removeClass('border-grey-lighter');
        $("#colonia").addClass('border-red-900');
        $("#colonia").addClass('focus:ring-red-900');
        $("#colonia-label").removeClass('text-grey-darker');
        $("#colonia-label").addClass('text-red-700');

        return false;

    } else {
        $("#colonia").removeClass('focus:ring-red-900');
        $("#colonia").addClass('focus:ring-blue-900');
        $("#colonia").removeClass('border-red-900');
        $("#colonia").addClass('border-grey-lighter');
        $(".colonia-vacio").fadeOut(0);
        $("#colonia-label").addClass('text-grey-darker');
        $("#colonia-label").removeClass('text-red-700');

        return true;

    }

}


$("#municipio").on("keyup paste", function () {
    municipio = validarMunicipio();
    validateToSearch();
});

function validarMunicipio() {

    if ($('#municipio').val() == '') {

        $(".municipio-vacio").fadeIn(0);
        $("#municipio").removeClass('focus:ring-blue-900');
        $("#municipio").removeClass('border-grey-lighter');
        $("#municipio").addClass('border-red-900');
        $("#municipio").addClass('focus:ring-red-900');
        $("#municipio-label").removeClass('text-grey-darker');
        $("#municipio-label").addClass('text-red-700');

        return false;

    } else {

        $("#municipio").removeClass('focus:ring-red-900');
        $("#municipio").addClass('focus:ring-blue-900');
        $("#municipio").removeClass('border-red-900');
        $("#municipio").addClass('border-grey-lighter');
        $(".municipio-vacio").fadeOut(0);
        $("#municipio-label").addClass('text-grey-darker');
        $("#municipio-label").removeClass('text-red-700');

        return true;

    }
}

$("#estado").on("keyup paste", function () {
    estado = validarEstado();
    validateToSearch();
});

function validarEstado() {

    if ($('#estado').val() == '') {
        $(".estado-vacio").fadeIn(0);
        $("#estado").removeClass('focus:ring-blue-900');
        $("#estado").removeClass('border-grey-lighter');
        $("#estado").addClass('border-red-900');
        $("#estado").addClass('focus:ring-red-900');
        $("#estado-label").removeClass('text-grey-darker');
        $("#estado-label").addClass('text-red-700');

        return false;

    } else {

        $("#estado").removeClass('focus:ring-red-900');
        $("#estado").addClass('focus:ring-blue-900');
        $("#estado").removeClass('border-red-900');
        $("#estado").addClass('border-grey-lighter');
        $(".estado-vacio").fadeOut(0);
        $("#estado-label").addClass('text-grey-darker');
        $("#estado-label").removeClass('text-red-700');

        return true;

    }
}


function validateToSearch() {

    municipio = validarMunicipio();
    estado = validarEstado();
    colonia = validarColonia();

    if (calle && noExt && codigoPostal && colonia && municipio && estado) {
        getCoordinates($('#calle').val() + ' ' + $('#noExt').val() + ' ' + $('#codigoPostal').val() + ' ' + $('#municipio').val() + ' ' + $('#estado').val());
    }

}


function getCuadraData(lat, lng) {

    $.ajax({
        url: "data/getCuadraData.php?lat=" + lat + "&lng=" + lng,
        dataType: 'json'
    }).done(function (data) {

        if(data != null){

            var info = data;

            for (id in info) {
                $("#idCuadra").val(info[id].idCuadra);
                $("#sector").val(info[id].sector);
                $("#cuadrante").val(info[id].cuadrante);
            }

        }else{
            $("#idCuadra").val('NO APLICA');
            $("#sector").val('NO APLICA');
            $("#cuadrante").val('NO APLICA');
        }

    });

}





document.getElementById('concluirPreRegistro').addEventListener('change', function (e) {
    if (document.getElementById('concluirPreRegistro').checked) {
        $("#guardar").fadeIn(100);
    } else {
        $("#guardar").fadeOut(100);
    }
});











$("#subirSelfie").on('click', function() {
    $("#fotografiaInput").click();
  });

  var compressImage1 = function (imageFile, size) {

    if (!/^(?:image\/gif|image\/jpeg|image\/png|image\/svg\+xml|image\/x\-icon|)$/i.test(imageFile.files[0].type)) {
      alert("Elige un archivo de tipo imagen.");
      return;
    } else {

      var fileReader = new FileReader();
      fileReader.readAsDataURL(imageFile.files[0]);

      fileReader.onload = function (event) {

        var image = new Image();
        image.src = event.target.result;

        image.onload = function () {

          var imageWidth = image.width;
          var imageHeight = image.height;

          var canvas = document.createElement("canvas");
          var context = canvas.getContext("2d");

          if(imageHeight < imageWidth){
            canvas.height = size;
            canvas.width = canvas.height * (imageWidth / imageHeight);
          }else{
            canvas.width = size;
            canvas.height = canvas.width * (imageHeight / imageWidth);
          }

          context.drawImage(image, 0, 0, image.width, image.height, 0, 0, canvas.width, canvas.height);

          compressedImage = "";
          imageFile.value = '';

          $("#fotoDiv").html('');
          $("#subirSelfie").html('<i class="fas fa-pen  pr-2"></i>CAMBIAR IMAGEN');
          $("#fotoDiv").append('<img src="' + canvas.toDataURL("image/jpeg") + '" class="rounded-lg sm:w-auto sm:h-28 w-full h-auto">'+
                    '<input style="text-transform:none!important;" type="hidden" id="fotografia" name="fotografia" value="' + canvas.toDataURL("image/jpeg") + '">');
            validarFotografia();
        }

      };

    }

  }



$("#subirINE").on('click', function() {
    $("#INEInput").click();
  });

  var compressImage2 = function (imageFile, size) {

    if (!/^(?:image\/gif|image\/jpeg|image\/png|image\/svg\+xml|image\/x\-icon|)$/i.test(imageFile.files[0].type)) {
      alert("Elige un archivo de tipo imagen.");
      return;
    } else {

      var fileReader = new FileReader();
      fileReader.readAsDataURL(imageFile.files[0]);

      fileReader.onload = function (event) {

        var image = new Image();
        image.src = event.target.result;

        image.onload = function () {

          var imageWidth = image.width;
          var imageHeight = image.height;

          var canvas = document.createElement("canvas");
          var context = canvas.getContext("2d");

          if(imageHeight < imageWidth){
            canvas.height = size;
            canvas.width = canvas.height * (imageWidth / imageHeight);
          }else{
            canvas.width = size;
            canvas.height = canvas.width * (imageHeight / imageWidth);
          }

          context.drawImage(image, 0, 0, image.width, image.height, 0, 0, canvas.width, canvas.height);

          compressedImage = "";
          imageFile.value = '';

          $("#INEDiv").html('');
          $("#subirINE").html('<i class="fas fa-pen  pr-2"></i>CAMBIAR IMAGEN');
          $("#INEDiv").append('<img src="' + canvas.toDataURL("image/jpeg") + '" class="sm:w-auto sm:h-28 w-full h-auto">'+
                    '<input style="text-transform:none!important;" type="hidden" id="INE" name="INE" value="' + canvas.toDataURL("image/jpeg") + '">');
          validarINE();
        }

      };

    }

  }








  $("#subirCURP").on('click', function() {
    $("#CURPInput").click();
  });

  var compressImage3 = function (imageFile, size) {

    if (!/^(?:image\/gif|image\/jpeg|image\/png|image\/svg\+xml|image\/x\-icon|)$/i.test(imageFile.files[0].type)) {
      alert("Elige un archivo de tipo imagen.");
      return;
    } else {

      var fileReader = new FileReader();
      fileReader.readAsDataURL(imageFile.files[0]);

      fileReader.onload = function (event) {

        var image = new Image();
        image.src = event.target.result;

        image.onload = function () {

          var imageWidth = image.width;
          var imageHeight = image.height;

          var canvas = document.createElement("canvas");
          var context = canvas.getContext("2d");

          if(imageHeight < imageWidth){
            canvas.height = size;
            canvas.width = canvas.height * (imageWidth / imageHeight);
          }else{
            canvas.width = size;
            canvas.height = canvas.width * (imageHeight / imageWidth);
          }

          context.drawImage(image, 0, 0, image.width, image.height, 0, 0, canvas.width, canvas.height);

          compressedImage = "";
          imageFile.value = '';

          $("#CURPDiv").html('');
          $("#subirCURP").html('<i class="fas fa-pen  pr-2"></i>CAMBIAR IMAGEN');
          $("#CURPDiv").append('<img src="' + canvas.toDataURL("image/jpeg") + '" class="sm:w-auto sm:h-28 w-full h-auto">'+
                    '<input style="text-transform:none!important;" type="hidden" id="CURP" name="CURPImagen" value="' + canvas.toDataURL("image/jpeg") + '">');
          validarCURPImagen();
        }

      };

    }

  }





  $("#subirActa").on('click', function() {
    $("#actaInput").click();
  });

  var compressImage4 = function (imageFile, size) {

    if (!/^(?:image\/gif|image\/jpeg|image\/png|image\/svg\+xml|image\/x\-icon|)$/i.test(imageFile.files[0].type)) {
      alert("Elige un archivo de tipo imagen.");
      return;
    } else {

      var fileReader = new FileReader();
      fileReader.readAsDataURL(imageFile.files[0]);

      fileReader.onload = function (event) {

        var image = new Image();
        image.src = event.target.result;

        image.onload = function () {

          var imageWidth = image.width;
          var imageHeight = image.height;

          var canvas = document.createElement("canvas");
          var context = canvas.getContext("2d");

          if(imageHeight < imageWidth){
            canvas.height = size;
            canvas.width = canvas.height * (imageWidth / imageHeight);
          }else{
            canvas.width = size;
            canvas.height = canvas.width * (imageHeight / imageWidth);
          }

          context.drawImage(image, 0, 0, image.width, image.height, 0, 0, canvas.width, canvas.height);

          compressedImage = "";
          imageFile.value = '';

          $("#actaDiv").html('');
          $("#subirActa").html('<i class="fas fa-pen  pr-2"></i>CAMBIAR IMAGEN');
          $("#actaDiv").append('<img src="' + canvas.toDataURL("image/jpeg") + '" class="sm:w-auto sm:h-28 w-full h-auto">'+
                    '<input style="text-transform:none!important;" type="hidden" id="actaNacimiento" name="actaNacimiento" value="' + canvas.toDataURL("image/jpeg") + '">');
          validarActa();
        }

      };

    }

  }




  function validarFotografia(){

    if($('#fotografia').length == 0){

        $(".fotografia-vacio").fadeIn(200);
        $(".fotografiaContainer").removeClass('border-gray-300');
        $(".fotografiaContainer").addClass('border-red-900');
        $(".fotografiaFont").removeClass('text-gray-800');
        $(".fotografiaFont").addClass('text-red-900');

        return false;

    }else{
        $(".fotografia-vacio").fadeOut(200);
        $(".fotografiaContainer").removeClass('border-red-900');
        $(".fotografiaContainer").addClass('border-gray-300');
        $(".fotografiaFont").removeClass('text-red-900');
        $(".fotografiaFont").addClass('text-gray-800');

        return true;
    }

  }

  function validarINE(){

    if($('#INE').length == 0){

        $(".INE-vacio").fadeIn(200);
        $(".INEContainer").removeClass('border-gray-300');
        $(".INEContainer").addClass('border-red-900');
        $(".INEFont").removeClass('text-gray-800');
        $(".INEFont").addClass('text-red-900');

        return false;

    }else{
        $(".INE-vacio").fadeOut(200);
        $(".INEContainer").removeClass('border-red-900');
        $(".INEContainer").addClass('border-gray-300');
        $(".INEFont").removeClass('text-red-900');
        $(".INEFont").addClass('text-gray-800');

        return true;
    }

  }

  function validarCURPImagen(){

    if($('#CURP').length == 0){

        $(".CURP-vacio").fadeIn(200);
        $(".CURPContainer").removeClass('border-gray-300');
        $(".CURPContainer").addClass('border-red-900');
        $(".CURPFont").removeClass('text-gray-800');
        $(".CURPFont").addClass('text-red-900');

        return false;

    }else{
        $(".CURP-vacio").fadeOut(200);
        $(".CURPContainer").removeClass('border-red-900');
        $(".CURPContainer").addClass('border-gray-300');
        $(".CURPFont").removeClass('text-red-900');
        $(".CURPFont").addClass('text-gray-800');

        return true;
    }

  }

  function validarActa(){

    if($('#actaNacimiento').length == 0){

        $(".acta-vacio").fadeIn(200);
        $(".actaContainer").removeClass('border-gray-300');
        $(".actaContainer").addClass('border-red-900');
        $(".actaFont").removeClass('text-gray-800');
        $(".actaFont").addClass('text-red-900');

        return false;

    }else{
        $(".acta-vacio").fadeOut(200);
        $(".actaContainer").removeClass('border-red-900');
        $(".actaContainer").addClass('border-gray-300');
        $(".actaFont").removeClass('text-red-900');
        $(".actaFont").addClass('text-gray-800');

        return true;
    }

  }

  $(document).ready(function () {


  $("#saveData").on('click', function() {

    var tempColonia = $('.colonia').val();
    var tempMunicipio = $('.municipio').val();
    var tempEstado = $('.estado').val();


    let estadoCivil = validarEstadoCivil();
    let entidadNacimiento = validarEntidadNacimiento();
    let municipioDelegacion = validarMunicipioDelegacion();
    let correo = validarCorreo();
    let telCelular = validarTelCelular();

    let coloniaValidar = validarColonia();
    let municipioValidar = validarMunicipio();
    let estadoValidar = validarEstado();
    let calleValidar = validarCalle();
    let noExtValidar = validarNoExt();
    let entreCalleValidar = validarEntreCalle();
    let yCalleValidar = validarYCalle();
    let codigoPostalValidar = validarCodigoPostal();

    let fotografia = validarFotografia();
    let INE = validarINE();
    let CURP = validarCURPImagen();
    let acta = validarActa();

    if(estadoCivil && entidadNacimiento && municipioDelegacion && correo && telCelular && calleValidar && noExtValidar && entreCalleValidar && yCalleValidar && codigoPostalValidar && coloniaValidar && municipioValidar && estadoValidar && fotografia && INE && CURP && acta){

        $('.colonia').val(tempColonia);
        $('.municipio').val(tempMunicipio);
        $('.estado').val(tempEstado);

        let form = $('#formulario')[0];
        let formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: 'data/insertData.php?colonia=' + tempColonia,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
              Swal.fire({
                title: 'Cargando',
                allowOutsideClick: false,
                showCancelButton: false,
                showConfirmButton: false,
                willOpen: () => {
                  Swal.showLoading();
                },
              });
            },
            success: function (data) {
              console.log(data);
              Swal.close();
              Swal.fire({
                html: '<div class="text-2xl font-bold text-gray-700">Concluiste tu pre-registro</div><div class="text-xl font-semibold pt-4 text-gray-600">Haz click en continuar para generar tu comprobante<div>',
                icon: 'success',
                confirmButtonText: 'Continuar',
                allowOutsideClick: false
              }).then(function (isConfirm) {
                if (isConfirm) {
                  window.location.href = "./?key=" + data;
                }
              });

            },
            error: function () {
              Swal.fire({
                  title: 'A ocurrido un error, intentalo más tarde.',
                icon: 'error',
                  allowOutsideClick: true
              });
            },
            complete: function () {
              // swal.close();
            },
          });

    }else{
        $('html, body').animate({
                scrollTop: $('.text-red-700:first').offset().top
        }, 100);
    }

  });

  });
// $(".part-1").fadeOut(0);
// $(".part-2").fadeOut(0);
// $(".part-3").fadeIn(0);
