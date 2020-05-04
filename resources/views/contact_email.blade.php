<!Doc type HTML>
<html>
	<head>
		<title>Another  test</title>
	</head>
	<body>
			<div id="body_container">
            <h2>Hello Admin,</h2>
                You received an email from : {{ $name }}
                Here are the details:<br>
                <b>Name:</b> {{ $name }} <br>
                <b>Email:</b> {{ $email }}<br>
                <b>Subject:</b> {{ $subject }}<br>
                <b>Message:</b> 
                <p>{{ $user_message }}</p>
                
                Thank You!
               
			</div>	
	</body>
</html>


