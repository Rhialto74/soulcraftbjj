<style>
*{
    margin: 0;
    padding: 0;
}
.lost{
    color:#fff;
    font-family: 'Open Sans', Arial;
    background:  #074e68;
    text-align: center;
}
.lost h1{
    margin: 10px 0;
}
.lost a{
    color:#fff;
    font-family: 'Open Sans', Arial;
    text-align: center;
    font-weight: 700;
    text-decoration: none;
}
.lost a:hover{
    text-decoration: underline;
}
.lost img{
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
    display: block;
    margin-top: 40px;
    padding-top: 0;
}
</style>
<body class="lost">
    <a class="not-found" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url');?>/images/404.png"></a>
    <h5>404: Page Not Found</h5>
    <h1>Keep on looking...</h1>
    <p>Double check the URL or head back to the <a href="<?php bloginfo('url'); ?>">HOMEPAGE</a></p>
</body>


