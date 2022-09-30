<!--Inicio modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperação de Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="recuperacaovalida.php" method="POST">
        <div class="form-group"> <br>
        <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="email2">
        </div>
        <div class="form-group"> <br>
        <label for="celular">Celular</label>
            <input name="celular" type="text" class="form-control" id="celular2">
        </div>
        <input type="submit" value="Enviar" class="btn btn-dark cor-botao text-white">
        </form>
      </div>
      
    </div>
  </div>
</div>
<!--fim modal-->