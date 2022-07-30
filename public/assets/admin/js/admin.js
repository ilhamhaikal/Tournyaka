// get data events
function dataEvents(){
    $.ajax({
        type: "GET",
        url: "events/get_data",
        dataType: "json",
        success: function(response) {
            $('.view-data').html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
        }
    });
}

// get data destinasi
function dataDestinasi(){
    $.ajax({
        type: "GET",
        url: "destinasi/get_data",
        dataType: "json",
        success: function(response) {
            $('.view-data').html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
        }
    });
}

