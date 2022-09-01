/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";

    // ==============================================================
    // sales ratio
    // ==============================================================
    var chart = new Chartist.Line('.sales', {
        labels: [1, 2, 3, 4, 5, 6, 7],
        series: [
            [24.5, 28.3, 42.7, 32, 34.9, 48.6, 40],
            [8.9, 5.8, 21.9, 5.8, 16.5, 6.5, 14.5]
        ]
    }, {
        low: 0,
        high: 48,
        showArea: true,
        fullWidth: true,
        plugins: [
            Chartist.plugins.tooltip()
        ],
        axisY: {
            onlyInteger: true,
            scaleMinSpace: 40,
            offset: 20,
            labelInterpolationFnc: function(value) {
                return (value / 10) + 'k';
            }
        },

    });

    var chart = [chart];
});

// User Validation
$('#add_users').validate({
    rules: {
        firstname: {
            required: true
        },
        middlename: {
            required: true
        },
        lastname: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        mobile: {
            required: true,
            digits: true
        },
        role: {
            required: true,
        },
        status: {
            required: true,
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    }
});

$('#edit_users').validate({
    rules: {
        firstname: {
            required: true
        },
        middlename: {
            required: true
        },
        lastname: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        mobile: {
            required: true,
            digits: true
        },
        role: {
            required: true,
        },
        status: {
            required: true,
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    }
});

// Disease Validation
$('#add_disease').validate({
    rules: {
        name: {
            required: true
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    }
});

$('#edit_diseases').validate({
    rules: {
        name: {
            required: true
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    }
});

// Treatment Validation
$('#add_treatment').validate({
    rules: {
        name: {
            required: true
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    }
});

$('#edit_treatment').validate({
    rules: {
        name: {
            required: true
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    }
});

// Patient Treatment Validation
$('#add_patient_treatment').validate({
    rules: {
        patient_id: {
            required: true
        },
        treatmentname: {
            required: true
        }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    }
});

// Patient Validation
$('#add_patients').validate({
    rules: {
        firstname: {
            required: true
        },
        middlename: {
            required: true
        },
        lastname: {
            required: true
        },
        age: {
            required: true
        },
        gender: {
            required: true
        },
        address: {
            required: true
        },
        city: {
            required: true
        },
        mobile: {
            required: true
        },
        maritialstatus: {
            required: true
        },
        occupation: {
            required: true
        },
        startdate: {
            required: true
        },
        enddate: {
            required: true
        }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    }
});

$("#add_patients .disease").select2({
    tags: true,
    placeholder: "add diseases"
});
$('#add_patients .disease').attr('readonly', true);

// Sidebar menu toggle


// $('.sidebar-item').removeClass('active');
$(document).on('click','.sidebar-item', function(){
    $('.sidebar-item').removeClass('active');
    $('.sidebar-item ul.collapse').removeClass('in');
    $(this).addClass('active');
    if($(this).hasClass('active')){
        $(this).children().closest('ul.collapse').addClass('in');
    }
});
// Sidebar menu toggle end
