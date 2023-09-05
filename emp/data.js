//fetch datatable
var t = "";
$(document).ready(function () {
    t = $('#emptbl').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "get_userdata.php",
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [0, 5]
        },],
        "order": [
            [0, 'DESC']
        ]
    })
    // .on('preXhr.dt', function(e, settings, xhr) {
    //     if (settings.jqXHR)
    //         settings.jqXHR.abort();
    //     $(".dataTables_processing").show();
    // });
});

//form vallidation
$(document).ready(function () {
    $('#form').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                rangelength: [10, 12],
                number: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            city: {
                required: true
            }
        },
        messages: {
            name: 'Please enter Name.',
            email: {
                required: 'Please enter Email Address.',
                email: 'Please enter a valid Email Address.',
            },
            phone: {
                required: 'Please enter Contact.',
                rangelength: 'Phone should be 10 digit number.'
            },
            country: 'Please select Country.',
            state: 'Please select State.',
            city: 'Please select City.',
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});

//fetch dropdown state in add page
$(document).ready(function () {
    $('#country').change(function () {
        var cId = $(this).val();
        $.ajax({
            url: 'fetchState.php',
            type: "POST",
            data: {
                c_id: cId
            },
            success: function (data) {
                $('#state').append(data);
            }
        });
    });
});

//fetch dropdown state in add page
$(document).ready(function () {
    $('#state').change(function () {
        var sId = $(this).val();
        $.ajax({
            url: 'fetchCity.php',
            type: "POST",
            data: {
                s_id: sId
            },
            success: function (data) {
                $('#city').append(data);
            }
        });
    });
});

//add data
$(document).ready(function () {
    var form = $('$form');

        $('#submit').click(function () {
            
            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: ("#form input").serialize(),
                success: function (data) {
                    console.log(data);
                }
            })
        })
});

//fetch dropdown state in update page
$(document).on('change', '#country', function () {
    $('#state').html('<option value="">Select State</option>');
    var cId = $(this).val();
    $.ajax({
        url: 'fetchState.php',
        type: "POST",
        data: {
            c_id: cId
        },
        success: function (data) {
            $('#state').append(data);
        }
    });
});

//fetch dropdown state in update page
$(document).on('change', '#state', function () {
    $('#city').html('<option value="">Select City</option>');
    $('#state').change(function () {
        var sId = $(this).val();
        $.ajax({
            url: 'fetchCity.php',
            type: "POST",
            data: {
                s_id: sId
            },
            success: function (data) {
                $('#city').append(data);
            }
        });
    });
});

//delete
$(document).on('click', '.delete', function () {
    var id = $(this).attr("deleteid");

    if (confirm("Are you sure?")) {
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: ({
                'delete': id
            }),
            dataType: "json",
            cache: false,
            success: function (data) {
                if (data.status == 200) {
                    alert(data.msg);
                }
                t.draw();
            }
        });
    } else {
        return false;
    }

});
