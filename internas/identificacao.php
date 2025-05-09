
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
            <input autocomplete="new-password" type="hidden" autocomplete="new-password" name="acao" value="consulta"/>
            <input autocomplete="new-password" type="hidden" name="redirect" value="./inscricao" />
            <div class="container">
                <div class="section-header">
                    <div class="section-header__content">
                        <h3>Formulário de Pré Credenciamento</h3>
                        <h4>Informe seu CPF para começar a inscrição</h4>
                    </div>
                </div>
                <div class="contact__wrapper wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-8 col-md-9 col-lg-10"> 
                                        <label for="Cpf_Inscrito">CPF</label>    
                                        <input autocomplete="new-password" type="text" name='Cpf' id='Cpf_Inscrito' placeholder="CPF*" required value='' maxlength="14" class='cpf form-control'  />
                                    </div>
                                    <div class="col-4 col-md-3 col-lg-2 text-right mt-4">
                                        <button type="submit" class="default-btn"><span>Buscar</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
                            

    </section>
    <!-- ================> Contact section end here <================== -->