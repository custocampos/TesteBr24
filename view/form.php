

<nav>
    <div class="nav-wrapper black">
      <h5  class="brand-logo center">Cadastrar Empresa</h5>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="./../index.php" class="btn waves-effect waves-red"><i class="material-icons center">arrow_back</i></a></li>
        <li><a href="./../index.php" class="waves-effect waves-red btn"><i class="material-icons center">home</i></a></li>
      </ul>
    </div>
  </nav>

            <div class="row">
              <div class="col s12 m6 push-m3">
                <div class="card">
                  <div class="card-content">
                      <form class="container" action="../controller/create.php" method="POST">
                        <div class = "row">
                        <div class="input-field col s12">
                                <input type="text" name="company" value="<?= $form->company; ?>" placeholder="Empresa:" />
                        </div>
                        <div class="input-field col s12">
                                <input type="text" name="name" value="<?= $form->name; ?>" placeholder="Nome:" />
                        </div>
                        <div class="input-field col s12">
                                <input type="text" name="cpf" value="<?= $form->cpf; ?>" placeholder="CPF:" />
                        </div>
                        <div class="input-field col s12">
                                <input type="text" name="cnpj" value="<?= $form->cnpj; ?>" placeholder="CNPJ:" />
                        </div>
                        <div class="input-field col s12">
                                <input type="email" name="email" value="<?= $form->mail; ?>" placeholder="E-mail:"/>
                        </div>
                        <div class="input-field col s12">
                                <input type="tel" name="phone" value="<?= $form->phone; ?>"placeholder="Telefone:" />
                        </div>
                        <div class="input-field col s12">
                            <button  type="submit" class="btn-large grey darken-3" name="btn-cadastrar">Cadastrar<i class="material-icons right">send</i></button>
                        </div>
                        
                            </form>

                            <div id="modalb" class="modal">
                        <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>já existe um cadastro com esse CPF e CNPJ. Deseja atualizar as informações?</p>
                        </div>
                        <div class="modal-footer">					     

                            <form action="../controller/update.php" method="POST">
                            <button type="submit" name="btn-editar2" class="btn green">Sim, quero atualizar</button>

                                <a href="adicionar.php?pg=1" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

                        </div>
                        </div>


                        </div>
                      </form>


                  </div>

                </div>
              </div>
            </div>
  