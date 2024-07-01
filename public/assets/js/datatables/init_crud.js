$(document).ready(function() {
    var table = $("#example").DataTable({
        sPaginationType: "full_numbers",
        iDisplayLength: 5,
        aLengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        stateSave: true,
        ajax: {
            url: base_url("dashboard/data.json")
        },
        columns: [
            { data: "id" },
            { data: "user_code" },
            { data: "user_name" },
            { data: "user_status" },
            { data: "create_date" },
            { data: "update_date" },
            { data: "login_date" },
            { data: "logout_date" },
            { data: "id" }
        ],
        columnDefs: [
            {
                targets: 0,
                orderable: false,
                className: "select-checkbox",
                render: function (data, type, full, meta) {
                    return `<input name="admin_id[]" type="checkbox" value="${data}">`;
                }
            },
            {
                targets: ["user_type"],
                className: "text-center",
                render: function (data, type, full, meta) {
                    if (data) {
                        if (data == 1) {
                            return "Admin";
                        } else if (data == 2) {
                            return "User 1";
                        } else if (data == 3) {
                            return "User 2";
                        } else if (data == 4) {
                            return "User 3";
                        }
                    } else {
                        return '';
                    }
                },
                searchable: false,
                orderable: false
            },
            {
                targets: ["user_status"],
                className: "text-center",
                width: "8%"
            },
            {
                targets: ["create_date", "update_date", "login_date", "logout_date"],
                className: "text-center"
            },
            {
                targets: 8,
                className: "text-center",
                render: function (data, type, full, meta) {
                    if (data) {
                        if (full.user_code == 1) {
                            return 'No&nbsp;Action';
                        } else {
							return `<div class="action-icon">
								<a id="fetch-btn" href="${base_url('dashboard/fetch/' + data)}"><i class="far fa-edit"></i></a>
								<a id="delete-btn" data-open="delete-modal" data-url="${base_url('dashboard/delete/' + data)}"><i class="far fa-trash-alt"></i></a>
							</div>
						`;

                        }
                    } else {
                        return '';
                    }
                }
            }
        ],
        select: {
            style: "multi",
            selector: "td:first-child input[type='checkbox']"
        },
        oLanguage: {
            oPaginate: {
                sFirst: "<i class='fas fa-angle-double-left'></i>",
                sLast: "<i class='fas fa-angle-double-right'></i>",
                sPrevious: "<i class='fas fa-angle-left'></i>",
                sNext: "<i class='fas fa-angle-right'></i>"
            }
        }
    });

    // Load saved checkbox states from cookies
    var savedCheckboxStates = JSON.parse(Cookies.get('checkboxStates') || '{}');
    table.on('draw', function () {
        table.rows().every(function () {
            var data = this.data();
            var $checkbox = $('input[name="admin_id[]"][value="' + data.id + '"]');
            $checkbox.prop('checked', savedCheckboxStates[data.id] || false);
        });
    });

    // Handle checkbox change events
    $('#example tbody').on('change', 'input[name="admin_id[]"]', function () {
        var data = table.row($(this).closest('tr')).data();
        savedCheckboxStates[data.id] = $(this).is(':checked');
        Cookies.set('checkboxStates', JSON.stringify(savedCheckboxStates), { expires: 7 });
    });

    // Handle click on "Select all" control
    $("#select-all").on("click", function () {
        var rows = table.rows({ search: "applied" }).nodes();
        $('input[type="checkbox"]', rows).prop("checked", this.checked).trigger('change');
    });

    // Handle reset button on Datatables
    $("#reset-filter").on("click", function() {
        // Uncheck checkboxes
        $('input[type="checkbox"]').prop('checked', false).trigger('change');

        // Reset Datatables filter
        table.search('').columns().search('').draw();

        // Clear Datatables save state
        table.state.clear();
        savedCheckboxStates = {};
        Cookies.remove('checkboxStates');
    });

    // Handle form submission event
    $('#multidelete-frm').on('submit', function (e) {
        var form = this;
        var rows_selected = table.column(0).checkboxes.selected();
        // Iterate over all selected checkboxes
        $.each(rows_selected, function (index, rowId) {
            // Create a hidden element
            $(form).append(
                $('<input>').attr('type', 'hidden').attr('name', 'admin_id[]').val(rowId)
            );
        });
    });
});
