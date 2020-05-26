

<nav>
    <div class="nav-wrapper black">
      <h5  class="brand-logo center">Editar Cadastro de Empresa</h5>
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
          <form class="container" action="../controller/update.php" method="POST">
            <div class = "row">
            <div class="input-field col s12">
                    <input type="hidden" name="id" value="<?php echo $dados['ID'];?>">
                    <input type="text" name="company" value="<?php echo $dados['TITLE'];?>" id="company" />
                    <label for="company">Empresa</label>
            </div>
            <div class="input-field col s12">
                    <input type="text" name="name" value="<?php echo $dados['UF_CRM_1590433615'];?>" id="name" />
                    <label for="name">Nome</label>
            </div>
            <div class="input-field col s12">
                    <input type="text" name="cpf" value="<?php echo $dados['UF_CRM_1590430873'];?>" id="cpf" />
                    <label for="cpf">CPF</label>
            </div>
            <div class="input-field col s12">
                    <input type="text" name="cnpj" value="<?php echo $dados['UF_CRM_1590433656'];?>" id="cnpj" />
                    <label for="cnpj">CNPJ</label>
            </div>
            <div class="input-field col s12">
                    <input type="email" name="email" value="<?php echo $dados['EMAIL'][0]->VALUE;?>" id="email"/>
                    <label for="email">E-Mail</label>
            </div>
            <div class="input-field col s12">
                    <input type="tel" name="phone" value="<?php echo $dados['PHONE'][0]->VALUE;?>" id="phone" />
                    <label for="phone">Telefone</label>
            </div>
            <div class="input-field col s12">
                <button  type="submit" class="btn-large grey darken-3" name="btn-editar">Editar<i class="material-icons right">send</i></button>
            </div>

            </div>
          </form>


      </div>

    </div>
  </div>
</div>

<h5  class="brand-logo center">Adicionar Contatos</h5>
<div class="row">
              <div class="col s12 m6 push-m3">
                <div class="card">
                  <div class="card-content">
                      <form class="container" action="../controller/createContact.php" method="POST">
                        <div class = "row">
                        <div class="input-field col s12">
                                <input type="hidden" name="id" value="<?php echo $dados['ID'];?>">
                                <input type="text" name="nome" value="<?php echo $nome;?>"  placeholder="Nome:" />
                        </div>
    
                        <div class="input-field col s12">
                                <input type="text" name="sobrenome" value="<?php echo $sobrenome;?>"  placeholder="Sobrenome:" />
                        </div>
                            <button  type="submit" class="btn-large grey darken-3" name="btn-contatos">Adicionar contato<i class="material-icons right">send</i></button>
                        </div>
                        </form>
                  </div>
                </div>
              </div>
  </div>

<h5  class="brand-logo center">Adicionar Negócios</h5>
<div class="row">
              <div class="col s12 m6 push-m3">
                <div class="card">
                  <div class="card-content">
                      <form class="container" action="../controller/createDeal.php" method="POST">
                        <div class = "row">
                        <div class="input-field col s12">
                                <input type="hidden" name="id" value="<?php echo $dados['ID'];?>">
                                <input type="hidden" name="valorUSD" value="<?php echo $valorUSD;?>">
                                <input type="text" name="nomeDeal"   placeholder="título do négocio:" />
                        </div>
    
                        <div class="input-field col s12">
                                <input type="text" name="valor"   placeholder="Valor em USD:" />
                        </div>
                            <button  type="submit" class="btn-large grey darken-3" name="btn-negocios">Negócio ganho<i class="material-icons right">send</i></button>
                        </div>
                        </form>
                  </div>
                </div>
              </div>
  </div>


  <div class="container">
  <div class="row valign-wrapper">
    <div class="col s6 offset-s3 valign">
      <div class="card red darken-4">
        <div class="card-content white-text">
          <span class="card-title">Valor total arrecadado para essa empresa:</span>
          <h4>USD <?php echo $valorUSD;?></h4>
        </div>
      </div>
    </div>
  </div>
</div>