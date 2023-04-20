"use strict";

const { default: Swal } = require("sweetalert2");
$(function () {
    $(".custom-file-input").on("change", function (e) {
        $(this).siblings().text(e.target.value.split("fakepath")[1]);
        var input = $(e.currentTarget);
        var file = input[0].files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".img.img-thumbnail.img-temporary").attr("src", e.target.result);
            $(".img.img-thumbnail.img-temporary").removeClass("d-none");
        };
        reader.readAsDataURL(file);
    });

    $(".table-data").dataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json",
        },
    });

    $("#logout-btn").on("click", function () {
        Swal.fire({
            title: "Keluar ?",
            text: "Keluar dari sistem e-KPB!",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Keluar!",
            cancelButtonText: "Batalkan",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("logout-form").submit();
            }
        });
    });
    $.ajax({
        url: "https://api.github.com/emojis",
        async: false,
    }).then(function (data) {
        window.emojis = Object.keys(data);
        window.emojiUrls = data;
    });
    if (document.location.pathname.split("/").includes("event")) {
        $("#summernote").summernote({
            placeholder: "Buat Tulisan mu disini",
            tabsize: 2,
            height: 500,
            lang: "id-ID",
            hint: {
                match: /:([\-+\w]+)$/,
                search: function (keyword, callback) {
                    callback(
                        $.grep(emojis, function (item) {
                            return item.indexOf(keyword) === 0;
                        })
                    );
                },
                codemirror: {
                    theme: "monokai",
                },
                template: function (item) {
                    var content = emojiUrls[item];
                    return (
                        '<img src="' +
                        content +
                        '" width="20" /> :' +
                        item +
                        ":"
                    );
                },
                content: function (item) {
                    var url = emojiUrls[item];
                    if (url) {
                        return $("<img />")
                            .attr("src", url)
                            .css("width", 20)[0];
                    }
                    return "";
                },
            },
        });
        if (
            document.location.pathname.split("/").length === 3 ||
            document.location.pathname.split("/").length === 4
        ) {
            if (
                document.location.pathname.split("/").length === 3 &&
                document.location.pathname.split("/")[
                    document.location.pathname.split("/").length - 1
                ] != "create"
            ) {
                $("#summernote").summernote("disable");
            }
            $("#summernote").summernote(
                "code",
                $("input[name=summernote-fallback]").val()
            );
        }

        $("input[name=judul]#judul").on("change", function (e) {
            let slug = e.target.value;
            var words = slug.split(" ");
            for (var i = 0; i < words.length; i++) {
                var word = words[i];
                words[i] = word.charAt(0).toUpperCase() + word.slice(1);
            }
            $("input[name=slug]#slug").val(
                words
                    .join("_")
                    .toLowerCase()
                    .replace(/[^a-zA-Z_0-9 ]/g, "")
            );
        });
    }
});
