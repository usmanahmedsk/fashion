<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        body {
            background: #eee
        }
        .main_div{
            margin: 50px;
            height: auto;
            min-height: 500px;
        }
        .wrapper {
            margin-top: 30px
        }

        .card {
            border: 1px solid #eee;
            cursor: pointer
        }

        .weight {
            margin-top: -65px;
            transition: all 0.5s
        }

        .weight small {
            color: #e2dede
        }

        .buttons {
            padding: 10px;
            background-color: #d6d4d44f;
            border-radius: 4px;
            position: relative;
            margin-top: 7px;
            opacity: 0;
            transition: all 0.8s
        }

        .dot {
            height: 14px;
            width: 14px;
            background-color: green;
            border-radius: 50%;
            position: absolute;
            left: 27%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 8px;
            color: #fff;
            opacity: 0
        }

        .cart-button {
            height: 48px
        }

        .cart-button:focus {
            box-shadow: none
        }

        .cart {
            position: relative;
            height: 48px !important;
            width: 50px;
            margin-right: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            padding: 11px;
            border-radius: 5px;
            font-size: 14px;
            transition: 1s ease-in-out;
            overflow: hidden
        }

        .cart-button.clicked span.dot {
            animation: item 0.3s ease-in forwards
        }

        @keyframes item {
            0% {
                opacity: 1;
                top: 30%;
                left: 30%
            }

            25% {
                opacity: 1;
                left: 26%;
                top: 0%
            }

            50% {
                opacity: 1;
                left: 23%;
                top: -22%
            }

            75% {
                opacity: 1;
                left: 19%;
                top: -18%
            }

            100% {
                opacity: 1;
                left: 14%;
                top: 28%
            }
        }

        .card:hover .buttons {
            opacity: 1
        }

        .card:hover .weight {
            margin-top: 10px
        }

        .card:hover {
            transform: scale(1.04);
            z-index: 2;
            overflow: hidden
        }


/*====================
  Footer
====================== */

/* Main Footer */
footer .main-footer{  padding: 20px 0;  background: #252525;}
footer ul{  padding-left: 0;  list-style: none;}

/* Copy Right Footer */
.footer-copyright { background: #222; padding: 5px 0;}
.footer-copyright .logo {    display: inherit;}
.footer-copyright nav {    float: right;    margin-top: 5px;}
.footer-copyright nav ul {  list-style: none; margin: 0;  padding: 0;}
.footer-copyright nav ul li { border-left: 1px solid #505050; display: inline-block;  line-height: 12px;  margin: 0;  padding: 0 8px;}
.footer-copyright nav ul li a{  color: #969696;}
.footer-copyright nav ul li:first-child { border: medium none;  padding-left: 0;}
.footer-copyright p { color: #969696; margin: 2px 0 0;}

/* Footer Top */
.footer-top{  background: #252525;  padding-bottom: 30px; margin-bottom: 30px;  border-bottom: 3px solid #222;}

/* Footer transparent */
footer.transparent .footer-top, footer.transparent .main-footer{  background: transparent;}
footer.transparent .footer-copyright{ background: none repeat scroll 0 0 rgba(0, 0, 0, 0.3) ;}

/* Footer light */
footer.light .footer-top{ background: #f9f9f9;}
footer.light .main-footer{  background: #f9f9f9;}
footer.light .footer-copyright{ background: none repeat scroll 0 0 rgba(255, 255, 255, 0.3) ;}

/* Footer 4 */
.footer- .logo {    display: inline-block;}

/*====================
  Widgets
====================== */
.widget{  padding: 20px;  margin-bottom: 40px;}
.widget.widget-last{  margin-bottom: 0px;}
.widget.no-box{ padding: 0; background-color: transparent;  margin-bottom: 40px;
  box-shadow: none; -webkit-box-shadow: none; -moz-box-shadow: none; -ms-box-shadow: none; -o-box-shadow: none;}
.widget.subscribe p{  margin-bottom: 18px;}
.widget li a{ color: #198754;}
.widget li a:hover{ color: #4b92dc;}
.widget-title {margin-bottom: 20px;}
.widget-title span {background: #839FAD none repeat scroll 0 0;display: block; height: 1px;margin-top: 25px;position: relative;width: 20%;}
.widget-title span::after {background: inherit;content: "";height: inherit;    position: absolute;top: -4px;width: 50%;}
.widget-title.text-center span,.widget-title.text-center span::after {margin-left: auto;margin-right:auto;left: 0;right: 0;}
.widget .badge{ float: right; background: #7f7f7f;}

.typo-light h1,
.typo-light h2,
.typo-light h3,
.typo-light h4,
.typo-light h5,
.typo-light h6,
.typo-light p,
.typo-light div,
.typo-light span,
.typo-light small{  color: #fff;}

ul.social-footer2 { margin: 0;padding: 0; width: auto;}
ul.social-footer2 li {display: inline-block;padding: 0;}
/* ul.social-footer2 li a:hover {background-color:#ff8d1e;} */
ul.social-footer2 li a {display: block; height:30px;width: 30px;text-align: center;}
/* .btn{background-color: #ff8d1e; color:#fff;} */
.btn:hover, .btn:focus, .btn.active {background: #0b5c37;color: #fff;
-webkit-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-moz-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-ms-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-o-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-webkit-transition: all 250ms ease-in-out 0s;
-moz-transition: all 250ms ease-in-out 0s;
-ms-transition: all 250ms ease-in-out 0s;
-o-transition: all 250ms ease-in-out 0s;
transition: all 250ms ease-in-out 0s;

}
    </style>

    <title>Fashion</title>
  </head>

  <body>

{{View::make('layout_master.header')}}
<div class="main_div">
@yield('content')
</div>
{{View::make('layout_master.footer')}}
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const cartButtons = document.querySelectorAll('.cart-button');

        cartButtons.forEach(button => {

        button.addEventListener('click',cartClick);

        });

        function cartClick(){
        let button =this;
        button.classList.add('clicked');
        }
    });
  </script>
</html>
