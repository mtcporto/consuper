
    <!-- ================> Page header start here <================== -->
    <section class="page-header bg--cover" style="background-image: url(assets/images/header/bg.png);">
        <div class="container">
            <div class="page-header__content text-center">
                <h2 class="text-uppercase">Inscrição</h2>

            </div>
        </div>
    </section>
    <!-- ================> Page header end here <================== -->

    <!-- ================> Contact section start here <================== -->
    <section class="contact padding-top padding-bottom"  id="dadosForm">


        <form id="cadastro" name="cadastro" class="sistema form" method="POST" action="./painel/">
            <input autocomplete="new-password" type="hidden" autocomplete="new-password" name="modulo" value="Inscrito"/>
            <input autocomplete="new-password" type="hidden" autocomplete="new-password" name="acao" value="inscrever"/>
            <input autocomplete="new-password" type="hidden" name="redirect" value="./sucesso" />
            <input autocomplete="new-password" name="tipo" value="C" type="hidden" /> 
            <div class="container">
                <div class="section-header">
                    <div class="section-header__content">
                        <h3>Formulário de Pré Credenciamento</h3>
                        <h4>Dados Pessoais</h4>
                    </div>
                </div>
                
                <div class="contact__wrapper wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                    <label for="Cpf_Inscrito">CPF</label>    
                                        <input autocomplete="new-password" type="text" name='Cpf' id='Cpf_Inscrito' placeholder="CPF*" <?php echo ($Inscrito->Cpf ? 'readonly="true"' : ''); ?> required value='<?php echo Funcoes::formatar_cpf_cnpj($Inscrito->Cpf); ?>' maxlength="14" class='cpf form-control' elementRefresh="{element:'#dadosForm',url:'./<?php echo $pagina;?>'}" />
                                    </div>
                                    <div class="col-md-6">
                                    <label for="idCargo">Cargo</label>    
                                    <select autocomplete="new-password"  name='idCargo' id='idCargo' >
                                    <option value="">Selecionar</option>
                                    <?php 
                                    require_once("painel/modulos/Cargo/model.php");
                                    $Cargo=new Cargo();
                                    $Cargo->nLimite='';
                                    $arrayCargo=$Cargo->liste();
                                    if($arrayCargo['lista']){
                                        foreach ($arrayCargo['lista'] as $key => $OBJ) { ?>
                                        <option value="<?php echo $OBJ->{$OBJ->primary}; ?>" <?php if(($OBJ->{$OBJ->primary}==@$Inscrito->idCargo || trim($OBJ->Cargo)==trim($Inscrito->Cargo))){ ?>selected="selected"<?php } ?>><?php echo $OBJ->Cargo; ?></option><?php } ?>
                                    <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ol-md-12 col-lg-6">
                                    <label for="NomeCompleto_Inscrito">Nome Completo</label>    
                                        <input autocomplete="new-password" type="text" name='NomeCompleto' id='NomeCompleto_Inscrito' placeholder="Nome Completo*" class="form-control" required  value='<?php echo $Inscrito->NomeCompleto; ?>'/>
                                    </div>
                                    <div class="ol-md-12 col-lg-6">
                                    <label for="NomeCracha_Inscrito">Nome Crachá</label>    
                                        <input autocomplete="new-password" type="text" name='NomeCracha' id='NomeCracha_Inscrito' placeholder="Nome Crachá*" class="form-control" required  value='<?php echo $Inscrito->NomeCracha; ?>'/>
                                    </div>                                
                                    <div class="col-md-6 col-lg-4">
                                    <label for="Telefone_Inscrito">Telefone</label>    
                                        <input autocomplete="new-password" type="text" name='Tel' id='Telefone_Inscrito' placeholder="Tel*" class="telefone form-control" maxlength="15" required value='<?php echo (@$Inscrito->Tel ? Funcoes::formatar_telefone($Inscrito->Tel) : ''); ?>'/>
                                    </div>
                                    <div class="col-md-6 col-lg-8">
                                    <label for="Email_Inscrito">Email</label>    
                                        <input autocomplete="new-password" type="text" name='Email' id='Email_Inscrito' placeholder="Email*" class="form-control" required value='<?php echo $Inscrito->Email; ?>'/>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                    <label for="cep_Inscrito">CEP</label>    
                                        <input autocomplete="new-password" type="text" name='cep' id='cep_Inscrito' placeholder="CEP*"  maxlength="9"  class="cep form-control" required value='<?php echo (@$Inscrito->cep ? Funcoes::formatar_cep($Inscrito->cep) : ''); ?>'/>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                    <label for="Endereco_Inscrito">Endereço</label>    
                                        <input autocomplete="new-password" type="text" name='Endereco' id='Endereco_Inscrito' class="rua form-control" placeholder="Endereço*" required  value='<?php echo $Inscrito->Endereco; ?>' />
                                    </div>

                                    <div class="col-md-4 col-lg-3 form-group">
                                    <label for="Numero_Inscrito">Número</label>    
                                        <input autocomplete="new-password" type="text" name='Numero' id='Numero_Inscrito' class="numero form-control"  placeholder="Número*" required value='<?php echo $Inscrito->Numero; ?>'/>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                    <label for="bairro_Inscrito">Bairro</label>    
                                        <input autocomplete="new-password" type="text" name='bairro' id='bairro_Inscrito' class="bairro form-control" placeholder="Bairro*" required value='<?php echo $Inscrito->bairro; ?>'/>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                    <label for="cidade_Inscrito">Cidade</label>    
                                        <input autocomplete="new-password" type="text" name='cidade' id='cidade_Inscrito' class="cidade form-control" placeholder="Cidade*" required value='<?php echo $Inscrito->cidade; ?>'/>
                                    </div>
                                    <div class="col-md-3 col-lg-2">
                                    <label for="estado_Inscrito">UF</label>    
                                        <input autocomplete="new-password" type="text" name='estado' maxlength="2" id='estado_Inscrito' class="uf form-control" placeholder="UF*" required value='<?php echo $Inscrito->estado; ?>'/>
                                    </div>
                                </div>
                        </div>
                    </div>

                </div>

                <div class="section-header">
                    <div class="section-header__content">
                    <h4>Dados da Empresa</h4>
                    </div>
                </div>

                <div class="contact__wrapper wrapper">

                    <?php if($Itensevento->Empresa_idEmpresa && $Empresa->{$Empresa->primary}){ ?>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6">
                            <div class="alert alert-warning text-center">
                                <p>
                                    <strong>Você já possui inscrição neste evento no CNPJ abaixo!</strong>
                                    <br/>
                                    Para efetuar esta alteração, entre em contato com a organização do evento.
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="row justify-content-center" id="dadosEmpresa">
                        <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-6  form-group">
                                    <label for="Cnpj_Empresa">CNPJ</label>    
                                        <input autocomplete="new-password" type="text" name='Cnpj' id='Cnpj_Empresa' placeholder="CNPJ*" <?php echo (@$Empresa->{$Empresa->primary} && @$Empresa->Cnpj ? 'readonly="true"' : ''); ?> required value='<?php echo (@$Empresa->Cnpj ? Funcoes::formatar_cpf_cnpj($Empresa->Cnpj) : $_REQUEST['Cnpj']); ?>'  maxlength="22" class='cnpj form-control'  elementRefresh="{element:'#dadosEmpresa',url:'./<?php echo $pagina;?>',loading:'#loadingEmpresa'}"/>
                                    </div> 
                                    <div class="col-md-6 form-group">
                                        <label for="idTipo_Empresa">Categoria</label>    
                                        <select autocomplete="new-password"  name='idTipo' id='idTipo_Empresa' placeholder="Categoria" required class="form-control" <?php echo (@$Empresa->{$Empresa->primary} && @$Empresa->idTipo ? 'readonly="true"' : ''); ?>>
                                        <option value="">Selecionar</option>
                                        <?php 
                                        require_once("painel/modulos/Tipo/model.php");
                                        $Tipo=new Tipo();
                                        $Tipo->nLimite='';
                                        $arrayTipo=$Tipo->liste();
                                        if($arrayTipo['lista']){
                                            foreach ($arrayTipo['lista'] as $key => $OBJ) { ?>
                                            <option value="<?php echo $OBJ->{$OBJ->primary}; ?>" <?php if(($OBJ->{$OBJ->primary}==@$Empresa->idTipo)){ ?>selected="selected"<?php } ?>><?php echo $OBJ->Tipo; ?></option>
                                        <?php }} ?>
                                        </select>
                                    </div>
                                    
                                    <div class="ol-md-12 col-lg-6 form-group">
                                    <label for="RazaoSocial_Empresa">Razão Social</label>    
                                        <input autocomplete="new-password" type="text" name='RazaoSocial' id='RazaoSocial_Empresa' <?php echo (@$Empresa->{$Empresa->primary} && @$Empresa->RazaoSocial ? 'readonly="true"' : ''); ?> placeholder="Razão Social*" class="form-control" required  value='<?php echo $Empresa->RazaoSocial; ?>'/>
                                    </div>
                                    <div class="col-md-12 col-lg-6 form-group">
                                    <label for="NomeFantasia_Empresa">Nome Fantasia</label>    
                                        <input autocomplete="new-password" type="text" name='NomeFantasia' id='NomeFantasia_Empresa' <?php echo (@$Empresa->{$Empresa->primary} && @$Empresa->NomeFantasia ? 'readonly="true"' : ''); ?> placeholder="Nome Fantasia*" class="form-control"required value='<?php echo $Empresa->NomeFantasia; ?>'/>
                                    </div>



                                    <div class="col-md-6 col-lg-4 form-group">
                                    <label for="Telefone_Empresa">Telefone</label>    
                                        <input autocomplete="new-password" type="text" name='Telefone_empresa' id='Telefone_Empresa' placeholder="Telefone*" required class="telefone form-control" maxlength="15"  value='<?php echo (@$Empresa->Telefone ? Funcoes::formatar_telefone($Empresa->Telefone) : ''); ?>'/>
                                    </div>
                                    <div class="col-md-6 col-lg-4 form-group">
                                    <label for="Fax_Empresa">Whatsapp</label>    
                                        <input autocomplete="new-password" type="text" name='Fax_empresa' id='Fax_Empresa' placeholder="Whatsapp" class="telefone form-control" maxlength="15"  value='<?php echo (@$Empresa->Fax ? Funcoes::formatar_telefone($Empresa->Fax) : ''); ?>'/>
                                    </div>
                                    <div class="col-md-12 col-lg-4 form-group">
                                    <label for="Email_Empresa">Email</label>    
                                        <input autocomplete="new-password" type="text" name='Email_empresa' id='Email_Empresa' placeholder="Email*" required class="form-control" value='<?php echo $Empresa->Email; ?>'/>
                                    </div>

                                    <div class="col-md-6 col-lg-3 form-group">
                                    <label for="cep_Empresa">CEP</label>    
                                        <input autocomplete="new-password" type="text" name='cep_empresa' id='cep_Empresa' placeholder="CEP*" maxlength="9" class="cep form-control" required value='<?php echo (@$Empresa->cep ? Funcoes::formatar_cep($Empresa->cep) : ''); ?>'/>
                                    </div>
                                    <div class="col-md-6 col-lg-6 form-group">
                                    <label for="Endereco_Empresa">Endereço</label>    
                                        <input autocomplete="new-password" type="text" name='Endereco_empresa' id='Endereco_Empresa' class="rua form-control" required placeholder="Endereço*" required value='<?php echo $Empresa->Endereco; ?>'/>
                                    </div>
                                    <div class="col-md-4 col-lg-3 form-group">
                                    <label for="Numero_Empresa">Número</label>    
                                        <input autocomplete="new-password" type="text" name='Numero_empresa' id='Numero_Empresa' class="numero form-control" required placeholder="Número*" required value='<?php echo $Empresa->Numero; ?>'/>
                                    </div>

                                    <div class="ccol-md-6 col-lg-4 form-group">
                                    <label for="Bairro_Empresa">Bairro</label>    
                                        <input autocomplete="new-password" type="text" name='Bairro_empresa' id='Bairro_Empresa' class="bairro form-control" required placeholder="Bairro*" required value='<?php echo $Empresa->Bairro; ?>'/>
                                    </div>
                                    <div class="col-md-3 col-lg-6 form-group">
                                    <label for="Cidade_Empresa">Cidade</label>    
                                        <input autocomplete="new-password" type="text" name='Cidade_empresa' id='Cidade_Empresa' class="cidade form-control" required placeholder="Cidade*" required value='<?php echo $Empresa->Cidade; ?>'/>
                                    </div>
                                    <div class="col-md-3 col-lg-2 form-group">
                                    <label for="Estado_Empresa">Estado</label>    
                                        <input autocomplete="new-password" type="text"  maxlength="2"  name='Estado_empresa' id='Estado_Empresa' class="uf form-control" required placeholder="Estado*" required value='<?php echo $Empresa->Estado; ?>'/>
                                    </div>
                                    
                                    <div class="col-md-12 form-group">
                                        <strong>Termo de aceite</strong>
                                        <div class="termoaceite">
                                            <?php echo $Evento->termo_aceite;?>
                                        </div>
                                        <div class="form-group">
                                            <input name="aceite" class="form-check-input" type="checkbox" value="S" id="aceite">
                                            <label class="form-check-label mt-4" for="flexCheckDefault">
                                            Concordo com os termos acima.
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-center mt-4  form-group">
                                    <button type="submit" class="default-btn"><span>Enviar</span></button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- ================> Contact section end here <================== -->