
$(document).ready(function () {
    var route = $("#ajaxRoute").val();
    console.log(route);
    $("#cities-data-table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,

        scrollX: true,
        language: {
            search: "",
            searchPlaceholder: "Search...",
        },
        ajax: route,
        columns: [
            {
                data: "id",
                name: "id",
            },
            {
                data: "name",
                name: "name",
            },
            {
                data: "country.name",
                name: "country.name",
            },
            // {
            //     data: "created_at",
            //     name: "created_at",
            //     width: "15%",
            // },
            {
                data: "action",
                name: "action",
            }
        ],
    });
});
