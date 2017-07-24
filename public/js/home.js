/**
 * Created by chuch on 7/18/2017.
 */

$(document).ready(function(e) {

    $('#prevArtistHome').on('click',function () {
        var currentPage = $('#artistContHome').data('page');
        if(currentPage -1 < 0)
            toastr.error("No more previous pages availables!!!","Error");
        else
            ajaxCallback({'PAGE':currentPage-1},'/artist/changePag','changePageHomeCallBack');
    });

    $('#nextArtistHome').on('click',function () {
        var currentPage = $('#artistContHome').data('page');
        var totalPages = $('#artistContHome').data('totalpages');
        if(currentPage+1 >= totalPages)
            toastr.error("No more next pages availables!!!","Error");
        else
            ajaxCallback({'PAGE':currentPage+1},'/artist/changePag','changePageHomeCallBack');
    });
});

function changePageHomeCallBack(result) {
    if(result == -1)
        toastr.error('An error has happened, please try later.','Error');
    else{
        $('#artistContHome').data('page',parseInt(result[0]));
        var html = '';
        $.each(result[1], function (index, value) {
            html += '<div class="service-list" id="artist_'+value.id+'"> ' +
                '<div class="service-list-col1">  ' +
                '<i class="fa-music"></i>' +
                '</div>' +
                '<div class="service-list-col2">' +
                '<h3>' +
                '<a href="/artist/'+value.id+'" id="artistName_'+value.id+'" class="artistLink">'+value.name+'</a>' +
                '</h3>' +
                '</div>' +
                '</div>';
        });
        $('#artistContainer').html(html);
        $('#currentArtistHomePage').text(parseInt(result[0])+1);
    }

};