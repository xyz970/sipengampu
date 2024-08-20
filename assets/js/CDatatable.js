var CDatatable = function (id, endpoint, columns) {
  var datatable;
  const init = function () {
    $(id + " thead tr")
      .clone(true)
      .addClass("filters")
      .appendTo(id + " thead");

    datatable = $(id).DataTable({
      dom: "Bfrtip",
      autoWidth: true,
      lengthChange: true,
      scrollX: true,
      orderCellsTop: true,
      fixedHeader: true,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      ajax: {
        url: endpoint.url,
        type: endpoint.type,
        beforeSend: function (request) {
          request.setRequestHeader(
            "x-api-key",
            endpoint.key == undefined ? 444 : endpoint.key
          );
        },
      },
      columnDefs: columns,
      initComplete: function () {
        var api = this.api();

        // For each column
        api
          .columns()
          .eq(0)
          .each(function (colIdx) {
            // Set the header cell to contain the input element
            var cell = $(".filters th").eq(
              $(api.column(colIdx).header()).index()
            );
            var title = $(cell).text();
            $(cell).html('<input style="width:100%" class="form-control" type="text" placeholder="' + title + '" />');

            // On every keypress in this input
            $(
              "input",
              $(".filters th").eq($(api.column(colIdx).header()).index())
            )
              .off("keyup change")
              .on("change", function (e) {
                // Get the search value
                $(this).attr("title", $(this).val());
                var regexr = "({search})"; //$(this).parents('th').find('select').val();

                var cursorPosition = this.selectionStart;
                // Search the column for that value
                api
                  .column(colIdx)
                  .search(
                    this.value != ""
                      ? regexr.replace("{search}", "(((" + this.value + ")))")
                      : "",
                    this.value != "",
                    this.value == ""
                  )
                  .draw();
              })
              .on("keyup", function (e) {
                e.stopPropagation();

                $(this).trigger("change");
                $(this)
                  .focus()[0]
                  .setSelectionRange(cursorPosition, cursorPosition);
              });
          });
      },
    });
  };

  return {
    init: function () {
      init();
    },

    reload: function () {
      datatable.ajax.reload();
    },

    update: function (url) {
      datatable.ajax.url(url).load();
    },
  };
};
