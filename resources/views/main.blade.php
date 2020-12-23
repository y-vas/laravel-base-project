<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="utf-8"                                                             />
<meta name="viewport"     content="width=device-width, initial-scale=1.0"         />
<link rel="canonical"     href="{{ config('app.url') }}"                          />
<link rel="icon"          href="/favicon.ico" type="image/x-icon"                 />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"                 />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"                 />

<title> tests </title>
<link href="/css/normalize.css"  rel="stylesheet" type="text/css" media="screen"  />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style media="screen">
  .main-head{
    height: 40px
  }

  .btn{
    border-radius: 20px;
  }

  .btn-hpp{
    background: white;
    border: 1px solid black;
  }

  .input-hpp{
    background-color: white;
    border-radius: 20px;
    border: 1px solid grey;
  }
  .rem-2::after{
    height: 1.75rem !important;
  }
  .rem-2, .rem-2::after{
    font-size: .805rem;
    height: 1.9rem;
    line-height: 1.3;
  }

  body{
    background-color: #FCFCFC !important;
  }
</style>

@yield('styles')

</head>

<body>
  @yield('body')
  @yield('left-bar')
</body>

<script src="https://use.fontawesome.com/454f326d09.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@yield('scripts')

</html>
