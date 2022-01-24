<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@guest
    <button onclick="login()">Login</button>
@else
    <button onclick="logout()">Logout</button>

@endguest
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js" integrity="sha512-/Q6t3CASm04EliI1QyIDAA/nDo9R8FQ/BULoUFyN4n/BDdyIxeH7u++Z+eobdmr11gG5D/6nPFyDlnisDwhpYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // document.addEventListener('DOMContentLoaded', function () {
    // login()
    // })

    function logout(){
        const token = localStorage.getItem('token') ?? "10|kQqwV2OFlEJvhPz2IQfi52yIVJvc1k7kxbg0oG5Y";

        axios.post('http://localhost/api/auth/logout', {
            'email' : 'magadanuhak@gmail.com',
            'password' : 'magadanuhak@gmail.com',
        },{
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });
    }
    async function  login(){
        await axios.get('/sanctum/csrf-cookie');
        axios.post('http://localhost/api/auth/login', {
            'email' : 'magadanuhak@gmail.com',
            'password' : 'magadanuhak@gmail.com',
        }).then(function (response) {
            console.log(response.data.data.token);
            localStorage.setItem('token', response.data.data.token);
            window.location.reload();
        });
    }
</script>

</body>
</html>
