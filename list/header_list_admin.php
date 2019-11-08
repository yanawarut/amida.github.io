<!DOCTYPE html>
<html>
<head>
  <title></title>


  <?php  include_once('link.php');  ?>

  
  <nav class="navbar navbar-expand-lg navbar-dark  topbar" style="position: fixed; width: 100%; top: 0px" > 
    
  <a href="../index.php"><img src="../logo.png" class="navbar-brand pos"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            

        <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
            <input class="typeahead mr-sm-3 " name="text" id="text" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
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



          <li class="nav-item">
              <a class="nav-link" href="oder.php">รายการสั่งซื้อ</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../login/logout.php">Log out</a>
          </li>
          </ul>
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



