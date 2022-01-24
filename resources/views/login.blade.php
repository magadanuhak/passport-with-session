<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Page</title>
</head>
<body>
@guest
    <button onclick="login()">Login</button>
@else
    <h1>
        Salut, {{Auth::user()->name }}

    </h1>

    <button onclick="logout()">Logout</button>

@endguest
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js" integrity="sha512-/Q6t3CASm04EliI1QyIDAA/nDo9R8FQ/BULoUFyN4n/BDdyIxeH7u++Z+eobdmr11gG5D/6nPFyDlnisDwhpYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


   async function logout(){
        // await axios.get('/sanctum/csrf-cookie');

        const token = localStorage.getItem('token');

        axios.post('http://localhost/api/logout',{},{
            headers: {
                'Authorization': `Bearer ${token}`
            }
        }).then(function (response) {
            window.location.reload();
        });


    }
    async function  login(){

       // await axios.get('/sanctum/csrf-cookie');

        axios.post('http://localhost/api/login', {
            'email' : 'magadanuhak@gmail.com',
            'password' : 'magadanuhak@gmail.com',
            'password_confirmation' : 'magadanuhak@gmail.com',
        }).then(function (response) {
            console.log(response.data.token);
            localStorage.setItem('token', response.data.token);
            window.location.reload();
        });
    }
</script>

</body>
</html>
