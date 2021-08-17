<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style>
        .toggle-menu {
        background: #333;
        width: 100%;
        height: 300px;
        z-index: 9999;
        padding: 2em 3em;
        font-family: 'Spectral', serif;
        font-size: 1.3em;
        color: #fff;
        position: absolute;
        top: -100%;
        transition: all .5s;
    }
    .toggle-menu h2{
        margin: 0 0 10px;
    }
    .menu-trigger{
        display: none;
    }
    label[for="menu-trigger"] {
        width: 120px;
        height: 30px;
        background: #1686ce;
        cursor: pointer;
        position: absolute;
        left: 10px;
        top: 10px;
        border-radius: 0px;
    }
    label[for="menu-trigger"]:after {
        content: '+ OPEN';
        display: block;
        position: absolute;
        color: #fff;
        left: 25%;
        top: 15%;
    }
    .menu-trigger:checked ~ .toggle-menu {
        top: 0;
    }
    .menu-trigger:checked + label[for="menu-trigger"]{
        top: 310px;
        position: absolute;
        background: #c32c2c;
        transition: all .5s;
        z-index: 99999;
    }
    .menu-trigger:checked + label[for="menu-trigger"]:after {
        content: '- CLOSE';
        display: block;
        position: absolute;
        color: #fff;
        left: 25%;
        top: 15%;
    }
    .menu-trigger:checked ~ .wrapper {
        top: 200px;
        margin-left: 10px;
        position: relative;
    }

</style>
<body>

    <form action="{{route('paypal')}}" class="mt-2 col-md-5 pt-2">
        @csrf
        <h1> Paypal Payment </h1>

        <input type="submit" value="Payment Online" class="col-md-12 btn btn-danger">
    </form>


        {{-- <input type="checkbox" id="menu-trigger" class="menu-trigger" name="">
        <label for="menu-trigger"></label>
        <br>
        <br>
        <div class="wrapper">
        <h1>CSS3 Slide Down Toggle</h1>
        <p>Click the Open buttno to show the hidden message</p>
        </div>
        <div class="toggle-menu">
            <h2>CSS3 Slide Down Toggle</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div> --}}



    {{-- <div class="container">

        <div class="panle">
            <div class="col-md-12">
                <h1 class="mt-4 mb-4 text-center"> This Is DropZone Form To Upload Files </h1>
                <form action="{{route('uploadimage')}}" class="dropzone" method="post">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.js" integrity="sha512-8Lox6Z3z1oZK4c0m05K84veEwiziEQvLQWFwz3y3juJz+HVXJ2HK6mRoQur23y9I3Bm2iMMAU/FngLqbwDs/+Q==" crossorigin="anonymous"></script></body>
</html>
