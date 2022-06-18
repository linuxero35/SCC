
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/e16f74cfa0.js" crossorigin="anonymous"></script>
    <title>Bootstrap Css Form Style : Demo 34</title>

        <link rel="icon" type="image/x-icon" href="../../images/favicon.ico">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->

<!-- <link rel="stylesheet" href="http://jrain.oscitas.netdna-cdn.com/tutorial/css/fontawesome-all.min.css"> -->
<!-- <link rel="stylesheet" href="https://e6t7a8v2.stackpathcdn.com/tutorial/css/fontawesome-all.min.css"> -->
<link rel="stylesheet" href="css/fontawesome-all.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="http://jrain.oscitas.netdna-cdn.com/tutorial/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://e6t7a8v2.stackpathcdn.com/tutorial/css/bootstrap.min.css"> -->


<link rel="stylesheet" href="css/common-1.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"/>

</head>
<body>
    <div id="header" class="container-fluid">
        <div class="row">
            <div class="col-sm-4 hidden-xs text-left">
                <a href="http://bestjquery.com/tutorial/form/demo33/" class="prev-button">
                    <i class="demo-icon icon-left-outline"></i>
                    previous demo
                </a>
            </div>

            <div class="col-sm-4 col-xs-5 text-center logo">
    <a href="http://www.bestjquery.com/"><img src="../../images/logo.png" width="138px" height="31px" alt="Best jQuery"/></a>
</div>

<div class="col-sm-4 col-xs-7 text-right">
    <a href="http://www.bestjquery.com/codelab/" class="code-button">
        codelab
        <i class="demo-icon icon-right-outline"></i>
    </a>
