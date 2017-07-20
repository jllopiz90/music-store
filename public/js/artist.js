/**
 * Created by chuch on 7/18/2017.
 */

// function showCreateArtis() {
//     $('#createArtist').css('visibility','visible');
// }
$(document).ready(function(e) {
    $('#newArtist').on('click', function () {
        $('#createArtist').css('visibility', 'visible');
    });

    $('#createArtistBtn').on('click',function () {
        var name = $('#artistName').val();
        if(name == '')
            toastr.error("The field name can't be empty",'Error');
        else
            ajaxCallback({'NAME':name},'/artist/create','createArtistCallBack');
    });

    $('body').delegate('.deleteArtist','click',function(){
        var id = $(this).data('arid');
        ajaxCallback({'ARID':id},'/artist/delete','deleteArtistCallBack');
    });

    $('body').delegate('.artistEdit','click',function () {
       var id =$(this).data('arid');
       $('#editArtistName_'+id).css('visibility','visible');
    });

    $('body').delegate('.cancelEdit','click',function () {
        var id =$(this).data('arid');
        $('#editArtistName_'+id).css('visibility','hidden');
    });

    $('body').delegate('.acceptEdit','click',function () {
        var id =$(this).data('arid');
        var name = $('#newArtistName_'+id).val();
        if(name == '')
            toastr.error("The new name can't be empty.","Error");
        else
            ajaxCallback({'ARID':id,'NAME':name},'/artist/edit','editArtistCallBack');
    })
});



function createArtistCallBack(result) {
    if(result == '-1')
        toastr.error('An error has happened, please try later');
    else{

        var html = '<div class="service-list" id="artist_'+result.id+'"> ' +
            '<div class="service-list-col1">  ' +
            '<i class="fa-microphone"></i>' +
            '</div>' +
            '<div class="service-list-col2">' +
            '<h3>' +
            '<div class="col-md-7">' +
            '<a href="/artist/'+result.id+'" id="artistName_'+result.id+'" class="artistLink">'+result.name+'</a>' +
        '</div>' +
        '<div class="col-md-5">' +
            '<i class="fa fa-pencil artistEdit" data-arid="'+result.id+'" aria-hidden="true"></i>' +
            '<i class="fa fa-trash-o deleteArtist" data-arid="'+result.id+'" aria-hidden="true"></i> ' +
            '</div>' +
            '</h3>' +
            '<div id="editArtistName_'+result.id+'" class="editArtistName">' +
            '<div class="col-md-7"><input type="text" id="newArtistName_'+result.id+'" value="'+result.name+'">' +
            '</div>' +
            '<div class="col-md-5">' +
            '<i class="fa fa-check acceptEdit" data-arid="'+result.id+'" aria-hidden="true"></i>' +
            '<i class="fa fa-times cancelEdit" data-arid="'+result.id+'" aria-hidden="true"></i>'+
            '</div></div>' +
            '</div>' +
            '</div>';


        // var html = '<div class="service-list" id="artist_'+result.id+'">'+
        //     '<div class="service-list-col1">'+
        //     '<i class="fa-microphone"></i>'+
        //     '</div>'+
        //     '<div class="service-list-col2">'+
        //     '<h3><a href="/artist/'+result.id+'" class="artistLink">'+result.name+'</a>'+
        //     '<i class="fa fa-pencil artistEdit" data-arid="'+result.id+'" aria-hidden="true"></i>'+
        //     '<i class="fa fa-trash-o deleteArtist" data-arid="'+result.id+'" aria-hidden="true"></i>'+
        //     '</h3></div>'+
        //     '</div>';
        $('#artistCont').append(html);
        $('#createArtist').css('visibility', 'hidden');
        toastr.success('A new artist was created!!!');
    }
}

function deleteArtistCallBack(result) {
    if(result == -1)
        toastr.error('An error has happened, please try later.','Error');
    else {
        $('#artist_'+result).remove();
        toastr.success('The artist was eliminated!');
    }
}

function editArtistCallBack(result) {
    if(result == -1)
        toastr.error('An error has happened, please try later.','Error');
    else {
        $('#editArtistName_'+result.id).css('visibility','hidden');
        $('#artistName_'+result.id).text(result.name)
        toastr.success('The artist was updated!!!');
    }
}