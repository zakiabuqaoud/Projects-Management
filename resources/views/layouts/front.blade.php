<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/zaki.css')}}" type="text/css">
    <title>project Management</title>

    <style>
        /*
        h1.title {
            color: brown;
            margin: 10px auto;
            width: 400px;
            font-size: 25px;
        }

        div.container {
            margin: 10px auto;
            background-color: aqua;
            width: 700px;
            height: 150px;
            text-align: center;
            padding: 8px;

        }

        a.create {
            margin-left: 500px;
            font-size: 25px;

        }



        label {
            width: 100px;
            display: inline-block;
            font-size: 20px
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        h3 {
            color: brown;
            margin: 10px auto;
            width: 400px;
            font-size: 25px
        }

        button.green {
            background-color: greenyellow;
        }

        button.red {
            background-color: red;
        }
        */
    </style>
</head>

<body>
    <header>
        <x-nav></x-nav>
    </header>
    {{$slot}}

    <footer class="bg-light text-center fixed-bottom text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 To communicate with me:
            <a class="text-dark" href="https://www.facebook.com/profile.php?id=100037663337235">My Account in Facebok </a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        function checkDelete() {
            return confirm("Are you sure you want to delete this project??")
        }
    </script>
</body>

</html>