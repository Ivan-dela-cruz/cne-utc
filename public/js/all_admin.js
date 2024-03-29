//Variables globales para questions & answers
let status = 1;
let answer_valid = 1;
let question_id = 0;

$(document).ready(function(){
    $('.chosen-select-parish').niceSelect();
    $('.chosen-select-enclosure').niceSelect();
    $('.chosen-select-canton').niceSelect();
    $('.chosen-select-gender').niceSelect();
    $('.chosen-select-meeting').niceSelect();
    $('.chosen-select-position').niceSelect();
    $('.chosen-select-result').niceSelect();
    $('.chosen-select-pos').niceSelect();
   // $('.chosen-select-organization').niceSelect();
    $('.chosen-select-position-web').niceSelect();
    
 });


 $(document).on('click', '.btn-vote', function () {
    let id = $(this).data('id');
    let votes  = $('.vote'+id).val();
    let url = "update-votes/"+id;
    Swal.fire({
        title: '¿Estas Seguro?',
        text: "Los resultados se modificarán con esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Actualizar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(url,{
                votes:votes
            }).then(function (response) {
                Swal.fire('Actualizado!', '', 'success')
            }).catch(error => {
                Swal.fire('No se pudo actualizar el registro', '', 'info')
            });
        }
    });

 });
 $(document).on('click', '.btn-search-vote', function () {
    getVotes();
});

function getVotes(){
    let p_id = $('.chosen-select-parish').val();
    let e_id = $('.chosen-select-enclosure').val();
    let c_id = $('.chosen-select-canton').val();
    let g_id = $('.chosen-select-gender').val();
    let m_id = $('.chosen-select-meeting').val();

    //let o_id = $('.chosen-select-organization').val();
    let pos_id = $('.chosen-select-pos').val();

    let url ='list-votes';
    axios.post(url,{
        canton:c_id,
        parish:p_id,
        enclosure:e_id,
        gender:g_id,
        meeting:m_id,
        position:pos_id
    }).then(function(response){
            $('.votes-table').empty();
            $('.votes-table').html(response.data);
    });
}


 function getSelectParishes(id){
    
    let url ='../select-parishes/'+id;
    axios.get(url).then(function(response){
            $('.chosen-select-parish').empty();
            $('.chosen-select-parish').html(response.data.view);
            $('.chosen-select-parish').niceSelect('update');

            $('.chosen-select-result').empty();
            $('.chosen-select-result').html(response.data.view);
            $('.chosen-select-result').niceSelect('update');
           // getSelectEnclosure(response.data.location_id);
    });
}
function getSelectEnclosure(id){
    let url ='../select-enclosures/'+id;
    axios.get(url).then(function(response){
            $('.chosen-select-enclosure').empty();
            $('.chosen-select-enclosure').html(response.data);
            $('.chosen-select-enclosure').niceSelect('update');
    });
}

$(document).on('change','.chosen-select-pos',function(){
    getVotes();
});

$(document).on('change','.chosen-select-gender',function(){
    let gender = $(this).val();
    let enclosure_id = $('.chosen-select-enclosure').val();
    if(enclosure_id != 0){
        getSelectGender(enclosure_id,gender);
    }else{
        alert('Selecciona un recinto para continuar');
    }
    getVotes();
});

function getSelectGender(id,gender){
    let url ='../select-gender/'+id+'/'+gender;
    axios.get(url).then(function(response){
            $('.chosen-select-meeting').empty();
            $('.chosen-select-meeting').html(response.data);
            $('.chosen-select-meeting').niceSelect('update');
    });
    getVotes();
}
 $(document).on('change','.chosen-select-canton',function(){
    let id = $(this).val(); 
    getSelectParishes(id);
    getVotes();
});

$(document).on('change','.chosen-select-parish',function(){
    let id = $(this).val(); 
    getSelectEnclosure(id);
    getVotes();
});

function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}

//Método para eliminar la imagen de una unidad
$(document).on('click', '.delete_image_unit', function () {
    let id = $(this).data('id');
    let url = '../../units/' + id + '/delete/file';
    Swal.fire({
        title: '¿Estas Seguro?',
        text: "No podrás revertir esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(url).then(function (response) {
                $('#input_image').empty();
                $('#input_image').html(response.data);
                toastr.success('¡Imagen eliminada con exíto!');
                document.getElementById("url_image").addEventListener("change", readFile);
            }).catch(error => {
                toastr.error('Error en la petición ');
            });
        }
    });

});


//Método para activar o desactivar las unidades
$(document).on('click', '.activated_unit', function () {
    let id = $(this).data('id');
    let url = 'units/' + id + '/status';
    axios.patch(url).then(function (response) {
        toastr.success('¡Registro actualizado con exíto!')
    }).catch(error => {
        toastr.error('Error en la petición ')
    });
});

//Método para activar o desactivar los usuarios
$(document).on('click', '.activated_user', function () {
    let id = $(this).data('id');
    let url = 'users/' + id + '/status';
    axios.patch(url).then(function (response) {
        toastr.success('¡Registro actualizado con exíto!')
    }).catch(error => {
        toastr.error('Error en la petición ')
    });
});

//Método para activar o desactivar los cursos
$(document).on('click', '.activated_course', function () {
    let id = $(this).data('id');
    let url = 'courses/' + id + '/status';
    axios.patch(url).then(function (response) {
        toastr.success('¡Registro actualizado con exíto!')
    }).catch(error => {
        toastr.error('Error en la petición ')
    });
});

//Método para activar o desactivar pregunta
$(document).on('click', '.activated_question', function () {
    let id = $(this).data('id');
    let url = 'questions/' + id + '/status';
    axios.patch(url).then(function (response) {
        toastr.success('¡Registro actualizado con exíto!')
    }).catch(error => {
        toastr.error('Error en la petición ')
    });
});

