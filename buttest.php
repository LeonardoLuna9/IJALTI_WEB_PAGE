<!DOCTYPE html>
<html>
	<head>
		<title>
			Create a Form Dynamically
			with the JavaScript
		</title>
	</head>
	<body style="text-align: center;">
		<h1 style="color: green;">
			GeeksforGeeks
		</h1>
		<p>
			Click on the button to create
			a form dynamically
		</p>
		<button onClick="GFG_Fun()">
			click here
		</button>
		<p id="GFG_DOWN"></p>
		<script>
			var down = document.getElementById("GFG_DOWN");
			function GFG_Fun() {
			
				// Create a form dynamically
				var form = document.createElement("form");
				form.setAttribute("method", "post");
				form.setAttribute("action", "submit.php");

				// Create an input element for emailID
				var ID = document.createElement("input");
				ID.setAttribute("type", "text");
				ID.setAttribute("name", "emailID");
				ID.setAttribute("placeholder", "E-Mail ID");

				// Create an input element for password
				var PWD = document.createElement("input");
				PWD.setAttribute("type", "password");
				PWD.setAttribute("name", "password");
				PWD.setAttribute("placeholder", "Password");

				// Create a submit button
				var s = document.createElement("input");
				s.setAttribute("type", "submit");
				s.setAttribute("value", "Submit");

				// Append the email_ID input to the form
				form.append(ID);
			
				// Append the password to the form
				form.append(PWD);
			
				// Append the button to the form
				form.append(s);

				document.getElementsByTagName("body")[0]
			.appendChild(form);
			}
		</script>
	</body>
</html>
