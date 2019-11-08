<!DOCTYPE html>
<html>
<head>
  <title></title>


  <?php  include 'link.php';  ?>



          <div class="navmenu" style="position: fixed; width: 325px; height: 100%; top: 60px; display: block;">
              <h1 class="navbar-brand pos" style="font-size: 20px; padding: 60px 0 0 60px;" href="#">A L L  C A T E G O R I E S</h1>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              
              <form action="stock/check_stock.php" method="GET">
              <ul class="menu">
                <li><a href='show_stock.php?cate=mainboard'>MAINBOARD</a></li>
                <li><a href='show_stock.php?cate=cpu'>CPU</a></li>
                <li><a href='show_stock.php?cate=graphic'>GRAPHIC CARD</a></li>
                <li><a href='show_stock.php?cate=memory'>MEMORY</a></li>
                <li><a href='show_stock.php?cate=mouse'>MOUSE</a></li>
                <li><a href='show_stock.php?cate=keyboard'>KEYBOARD</a></li>
                <li><a href='show_stock.php?cate=allaccessories'>ALL ACCESSORIES</a></li>
              </ul>
              </form>
              
         </div>



  <nav class="navbar navbar-expand-lg navbar-dark topbar" style="position: fixed; width: 100%; top: 0; height:60px;" > 
  <a href="../index.php"><img src="../logo.png" class="navbar-brand pos"></a>
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupporte dContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            

        <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
            <input class="typeahead mr-sm-3 " name="text" id="text" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" style="padding:10px 10px;"><i class="fas fa-search"></i></button>
        </form> 
        <style >
.typeahead { 
  border:2px
  solid:black;
  border-radius: 4px;
  padding: 8px 12px;
  max-width: 300px;
  min-width: 290px;
  background: #282828;
  color: #fff;
}
            
.tt-menu { 
  width:300px; 
}
            
ul.typeahead{
  margin:0px;
  padding:10px 0px;
}
            
ul.typeahead.dropdown-menu li a {
  padding: 10px !important;  
  border-bottom:#282828 1px 
  solid;
  color:#fff;
}

ul.typeahead.dropdown-menu li a:hover{
  padding: 10px !important;  
  border-bottom:#282828 1px 
  solid;
  color:black;
}
            
ul.typeahead.dropdown-menu li:last-child a { 
  border-bottom:0px !important; 
}

.bgcolor {
  max-width: 550px;
  min-width: 290px;
  max-height:340px;
  padding: 100px 10px 130px;
  border-radius:4px;
  text-align:center;
  margin:10px;
}
            
.demo-label {
  font-size:1.5em;
  color: #1f1f1f;
  font-weight: 500;
  color:black;
}
            
.dropdown-menu>.active>a, 
.dropdown-menu>.active>a:focus, 
.dropdown-menu>.active>a:hover {
  text-decoration: none;
  background-color: #999999;
  outline: 0;
  display: block;
  color:#fff;
}
          
        </style> 



          <div style="padding: 10px 0 0 0;">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sign In
              </a>

              <form class="was-validated" action="../login/checklogin.php" method="post">
                  <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                  <div class="widthxheight">
                    <div class="hwemail">
                      <label for="exampleDropdownFormEmail1">Email address</label></div>
                <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com" required>
                      
                      <div class="hwpass">
                      <label for="exampleDropdownFormPassword1">Password</label></div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    
                    <div 
                    style="padding: 18px 0 0 0">
                    </div>
      
                      <div class="hwcheck">
                      <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                            
                            
                </div>
                  
      
                  <div class="dropdown-divider"></div>
      

                    <a class="dropdown-item-text" style="text-align : center;" href="../regis/regis.php" >Register</a>
                  </div>
              </div>
            </form>
            </li>
          </ul>
          </div>
          </div>
    

  </nav>

</head>
<body class="body">
<script>
    $(document).ready(function () {
        $('#text').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
          data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
            result($.map(data, function (item) {
              return item;
                        }));
                    }
                });
            }
        });
    });
</script>
</body>
</html>



