<?php 
// Forçar o charset ISO-8859-1, se for removido algumas imagens com acentuação nos nomes não funcionaram
header ('Content-type: text/html; charset=ISO-8859-1');

// Gera um array com os arquivos dentro da pasta img
$diretorio = scandir("img/");

// Conta quantos arquivos foram encontrados
$qtdimages = count($diretorio);

// Função para pegar o nome da imagem ex: "03_Imagem.jpg" e separar caracteres desnecessários, assim retirando a extensão
// e os 3 primeiros caracteres. Para deixar de título da imagem
// Obs: Recomendo não usar acentuações nos nomes das imagens
function fileName($arquivo){
   $file = pathinfo($arquivo);
   $name = $file['filename'];
   echo substr($name, 3, strlen($name));
}

?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../vendors/img/icone.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    
    <title>RAVC - Gallery</title>
    <style>
    .border-color {
      border: 1px solid #3a74c1;
    }
    /*As setas do ekko lightbox por padrão são brancas porem não aparecem direito com imagens muito claras */
    .ekko-lightbox-nav-overlay a span {
      color:#000;
    }
    /*Isso faz as imagens das thumbnails ficarem preenchendo 150% do espaço dentro de cada bloco */
    .gallery {
      overflow:hidden;
      width:100%;
      height: 150px;
      opacity: 0.6;
      -webkit-transition: all 0.4s ease-in-out;
      -moz-transition: all 0.4s ease-in-out;
      -ms-transition: all 0.4s ease-in-out;
      -o-transition: all 0.4s ease-in-out;
      transition: all 0.4s ease-in-out;
    }
    .gallery:hover {
      opacity: 1;
    }
    .gallery img {
      width: 150%
    }
    .bg-gallery {
      background-color: #00274f
    }
    .col-md-2 {
      padding-left: 0!important;
      padding-right: 0!important;
    }
    </style>
  </head>
  <body class="bg-light">

    <header class="mb-2">
            <!-- title -->
      <nav class="navbar navbar-dark bg-primary">
        <div class="container">
          <a class="navbar-brand" href="#">RAVC - Galeria de imagens</a>
        </div>
      </nav>
    </header>

    <div class="content">
      <div class="container">
        <div class="row">
          <!-- A repetição para pegar cada imagem começa aqui  -->
          <?php for ($i=2; $i < $qtdimages; $i++) { ?>          
          <div class="col-md-2 bg-gallery">
            <a href="<?php echo "img" . DIRECTORY_SEPARATOR . $diretorio[$i]; ?>" data-toggle="lightbox" data-gallery="example-gallery" data-title="<?php fileName($diretorio[$i]); ?>">
              <div class="gallery">
                <img src="<?php echo "img" . DIRECTORY_SEPARATOR . $diretorio[$i]; ?>" alt="<?php echo "img" . DIRECTORY_SEPARATOR . $diretorio[$i]; ?>">
              </div>
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script>
      // Para inicializar o ekko-lightbox
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox();
      });
    </script>
  </body>
</html>