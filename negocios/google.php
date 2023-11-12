<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="754434331865-2fbinnckkr8jfj3qorgpj31s4b4rhs08.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
		var media = "google";
		if( id_token != "" ){
			
			var dados = {
			   name: profile.getName()+ " "+profile.getFamilyName(),
			   mail: profile.getEmail(),
			   media:media
			}
			$.post("http://localhost/ng/v1/users/medialogin/",dados,function(retorna){
				window.location.href="http://localhost/ng/v1/mvcAnnouncement.php?action=inhome";
			});
			
			console.log("ID Token: " + id_token);
		}
      }
    </script>
  </body>
</html>