$(document).ready(function(){
    $('.chosen-select-parish').niceSelect();
    $('.chosen-select-enclosure').niceSelect();
    $('.chosen-select-canton').niceSelect();
    $('.chosen-select-gender').niceSelect();
    $('.chosen-select-meeting').niceSelect();
    $('.chosen-select-position').niceSelect();
    $('.chosen-select-result').niceSelect();
    $('.chosen-select-position-web').niceSelect();
    
 });

 $(document).on('click','.btn_president',function(){
     let presi = $(this).data('president');
     $('#presi_id').val(presi);

 });

 function getSelectParishes(id){
    
     let url ='select-parishes/'+id;
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
     let url ='select-enclosures/'+id;
     axios.get(url).then(function(response){
             $('.chosen-select-enclosure').empty();
             $('.chosen-select-enclosure').html(response.data);
             $('.chosen-select-enclosure').niceSelect('update');
     });
 }
 
 function getSelectGender(id,gender){
     let url ='select-gender/'+id+'/'+gender;
     axios.get(url).then(function(response){
             $('.chosen-select-meeting').empty();
             $('.chosen-select-meeting').html(response.data);
             $('.chosen-select-meeting').niceSelect('update');
     });
 }
 function getSelectMeetingVote(){
    let canton = $('.chosen-select-canton').val();
    let parish   = $('.chosen-select-parish').val();
    let enclosure = $('.chosen-select-enclosure').val();
    let gender  =  $('.chosen-select-gender').val();
    let type  =  $('#type_election').val();
    let meeting =   $('.chosen-select-meeting').val();

    let url ='meeting';
    axios.post(url,{
       
            enclosure_id: enclosure,
            canton_id: canton,
            parish_id: parish,
            meeting: meeting,
            gender: gender,
            type_election: type
        
    }).then(function(response){
            console.log("==>===========>>>>>>>>>>>>"+response.data.is_existed);
            console.log("==>===========***********"+response.data.votes);
            if(response.data.is_existed){
                $('#cj_1').prop("hidden", true);
                $('#cj_2').prop("hidden", true);
                $('#cj_3').prop("hidden", true);
            }else{
                $('#cj_1').removeAttr("hidden");
                $('#cj_2').removeAttr("hidden");
                $('#cj_3').removeAttr("hidden");
                
            }
    });
}

 function loadValuesInputHidden(){
     let canton = $('.chosen-select-canton').val();
     let parish   = $('.chosen-select-parish').val();
     let enclosure = $('.chosen-select-enclosure').val();
     let gender  =  $('.chosen-select-gender').val();
     let meeting =   $('.chosen-select-meeting').val();
     $('.input-canton').val(canton);
     $('.input-parish').val(parish);
     $('.input-enclosure').val(enclosure);
     $('.input-gender').val(gender);
     $('.input-meeting').val(meeting);

     $('.chosen-select-canton').prop('disabled',true);
     $('.chosen-select-parish').prop('disabled',true);
     $('.chosen-select-enclosure').prop('disabled',true);
     $('.chosen-select-gender').prop('disabled',true);
     $('.chosen-select-meeting').prop('disabled',true);
    
 }

 function disabledCombos(){
     $('.chosen-select-canton').prop('disabled',false);
     $('.chosen-select-parish').prop('disabled',false);
     $('.chosen-select-enclosure').prop('disabled',false);
     $('.chosen-select-gender').prop('disabled',false);
     $('.chosen-select-meeting').prop('disabled',false);
 }

$(document).on('change','.chosen-select-canton',function(){
     let id = $(this).val(); 
     getSelectParishes(id);
});

$(document).on('change','.chosen-select-parish',function(){
     let id = $(this).val(); 
     getSelectEnclosure(id);
});

$(document).on('change','.chosen-select-enclosure',function(){
     let id = $(this).val();
    
});
$(document).on('change','.chosen-select-gender',function(){
     let gender = $(this).val();
     let enclosure_id = $('.chosen-select-enclosure').val();
     if(enclosure_id != 0){
         getSelectGender(enclosure_id,gender);
     }else{
         alert('Selecciona un recinto para continuar');
     }
});
var x = document.getElementById("sec2");
$(document).on('change','.chosen-select-meeting',function(){
    let meeting = $(this).val();
    if(meeting!=0){
        loadValuesInputHidden();
        x.style.display = "block";
        getSelectMeetingVote();
    }else{
        alert('No hay juntas para elejir');
    }
 });

 $(document).on('click','#btn_block',function(){
     disabledCombos();
 });

 $(document).on('click','#btn_send',function(){
  //   $('#form_data').submit();

 });

function getSelectParishResult(id,position){
    let url ='resum/'+id+'/results?position='+position;
    axios.get(url).then(function(response){
        $('.table_resum').html(response.data);
    });
    //total
    let url2 ='total/'+id+'/results?position='+position;
    axios.get(url2).then(function(response){
        $('.table_total').html(response.data);
    });
    //chart
    let url3 ='chart/'+id+'/results?position='+position;
    axios.get(url3).then(function(response){
        getChart(response.data);
    });
}

function getSelectPositionResult(id,position){

    let url ='resum/'+id+'/results?position='+position;
    axios.get(url).then(function(response){
        $('.table_resum').html(response.data);
    });

    let url2 ='total/'+id+'/results?position='+position;
    axios.get(url2).then(function(response){
        $('.table_total').html(response.data);
    });

    let url3 ='chart/'+id+'/results?position='+position;
    axios.get(url3).then(function(response){
       getChart(response.data);
    });
}

function getChart(data){
    console.log(data.labels);
    console.log(data.values_organization);
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: [{
                label: '# of Votes',
                data: data.values_organization,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}

$(document).on('change','.chosen-select-result',function(){
    let id = $(this).val(); 
    let position = $('.chosen-select-position').val();
    getSelectParishResult(id,position);
});
$(document).on('change','.chosen-select-position',function(){
    let position = $(this).val(); 
    let id = $('.chosen-select-result').val(); 
    getSelectPositionResult(id,position);
});

$(document).on('change','.chosen-select-position-web',function(){

    let position = $(this).val(); 
   
    getWebsterResult(position);
});

function getWebsterResult(position){
    let url ='webster/table?position='+position;
    axios.get(url).then(function(response){
        $('.table-webster').html(response.data);
    });
}

/*	function alerta(campo) { 
		alert("Por favor, completa el campo "+campo) 
	}
	function validar_formulario(form) {
		if (form.vote_blank.value == "") { 
            alerta('\"Ingrese el voto blanco\"'); form.vote_blank.focus(); 
            return true;
        }
        if (form.vote_null.value == "") { 
            alerta('\"Ingrese el voto nulo\"'); form.vote_null.focus();
             return true ;
        }
		form.submit()
	}
*/

    function soloNumeros(e){
        var key = window.Event ? e.which : e.keyCode
        return (key >= 48 && key <= 57)
    }