
$(document).ready(function () {
    $("#blog_post_form").submit(function (event) {
        var blogData = {
            blog_user: $("#blog_user").val(),
            blog_body: $("#blog_body").val(),
        };
        $.ajax({
            type: "POST",
            url: "../php/manager.php",
            data: blogData,
            dataType: "json",
            encode: true,
            statusCode: {
                200: (r) => {
                    document.querySelector("#blog_user").value = ""
                    document.querySelector("#blog_body").value = ""
                    location.reload()

                },
                400: (r) => {
                    console.log(r)
                }
            },

        })
        event.preventDefault();
    });
});