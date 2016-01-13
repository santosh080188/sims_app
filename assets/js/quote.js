$( document ).ready(function() {
    
  $("#manufacturer").on('change', function() {
      var selected = $(this).find("option:selected").text();
      $("#maxSIP, #packageSIP").prop("disabled", true);
      $.ajax({
        method: "POST",
        url: "dashboard/get_model/",
        data: { manufacturer: selected }
      }).done(function(response) {
          if(response) {
            $('#model').removeAttr('disabled');
            $('#model').html(response);
          }
      });
  });
  
  $("#model").on('change', function() {
      var selected = $(this).find("option:selected").text();
      $("#packageSIP").prop("disabled", true);
      $.ajax({
        method: "POST",
        url: "dashboard/get_maxsip/",
        data: { model: selected }
      }).done(function(response) {
          if(response) {
            $('#maxSIP').removeAttr('disabled');
            $('#maxSIP').html(response);
          }
      });
  })
  
  $("#maxSIP").on('change', function() {
      var selected = $(this).find("option:selected").text();
      // alert(this.value ); // or $(this).val()
      $.ajax({
        method: "POST",
        url: "dashboard/get_packagesip/",
        data: { maxSIP: selected }
      }).done(function(response) {
          if(response) {
            $('#packageSIP').removeAttr('disabled');
            $('#packageSIP').html(response);
          }
      });
  })  
});