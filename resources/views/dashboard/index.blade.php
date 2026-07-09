<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome to EdTech CRM Dashboard</h1>

<h2>{{ Auth::user()->name }}</h2>

<h3>{{ Auth::user()->email }}</h3>

<form action="/logout" method="POST">

    @csrf

    <button type="submit">Logout</button>

</form>

</body>
</html>