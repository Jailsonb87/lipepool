
        <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $row['idcliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel " aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel ">Alterar dados</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="editar.php" method="post" id="formulario" class=" m-0 ">       
                           <div class="row">
                                <div class="form-group input-group-sm col-6">
                                  <label for="bairro">Bairro:</label>
                                  <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $row['bairro']; ?>" required>
                                </div>
                                <div class="form-group input-group-sm col-6">
                                  <label for="cep">CEP:</label>
                                  <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $row['cep']; ?>" required>
                                </div>  
                            </div>
                           <div class="row">
                            <div class="form-group input-group-sm col-10">
                              <label for="endereco">Endereço:</label>
                              <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $row['endereco']; ?>" required>
                            </div>
                            <div class="form-group input-group-sm col-2">
                              <label for="numero">N°:</label>
                              <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $row['numero']; ?>" required>
                            </div>   
                           </div>    
                           <div class="row">
                                <div class="form-group input-group-sm col-6">
                                  <label for="telefone">Telefone:</label>
                                  <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>" required>           
                                </div>
                                <div class="form-group input-group-sm col-6">
                                  <label for="celular">Celular:</label>
                                  <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $row['celular']; ?>" required>           
                                </div>   
                            </div>
                            <div class="form-group input-group-sm ">
                            <button type="submit" class="btn float-right">Editar</button>
                             </div> 
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
  