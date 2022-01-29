<!DOCTYPE html>
<html lang="pt-br">
<head >
	<title>lista</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="salvo" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div class="border rounded mb-3 w-50 p-3 position-relative top-0 start-50 translate-middle-x" >
<h2>CADASTRAR PESSOA</h2>
<form id="form" >
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o seu nome" minlength="2" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Insira o seu e-mail" minlength="8" required>
  </div>
  <div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" class="form-control" name="CPF" id="cpf" placeholder="Insira o seu CPF" data-mask="000.000.000-00" minlength="14" required>
  </div>
  <div>
  <input form="form" type="submit" class="btn btn-primary"  value="Cadastrar" >

  </div>
   

</form>
</div>



<div class="border rounded mb-3 w-75 p-3 position-relative top-0 start-50 translate-middle-x">
<h1>Lista de ususários</h1>
    <div >
        <table class="table list"> 
        
            
        </table>
    </div>

  <button id="limpar" >Limpar</button>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>
