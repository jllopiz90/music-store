/**
 * Created by chuch on 7/18/2017.
 */

$(document).ready(function(e) {
    $('#newAlbum').on('click', function () {
        $('#createAlbum').css('display', 'block');
    });

    $('#canceltAlbumNew').on('click',function () {
        $('#createAlbum').css('display', 'none');
    });

    $('#acceptAlbumNew').on('click',function () {
        var name = $('#albumName').val();
        var genre = $('#albumGenre').val();
        var artistId = $('#artistAlbum').val();
        var imgCover = $('#coverFilename').text();
        if(name == '')
            toastr.error("The field name can't be empty",'Error');
        else if(genre == '')
            toastr.error("The field genre can't be empty",'Error');
        else if(artistId == '0')
            toastr.error("You must select a artist",'Error');
        else
            ajaxCallback({'NAME':name,'GENRE':genre,'ARID':artistId,'COVER':imgCover},'/album/create','createAlbumCallBack');
    });


    $('#albumDelete').on('click',function () {
       var id = $(this).data('alid');
       ajaxCallback({'ALID':id},'/album/delete','deleteAlbumCallBack')
    });

    $('#acceptAlbumEdit').on('click',function () {
        var id= $(this).data('alid');
        var name = $('#albumEditName').val();
        var artist = $('#artistAlbumSelect').val();
        var imgCover = $('#coverFilename').text();

        if( name == '')
            toastr.error("The album name can't be empty.","Error");
        else
            ajaxCallback({'ID':id,'NAME':name,'ARTISTID':artist,'COVER':imgCover},'/album/editAlbum','editAlbumCallBack');
    });

    Dropzone.options.myAwesomeDropzone = {
        maxFiles: 1,
        maxFilesize: 3,
        addRemoveLinks: true,
        dictResponseError: 'Server not Configured',
        acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
        init:function(){
            var self = this;
            // config
            self.options.addRemoveLinks = true;
            self.options.dictRemoveFile = "Delete";
            //New file added
            self.on("addedfile", function (file) {
                console.log('new file added ', file);
            });
            // Send file starts
            self.on("sending", function (file) {
                console.log('upload started', file);
                $('.meter').show();
            });

            // File upload Progress
            self.on("totaluploadprogress", function (progress) {
                console.log("progress ", progress);
                $('.roller').width(progress + '%');
            });

            self.on("queuecomplete", function (progress) {
                $('.meter').delay(999).slideUp(999);
            });

            // On removing file
            self.on("removedfile", function (file) {
                console.log(file);
            });
        }
    };

});

function createAlbumCallBack(result) {
    if(result == '-1')
        toastr.error('An error has happened, please try later');
    else{
        $('#createAlbum').css('display', 'none');
        var artistId = $('#artistAlbum').val('0');
        toastr.success('A new album was created!!!');
        window.location = "/artist/"+result;
    }
};

function editAlbumCallBack(result) {
    if(result == -1)
        toastr.error('An error has happened, please try later');
    else
        window.location = "/album/"+result;
};

function deleteAlbumCallBack(result) {
    if(result == '-1')
        toastr.error('An error has happened, please try later');
    else
        window.location="/artist/"+result;
        window.location="/artist/"+result;
};
