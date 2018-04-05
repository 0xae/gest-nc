angular.module('app', []);

$("#business-privacy-descr").trumbowyg({
    btnsAdd: ['foreColor', 'backColor']
}).on('tbwchange', function(e){
    $("#privacy_content_input").val(e.target.value);
});

var url = new URL(location.href);
var isNew=url.searchParams.get('is_new');
var tab=url.searchParams.get('tab');
var isUpdated=url.searchParams.get('is_updated') || url.searchParams.get('is_update');
var uploadedAdded=url.searchParams.get('upload_added');
var flashMsg=url.searchParams.get('flash_msg');

if (isNew) {
    $.notify("Objecto guardado com sucesso", "success");
}

if (isUpdated) {
    $.notify("Objecto actualizado com sucesso", "success");    
}

if (flashMsg) {
    $.notify(flashMsg, "success");
}

if (uploadedAdded) {
    $.notify("Anexo adicionado",  "success");
    $('#editTab a[href="#tab2"]').tab('show');          
}

if (tab) {
    $('a[href="#'+tab+'"]').tab('show');    
}

$(".app-print-page").on("click", function () {
    window.print();
});

$("ul.pagination").addClass("hidden-print");

$(window).load(function() {
    $(".loading").fadeOut("slow");;
});

$(document).ready(function() {
    $('.datatable').dataTable();
    $("#DataTables_Table_0_previous").text("Anterior");
    $("#DataTables_Table_0_next").text("Proximo");
});
