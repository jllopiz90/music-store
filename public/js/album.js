/**
 * Created by chuch on 7/18/2017.
 */

$(document).ready(function(e) {
    $('#newAlbum').on('click', function () {
        $('#createAlbum').css('visibility', 'visible');
    });

    $('#createAlbumtBtn').on('click',function () {
        var name = $('#albumName').val();
        var genre = $('#albumGenre').val();
        var artistId = $('#artistAlbum').val();
        if(name == '')
            toastr.error("The field name can't be empty",'Error');
        else if(genre == '')
            toastr.error("The field genre can't be empty",'Error');
        else if(artistId == '0')
            toastr.error("You must select a artist",'Error');
        else
            ajaxCallback({'NAME':name,'GENRE':genre,'ARID':artistId},'/album/create','createAlbumCallBack');
    });

    $('#albumDelete').on('click',function () {
       var id = $(this).data('alid');
       ajaxCallback({'ALID':id},'/album/delete','deleteAlbumCallBack')
    });

});

function createAlbumCallBack(result) {
    if(result == '-1')
        toastr.error('An error has happened, please try later');
    else{
        $('#createAlbum').css('visibility', 'hidden');
        var artistId = $('#artistAlbum').val('0');
        toastr.success('A new album was created!!!');
        window.location="/artist/"+result;
    }
}

function deleteAlbumCallBack(result) {
    if(result == '-1')
        toastr.error('An error has happened, please try later');
    else
        window.location="/artist/"+result;
}
