$(document).ready(function(){
    $("#testForm").submit(function(event) {
        event.preventDefault();
        var isbnInput = document.forms["testForm"]["isbn"].value;
        if (isbnInput.length != 13 || isNaN(isbnInput))            {
            alert("Your ISBN must be combination of 13 numbers. Try again");
            return false;
        } else {
            // GOOGLE BOOK API WITH GUZZLE
            $.ajax({
                url: '/google',
                type: "GET",
                async: false,
                data: {
                    'isbn': $('#isbn').val()
                },
                dataType: 'json',
                success: function (data) {
                    $("#thumbnail").attr("src",data.thumbnail);
                    $("#google_isbn").html('Isbn: ' + data.isbn);
                    $("#google_title").html('Title: ' + data.title);
                    $("#google_author").html('Author: ' + data.author);
                    // DATABASE SEARCH FOR FOR BOOK
                    $.ajax({
                        url: '/database',
                        type: "GET",
                        data: {
                            'isbn': $('#isbn').val()
                        },
                        dataType: 'json',
                        success: function (data) {
                            $("#book_status").html('Good news, we have book: "' + data.book_name + '" in DevTech library! :)');
                        },
                        error: function (xhr, status, error) {
                            $("#book_status").html(xhr.responseText);
                        }
                    });
                },
                error: function (xhr, status, error) {
                    $("#google_api_info").html(xhr.responseText);
                }
            });
        }
    });
});