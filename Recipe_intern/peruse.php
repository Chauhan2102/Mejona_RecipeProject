<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">
</head> 
    <body style="background-color: #FEFCED;">
        <!-- NAV-BAR starts-->
       <nav class="navbar navbar-expand-lg navbar-light" 
       style="background-color: #B3DDF9;  border-bottom: 10px solid #DD3466; justify-content: space-around;">
           <div class="navbar-content">
               <h1 class="navbar-title fw-bold" style="font-family: 'Scriptina_Pro';">FlavorVerse</h1>
           </div>
           <div class="link">
               <ul class="nav nav-underline justify-content-end">
                   <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="#">Home</a>
                   </li>
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Vault</a>
                       <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="add_recipe.html">Contribute</a></li>
                         <li><a class="dropdown-item" href="peruse.html">Peruse</a></li>
                         <li><a class="dropdown-item" href="#">Logout</a></li>
                         <li><hr class="dropdown-divider"></li>
                         <li><a class="dropdown-item" href="login.html">Login using other credentials</a></li>
                       </ul>
                     </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#login">Login</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="register.html">Register</a>
                   </li>
                 </ul>
           </div>
       </nav>
        <!-- NAV-BAR done-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
        crossorigin="anonymous"></script>
</body>
</html>