//Método para obetener la tabla de alternativas de una pregunta
function getQuestionAnswers(id) {
    let url = "list-answers-questions/" + id;
    axios.get(url).then(function (response) {
        $('.data-answers').empty();
        $('.data-answers').html(response.data);
    }).catch(function (error) {
        console.log(error);
    });
}

$(document).on('click', '.valid_answer', function () {
    let id = $(this).data('id');
    let url = 'validated-answers-questions/' + id;
    axios.patch(url).then(function (response) {
        toastr.success('¡Registro actualizado con exíto!')
    }).catch(error => {
        toastr.error('Error en la petición ')
    });
});
$(document).on('click', '.status_answer', function () {
    let id = $(this).data('id');
    let url = 'status-answers-questions/' + id;
    axios.patch(url).then(function (response) {
        toastr.success('¡Estado cambiado con exíto!')
    }).catch(error => {
        toastr.error('Error en la petición ')
    });
});
$("#some_id").attr("checked") ? 1 : 0;

$('input[name="status"]').change(function () {
    status = $('input[name="status"]:checked').val();

});
$('input[name="type_answer_valid"]').change(function () {
    answer_valid = $('input[name="type_answer_valid"]:checked').val();

});

$(document).on('click', '.add-new-question', function () {
    question_id = $(this).data('id');
});
$(document).on('click', '.add-answer', function () {
    let title = $('#title').val();
    let message = $('#message').val();
    let type_answer_id = $('#type_answer_id').val();
    status = $('input[name="status"]:checked').val();
    console.log('----------');
    console.log(status);
    answer_valid = $('input[name="type_answer_valid"]:checked').val();
    console.log(answer_valid);

    let url = "type-answers-questions";
    axios.post(url, {
        'title': title,
        'message': message,
        'type_answer_id': type_answer_id,
        'status': status,
        'type_answer_valid': answer_valid,
        'question_id': question_id
    }).then(function (response) {
        $('#answerModal').modal('hide');

        Swal.fire(
            '¡Agregado!',
            'El tarea se ha cumplido exitosamente.',
            'success'
        );
        resetValues();
    }).catch(error => {
        if (error.response) {
            let errors = [];
            errors = error.response.data.errors;
            let message = errors[Object.keys(errors)[0]];
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message
            })
        }
    });
});
$(document).on('click', '.cancel-answer', function () {
    resetValues();
});
$(document).on('click', '.list-question-answers', function () {
    let id = $(this).data('id');
    getQuestionAnswers(id);
});

function resetValues() {
    question_id = 0;
    $('#title').val('');
    $('#message').val('');
    $('.textAreaEditor').summernote('destroy');
    $('.textAreaEditor').summernote();
}

//USERS PROGRESS COURSES
function getUnitCourseByUser(course_id, user_id) {
    let url = "course/" + course_id + '/user/' + user_id + '/units';
    axios.get(url).then(function (response) {
        $('.data-units-user').empty();
        $('.data-units-user').html(response.data);
    }).catch(function (error) {
        console.log(error);
    });
}

function getData(id) {
    let url = "courses-detail-course/" + id;
    axios.get(url).then(function (response) {
        $('.detail_course').empty();
        $('.detail_course').html(response.data.detail);
        $('.users_list').empty();
        $('.users_list').html(response.data.users);
        $('#tb_users').DataTable({responsive: true});
    }).catch(function (error) {
        console.log(error);
    });
}

$(document).on('click', '.units_user_course', function () {

    let course_id = $(this).data('course');
    let user_id = $(this).data('user');
    getUnitCourseByUser(course_id, user_id);

});

$(document).on('click', '.delete_user_course', function () {
    let id = $(this).data('id');
    let course_id = $(this).data('course');
    let url = 'user-courses/' + id + '/delete';
    Swal.fire({
        title: '¿Estas Seguro?',
        text: "En desvincular al usuario del curso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(url).then(function (response) {
                toastr.success('¡Registro eliminado con exíto!')
                getData(course_id);
            }).catch(error => {
                toastr.error('Error en la petición ')
            });
        }
    });
});

$(document).on("change", ".selected-course", function (e) {
    let id = $(this).val();
    getData(id);
});

/// ITEM DELETE TABLE
$(document).on('click', '.delete-item-table', function (e) {
    e.preventDefault();
    let id = $(this).data('id');
    let class_form = '.delete-item' + id;
   
    Swal.fire({
        title: '¿Estas Seguro?',
        text: "No podrás revertir esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $(class_form).submit();
        }
    });
});
/// ITEM DELETE TABLE
$(document).on('change', '.onoffswitch-checkbox', function (e) {
   
    let id = $(this).data('id');
    let module = $(this).data('url');
    let url = module+'/status/' + id;
    axios.get(url).then(function (response) {
       
    }).catch(error => {
       alert('Error en la petición')
    });
});

$(document).on('change', '.type-location', function () {
    let valor = $(this).val();
    if(valor==1){
        $('.province').attr("hidden","hidden");
        $('.canton').attr("hidden","hidden");
    }else{
        $('.province').removeAttr("hidden");
        $('.canton').removeAttr("hidden");
    }
    
  
 });


//UPLOAD IMAGE ON CONTAINER
function readFile() {
    if (this.files && this.files[0]) {
        var FR = new FileReader();
        FR.addEventListener("load", function (e) {
            document.getElementById("show_img").src = e.target.result;
        });
        FR.readAsDataURL(this.files[0]);
    }
}

document.getElementById("url_image").addEventListener("change", readFile);

