 var form = $('#f');

	$(form).submit(function(event) {
	    event.preventDefault();

		var formData = $(form).serialize();
		var name = $("#i1").val();
		var modal = document.getElementById('myModal');
        var b1 = document.getElementById("b1");
        var span = document.getElementsByClassName("close")[0];

		$.ajax({
		    type: 'POST',
		    url: $(form).attr('action'),
		    data: formData
		})
		.done(function(response) {
       modal.style.display = "block";
			$("#sub-div").text(name);
      
      span.onclick = function() {
    modal.style.display = "none";
}
      
      window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
		})
		.fail(function(data) {
		   
		});
	});
