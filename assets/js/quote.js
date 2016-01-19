$(document).ready(function () {
    $("#qotation_button,#get_quote").on('click', function () {
        var error = 0;
        var product = $('#product').val();
        var manufacturer = $('#manufacturer').val();
        var model = $('#model').val();
        var maxSIP = $('#maxSIP').val();
        var packageSIP = $('#packageSIP').val();
        var service_level = $('#service_level').val();
        var term = $('#term').val();
        $("#error_product").html("");
        if (product == '' && manufacturer == '0') {
            $("#error_product").append("<p>choose product (or) below four catogories</p>");
            error = 1;
        }
        if (product != '' && manufacturer == '0') {
            $("#error_product").append("<p>choose correct product (or) below four catogories</p>");
            error = 1;
        }
        if (product == '' && manufacturer != '0') {
            if (model == '0') {
                error = 1;
                $("#error_product").append("<p>Please select Model.</p>");
            } else
            if (maxSIP == '0') {
                error = 1;
                $("#error_product").append("<p>Please select maxSIP</p>");
            } else
            if (packageSIP == '0') {
                error = 1;
                $("#error_product").append("<p>please select packageSIP</p>");
            }
        }

        if (service_level == '0') {
            error = 1;
            $("#error_product").append("<p>Please select service_level</p>");
        }
        if (term == '0') {
            error = 1;
            $("#error_product").append("<p>Please select term</p>");
        }
        if ((error)) {
            return false;
        } else
        if (($(this).html()) == 'Submit') {
            if ($('#item1 span').html()== '') {
                $("#error_product").append("<p>Please get quotation</p>");
                return false;
            } else {
                //submit the form after all validations are done
                var manufacturer = $("#manufacturer").find("option:selected").text();
                var model = $("#model").find("option:selected").text();
                var maxSIP = $("#maxSIP").find("option:selected").text();
                var packageSIP = $("#packageSIP").find("option:selected").text();
                $.ajax({
                    method: "POST",
                    url: "dashboard/submit_quote/",
                    data: {product: product, manufacturer: manufacturer, model: model, maxSIP: maxSIP, packageSIP: packageSIP, service_level: service_level, term: term}
                }).done(function (response) {
                    document.location.reload();
                });
            }
        }
        else {
            var manufacturer = $("#manufacturer").find("option:selected").text();
            var model = $("#model").find("option:selected").text();
            var maxSIP = $("#maxSIP").find("option:selected").text();
            var packageSIP = $("#packageSIP").find("option:selected").text();
            var service_level = $("#service_level").val();
            var term = $("#term").val();
            var product = $("#product").val();
            $.ajax({
                method: "POST",
                url: "dashboard/get_quote/",
                data: {product: product, manufacturer: manufacturer, model: model, maxSIP: maxSIP, packageSIP: packageSIP, service_level: service_level, term: term}
            }).done(function (response) {
                if (response) {
                    var obj = jQuery.parseJSON(response);
                    $("#quoteType").html(": " + obj.type);
                    $("#quotencr").html(": " + obj.nrc);
                    $("#quotemrc").html(": " + obj.mrc);
                }
            });

        }
    });
    $("#manufacturer").on('change', function () {
        var selected = $(this).find("option:selected").text();
        $("#maxSIP, #packageSIP").prop("disabled", true);
        $.ajax({
            method: "POST",
            url: "dashboard/get_model/",
            data: {manufacturer: selected}
        }).done(function (response) {
            if (response) {
                $('#model').removeAttr('disabled');
                $('#model').html(response);
            }
        });
    });

    $("#model").on('change', function () {
        var selected = $(this).find("option:selected").text();
        $("#packageSIP").prop("disabled", true);
        $.ajax({
            method: "POST",
            url: "dashboard/get_maxsip/",
            data: {model: selected}
        }).done(function (response) {
            if (response) {
                $('#maxSIP').removeAttr('disabled');
                $('#maxSIP').html(response);
            }
        });
    })

    $("#maxSIP").on('change', function () {
        var selected = $(this).find("option:selected").text();
        $.ajax({
            method: "POST",
            url: "dashboard/get_packagesip/",
            data: {maxSIP: selected}
        }).done(function (response) {
            if (response) {
                $('#packageSIP').removeAttr('disabled');
                $('#packageSIP').html(response);
            }
        });
    });
    
    $("#product").blur(function() { 
        $.ajax({
            method: "POST",
            url: "dashboard/get_all_data/",
            data: {product: $(this).val()}
        }).done(function (response) {
            
            if (response) {
                var obj = $.parseJSON(response);
                if(obj.status == "manufacturer") {
                    $('#manufacturer').html(obj.manufacturer);
                    $('#manufacturer').removeAttr('disabled');
                } else if(obj.status == "all")  {
                    $('#packageSIP').html(obj.package);
                    $('#maxSIP').html(obj.max);
                    $('#model').html(obj.model);
                    $('#manufacturer').html(obj.manufacturer);

                    $('#packageSIP, #maxSIP, #model, #manufacturer').attr('disabled','disable');                    
                } else if(obj.status == "nodata")  {
                    $("#error_product").html("");
                    $('#manufacturer').html("<option value='0'>Manufacturer</option>");
                    $('#manufacturer').removeAttr('disabled');
                    $("#error_product").append("<p>Please select the correct product</p>");
                }

            }
        });        
    });
     $("#get_Reset").on('click', function () { 
         $("#error_product").html('');
         $('#item1 span').html('');
         $('#item2 span').html('');
         $('#item3 span').html('');
                 $.ajax({
            method: "POST",
            url: "dashboard/get_all_data/",
            data: {product: ""}
        }).done(function (response) {
            
            if (response) {
                var obj = $.parseJSON(response);
                if(obj.status == "manufacturer") {
                    $('#manufacturer').html(obj.manufacturer);
                    $('#manufacturer').removeAttr('disabled');
                    $('#packageSIP, #maxSIP, #model').attr('disabled','disable'); 
                }
            }
        })
     });

});