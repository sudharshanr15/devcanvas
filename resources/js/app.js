import './bootstrap';

$(document).ready(function(){
    $("#modal-wrapper-close-btn").on("click", closeModalWrapper)
    $("#modal-wrapper-open-btn").on("click", openModalWrapper)
    $("#modal-wrapper-toggle-btn").on("click", toggleModalWrapper)
})

function toggleModalWrapper(){
    $("#modal-wrapper").show()
}

function openModalWrapper(){
    $("#modal-wrapper").toggle()
}

function closeModalWrapper(){
    $("#modal-wrapper").hide()
}