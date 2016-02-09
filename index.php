<!DOCTYPE html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<style type="text/css">
	 body {
	 	background: url(images/web2.png);
	 }
	.jumbotron {
		background: #358CCE;
		color: #FFF;
		border-radius: 0px;
	}
	.jumbotron-sm {
		padding-top: 12px;
		padding-bottom: 24px;
	}
	.jumbotron small {
		color: #FFF;
	} 
	.h1 small {
		font-size: 24px;
	}
	#message {
		white-space: pre;
	} 
</style>
<html>

	<body>

		<div class="container">
			<h1>SMS Media's Emailer</h1>
			<div class="row">
				<div class="col-md-12">
					<div class="well well-sm">
						<form>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="name"> From</label>
										<input type="text" class="form-control" id="from" placeholder="Enter your email address" required="required" />
									</div>
									<div class="form-group">
										<label for="cc"> CC:</label>
										<input type="text" class="form-control" id="cc" placeholder="Person cc'ed" required="required" />
									</div>
									<div class="form-group">
										<label for="email"> Email Addresses'</label>
										<textarea name="message" id="to" class="form-control" rows="8" cols="25" required="required"
                                placeholder="Paste email addresses here"></textarea>
									</div>
                                    <div class="form-group">
										<label for="name"> Signature </label>
										<textarea name="signature" id="signature" class="form-control" rows="2" cols="25" required="required"
                                placeholder="Message"></textarea>
									</div>
									
								</div>
								<div class="col-md-7">
                                	<div class="form-group">
										<label for="subject"> Subject</label>
										<input type="text" class="form-control" id="subject" placeholder="Enter a subject" required="required" />
									</div>
									<div class="form-group">
										<label for="name"> Message</label>
										<textarea name="message" id="message" class="form-control" rows="12" cols="25" required="required"
                                placeholder="Message"></textarea>
									</div>
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
                   
								</div>
								<div class="col-md-12">
									<button  class="btn btn-primary pull-right" id="email">
										Send Message
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</body>
	<script src="http://code.jquery.com/jquery-2.1.1.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(e) {
			console.log("Loaded");
			$("#email").on('click', function(e) {
				console.log($('#message').val().replace(/\n/g, "<br />"))
				e.preventDefault()
				$.post("Controllers/emailer.php", {
					from : $("#from").val(),
					to : $("#to").val(),
					message : $('#message').val().replace(/\n/g, "<br />"),
					subject : $("#subject").val(),
					cc : $("#cc").val()

				}).done(function(data) {
					console.log(data)
				});
			})
		})
	</script>
</html>
