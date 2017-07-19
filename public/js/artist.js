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
});



function createArtistCallBack(result) {
    if(result == '-1')
        toastr.error('An error has happened, please try later');
    else{
        var html = '<div class="service-list" id="artist_'+result.id+'">'+
            '<div class="service-list-col1">'+
            '<i class="fa-microphone"></i>'+
            '</div>'+
            '<div class="service-list-col2">'+
            '<h3><a href="/artist/'+result.id+'" class="artistLink">'+result.name+'</a></h3>'+
            '</div>'+
                '<div class="service-list-col3">'+
            '<h3><a href="javascript:void(0);" class="btn btn-danger deleteArtist" data-arid="'+result.id+'">Delete</a></h3>'+
            '</div>'+
            '</div>';
        $('#artistCont').append(html);
        $('#createArtist').css('visibility', 'hidden');
        toastr.success('A new album was created!!!');
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
