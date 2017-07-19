/**
 * Created by chuch on 7/18/2017.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function ajaxCall(data,url,successMessage,errorMessage)
{
    $.ajax({type: 'POST',url:url,
        data: data,
        success: function(res)
        {
            if(successMessage.length>0)
            {
                if(res=="1")
                    toastr.success(successMessage,"Success!!");
                else
                    toastr.error(errorMessage,"Error!!");
            }
        }
    });
}

function ajaxCallback(data,url,functionName)
{
    $.ajax({type: 'POST',url:url,
        data: data,
        success: function(res)
        {
            eval(functionName + '(' + res + ')');
        }
    });
}