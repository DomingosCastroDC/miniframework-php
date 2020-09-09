<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->title ?></title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="/fontawesome/css/all.css" />
    </head>
    <body>
       
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
           <a class="navbar-brand text-white">BlogDomingos</a>
           <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div id="my-nav" class="collapse navbar-collapse">

               <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                       <a class="nav-link" href="/login">Login</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link " href="/registro" >Registro</a>
                   </li>
               </ul>
           </div>
       </nav>

        <div class="container">
        {{content}}
        </div>
      
    </body>
</html>