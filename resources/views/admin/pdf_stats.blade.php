<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<ul style="list-style: none;text-align: center;margin-left: -50px;">
		<li style="display: inline-block;">
			<img src="{{ asset('/logo4.jpeg') }}" width="50" style="background:#fff;">
		</li>
		<li style="display: inline-block;">
			<img src="{{ asset('/logo5.jpeg') }}" width="50" style="background:#fff;">
		</li>
	</ul>
	<h3 style="text-align: center;margin-top: 0px;margin-bottom: 10px;">
		AMBULATORIO PETRA EMILIA MORENO
	</h3>
	<img src="{{ asset('/'.$url) }}" width="100%">
</body>
</html>