</div>        </div>
    </div>

    <div class="demo form-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="white">bootstrap login form style : demo 34</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
                    <div class="form-container">
                    	<div class="form-icon">
                    		<i class="fa fa-user-circle"></i>
                    		<span class="signup"><a href="">Don't have account? Signup</a></span>
                    	</div>
                        <form class="form-horizontal">
                            <h3 class="title">Member Login</h3>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                <input class="form-control" type="email" placeholder="Email Address"/>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" placeholder="Password"/>
                            </div>
                            <button class="btn signin">Login</button>
                            <span class="forgot-pass"><a href="#">Forgot Username/Password?</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="code-wrapper" class="container-fluid">
        <div class="row">
            <div id="ad1_inline" class="col-md-12 text-center ads-728"></div>

            <div class="col-md-6">
                <h3 class="code-heading">HTML</h3>
                <span>(Icon Fonts Used : <a href="https://fontawesome.com/v4.7.0/" target="_blank">Fontawesome</a> & CSS Framwork: <a href="https://getbootstrap.com/docs/3.3/" target="_blank">Bootstrap</a>)</span>
                <div class="common-height">
                    <pre class="brush: html; toolbar: false; stripBrs: true;">
                        <div class="form-bg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
					                    <div class="form-container">
					                    	<div class="form-icon">
					                    		<i class="fa fa-user-circle"></i>
					                    		<span class="signup"><a href="">Don't have account? Signup</a></span>
					                    	</div>
					                        <form class="form-horizontal">
					                            <h3 class="title">Member Login</h3>
					                            <div class="form-group">
					                                <span class="input-icon"><i class="fa fa-envelope"></i></span>
					                                <input class="form-control" type="email" placeholder="Email Address"/>
					                            </div>
					                            <div class="form-group">
					                                <span class="input-icon"><i class="fa fa-lock"></i></span>
					                                <input class="form-control" type="password" placeholder="Password"/>
					                            </div>
					                            <button class="btn signin">Login</button>
					                            <span class="forgot-pass"><a href="#">Forgot Username/Password?</a></span>
					                        </form>
					                    </div>
					                </div>
                                </div>
                            </div>
                        </div>
                    </pre>
                </div>
            </div>

            <div class="col-md-6">
                <h3 class="code-heading">CSS</h3>
                <span>(Fonts required: <a href="https://fonts.google.com/" target="_blank">Roboto</a>.)</span>
                <div class="common-height">
                    <pre class="brush: css; toolbar: false;">
						.form-container{
						    background: linear-gradient(#E9374C,#D31128);
						    font-family: 'Roboto', sans-serif;
						    font-size: 0;
						    padding: 0 15px;
						    border: 1px solid #DC2036;
						    border-radius: 15px;
						    box-shadow: 0 0 20px rgba(0,0,0,0.2);
						}
						.form-container .form-icon{
						    color: #fff;
						    font-size: 13px;
						    text-align: center;
						    text-shadow: 0 0 20px rgba(0,0,0,0.2);
						    width: 50%;
						    padding: 70px 0;
						    vertical-align: top;
						    display: inline-block;
						}
						.form-container .form-icon i{
						    font-size: 124px;
						    margin: 0 0 15px;
						    display: block;
						}
						.form-container .form-icon .signup a{
						    color: #fff;
						    text-transform: capitalize;
						    transition: all 0.3s ease;
						}
						.form-container .form-icon .signup a:hover{ text-decoration: underline; }
						.form-container .form-horizontal{
						    background: rgba(255,255,255,0.99);
						    width: 50%;
						    padding: 60px 30px;
						    margin: -20px 0;
						    border-radius: 15px;
						    box-shadow: 0 0 20px rgba(0,0,0,0.2);
						    display: inline-block;
						}
						.form-container .title{
						    color: #454545;
						    font-size: 23px;
						    font-weight: 900;
						    text-align: center;
						    text-transform: capitalize;
						    letter-spacing: 0.5px;
						    margin: 0 0 30px 0;
						}
						.form-horizontal .form-group{
						    background-color: rgba(255,255,255,0.15);
						    margin: 0 0 15px;
						    border: 1px solid #b5b5b5;
						    border-radius: 20px;
						}
						.form-horizontal .input-icon{
						    color: #b5b5b5;
						    font-size: 15px;
						    text-align: center;
						    line-height: 38px;
						    height: 35px;
						    width: 40px;
						    vertical-align: top;
						    display: inline-block;
						}
						.form-horizontal .form-control{
						    color: #b5b5b5;
						    background-color: transparent;
						    font-size: 14px;
						    letter-spacing: 1px;
						    width: calc(100% - 55px);
						    height: 33px;
						    padding: 2px 10px 0 0;
						    box-shadow: none;
						    border: none;
						    border-radius: 0;
						    display: inline-block;
						    transition: all 0.3s;
						}
						.form-horizontal .form-control:focus{
						    box-shadow: none;
						    border: none;
						}
						.form-horizontal .form-control::placeholder{
						    color: #b5b5b5;
						    font-size: 13px;
						    text-transform: capitalize;
						}
						.form-horizontal .btn{
						    color: rgba(255,255,255,0.8);
						    background: #E9374C;
						    font-size: 15px;
						    font-weight: 500;
						    text-transform: uppercase;
						    letter-spacing: 1px;
						    width: 100%;
						    margin: 0 0 10px 0;
						    border: none;
						    border-radius: 20px;
						    transition: all 0.3s ease;
						}
						.form-horizontal .btn:hover,
						.form-horizontal .btn:focus{
						    color: #fff;
						    background-color: #D31128;
						    box-shadow: 0 0 5px rgba(0,0,0,0.5);
						}
						.form-horizontal .forgot-pass{
						    font-size: 12px;
						    text-align: center;
						    display: block;
						}
						.form-horizontal .forgot-pass a{
						    color: #999;
						    transition: all 0.3s ease;
						}
						.form-horizontal .forgot-pass a:hover{
						    color: #777;
						    text-decoration: underline;
						}
						@media only screen and (max-width:576px){
						    .form-container{ padding-bottom: 15px; }
						    .form-container .form-icon{
						        width: 100%;
						        padding: 20px 0;
						    }
						    .form-container .form-horizontal{
						        width: 100%;
						        margin: 0;
						    }
						}
                    </pre>
                </div>
            </div>


        </div>
    </div>

    <!--js-->
        <div id="license">
    <a href="https://www.bestjquery.com/codelab-license-terms/">License Terms</a>
</div>

<!--<script type="text/javascript" src="http://jrain.oscitas.netdna-cdn.com/tutorial/js/jquery-1.12.0.min.js"></script>-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


<div id="ad1_footer" style="display: none;">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <!-- 728-CodeLab-Demo --> <ins class="adsbygoogle"      style="display:inline-block;width:728px;height:90px"      data-ad-client="ca-pub-3311815518700050"      data-ad-slot="5805089606"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
</div>

<script type="text/javascript" src="js/script.js"></script>


</body>
</html>
