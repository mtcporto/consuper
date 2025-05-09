    <!-- ================> Banner section start here <================== -->
    <section id="home" class="banner banner--overlay" style="background-image: url(assets/images/header/bg.png); " >
     <div id="ytbg" class="videohome" data-ytbg-fade-in="true" data-youtube="https://youtu.be/t7wJPW6kxik"> 
     </div> 
        <div class="container">
            <div class="banner__wrapper">
                <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">                 
                    <div class="banner__bottom">
                        <ul class="countdown justify-content-center" data-date="October 14, 2024 17:00:00" id="countdown">
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-days">00</h3>
                                <p class="countdown__text">Dias</p>
                            </li>
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-hours">00</h3>
                                <p class="countdown__text">Horas</p>
                            </li>
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-minutes">00</h3>
                                <p class="countdown__text">Min</p>
                            </li>
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-seconds">00</h3>
                                <p class="countdown__text">Seg</p>
                            </li>
                        </ul>
                    </div>
                    <h4 class="mt-4 mb-0 databannar">14 a 16 de outubro de 2024 em João Pessoa</h4>
                    <h5 class="mt-0 mb-0 databannar">das 17h às 22h</h5>
                    <a href="inscricao" class="default-btn move-right"><span>Inscrições<i class="fa-solid fa-arrow-right"></i></span> </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> Banner section end here <================== -->

    <!-- ================> About section start here <================== -->
    <section class="about padding-top padding-bottom">
        <div class="container">
            <div class="about__wrapper">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="about__thumb" data-aos="fade-up" data-aos-duration="1500">
                            <img src="assets\images\logo\logo.png" alt="About Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
						<div class="about__content" data-aos="fade-up" data-aos-duration="2000">
							<h2><?php echo $Evento->Evento; ?></h2>
							<p class="subtitle">Reinventando-se</p>
							<p>As múltiplas facetas do varejo.</p>

							<div class="about__content-feature">
								<?php echo $Evento->conteudo; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-6 text-left mt-4">
								<a href="inscricao" class="default-btn move-right"><span>Inscrições</span> </a>
							</div>
							<div class="col-6 text-right">
								<p><strong>Realização</strong><br/>
								<a href="#"><img src="assets/images/sponsor/11.png" alt="sponsor image"></a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <!-- ================> About section end here <================== -->


    <!-- ================>Sponsor section start here <================== -->
    <section class="sponsor padding-top padding-bottom bg--white">
		<div class="container">
			<div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
				<p class="subtitle">Conheça os nossos parceiros!</p>
				<h2>Parceiros</h2>
			</div>
			<div class="sponsor__wrapper">
				<div class="swiper sponsor__slider mb-4">
					<div class="swiper-wrapper">
						<?php
						require_once("painel/modulos/Parceiro/model.php");

						$Parceiro = new Parceiro();
						$resultado = $Parceiro->liste("WHERE evento='".$Evento->{$Evento->primary}."' and inativo = 'N'");

						// Verifique se há resultados
						if (!empty($resultado['lista'])) {
							// Loop para exibir cada parceiro
							foreach ($resultado['lista'] as $parceiro) {
								echo '<div class="swiper-slide">';
								echo '<div class="sponsor__item">';
								echo '<a href="#"><img src="arquivos/parceiros/' . $parceiro->imagem . '" alt="' . $parceiro->titulo . '"></a>';
								echo '</div>';
								echo '</div>';
							}
						} else {
							echo "Nenhum parceiro encontrado.";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- ================>Sponsor section end here <================== -->

	<?php
	
	require_once("painel/modulos/Conteudo_evento/model.php");
	$Conteudo_evento = new Conteudo_evento();
	$Conteudo_evento->nLimite = '';
	$arrayconteudo_evento = $Conteudo_evento->liste("where evento='".$Evento->{$Evento->primary}."' and inativo = 'N'");
	
	if ($arrayconteudo_evento['lista']) {
		foreach ($arrayconteudo_evento['lista'] as $Conteudo_evento) {
		    
			require_once("painel/modulos/Conteudo_evento_itens/model.php");
			$Conteudo_evento_itens = new Conteudo_evento_itens();
			$Conteudo_evento_itens->nLimite = '';
			$arrayConteudo_evento_itens = $Conteudo_evento_itens->liste("where conteudo_evento_itens.conteudo_evento = '".$Conteudo_evento->{$Conteudo_evento->primary}."' and conteudo_evento_itens.inativo = 'N'");
			
    ?>
    <section id="faq" class="faq padding-top padding-bottom">
        <div class="container">
            <div class="section-header text-center<?php echo ($arrayConteudo_evento_itens['nr'] ? ' mb-4' : '');?>" data-aos="fade-up" data-aos-duration="900">
				<div class="row">
    				<?php $temimagem =false; if (is_file("arquivos/conteudo_evento/" . $Conteudo_evento_itens->imagem)) { $temimagem =true;?>
        				<div class="col-12 col-md-6">
        					<div class="chose__img__wrapper mb-30">
        						<img class="main__img__5d ps-xl-5 ms-xl-2" src="arquivos/conteudo_evento/<?php echo $Conteudo_evento_itens->imagem; ?>"
        							alt="<?php echo $Conteudo_evento_itens->imagem; ?>">
        					</div>
        				</div>
    				<?php } ?>
    				<div class="col-12 <?php echo (@$temimagem ? ' col-md-6 mt-2' : ' mt-0')?>">
                        <?php if(@$Conteudo_evento->titulo){ ?>
        				    <h2><?php echo $Conteudo_evento->titulo;?></h2>
        				<?php } ?>
                        <?php if(@$Conteudo_evento->legenda){ ?>
        				    <p class="subtitle"><?php echo $Conteudo_evento->legenda;?></p>
        				<?php } ?>
                        <?php if(strlen(trim(strip_tags($Conteudo_evento->conteudo)))>0){ ?>
				            <div class="about__content-feature">
        				        <p><?php echo $Conteudo_evento->conteudo;?></p>
				            </div>
        				<?php } ?>
				    </div>
				</div>
            </div>
            
			    <?php 
                	if ($arrayConteudo_evento_itens['nr']) {
                		$index = 0; foreach ($arrayConteudo_evento_itens['lista'] as $Conteudo_evento_itens) {
						$accordionId = "faq" . $index; 
						$accordionBodyId = "faqBody" . $index;
						?>
						<!-- conteudo_evento inicio -->
						<section class="faq padding-top">
							<div class="container">
								<div class="faq__wrapper">
									<div class="row g-4">
										<div class="col-lg-12">
											<div class="accordion" id="faqAccordion<?php echo $index; ?>">
												<div class="row g-4">
													<div class="col-12">
														<div class="accordion__item" data-aos="fade-up" data-aos-duration="1100">
															<div class="accordion__header" id="<?php echo $accordionId; ?>">
																<button class="accordion__button" type="button" data-bs-toggle="collapse"
																	data-bs-target="#<?php echo $accordionBodyId; ?>" aria-expanded="false"
																	aria-controls="<?php echo $accordionBodyId; ?>">
																	<?php echo $Conteudo_evento_itens->titulo; ?> <span class="plus-icon"></span>
																</button>
															</div>
															<div id="<?php echo $accordionBodyId; ?>" class="accordion-collapse collapse show"
																aria-labelledby="<?php echo $accordionId; ?>" data-bs-parent="#faqAccordion<?php echo $index; ?>">
																<div class="accordion__body">
																	<?php echo $Conteudo_evento_itens->conteudo; ?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php if (is_file("arquivos/conteudo_evento/" . $Conteudo_evento_itens->imagem)) { ?>
										<div class="col-xl-6 col-lg-6 d-none d-md-block">
											<div class="chose__img__wrapper mb-30">
												<img class="main__img__5d ps-xl-5 ms-xl-2" src="arquivos/conteudo_evento/<?php echo $Conteudo_evento_itens->imagem; ?>"
													alt="<?php echo $Conteudo_evento_itens->imagem; ?>">
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</section>
						<!-- conteudo_evento fim -->
				<?php 
						$index++; // Incrementa o índice para o próximo item
					}
				} 
				?>
		</div>
    </section>
    <?php }} ?>

    <!-- ================Venue section start here <================== -->
    <section class="venue padding-top padding-bottom" style="background-image: url(assets/images/event/centrodeconvencoes2.png);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 padding-top padding-bottom">
                    <div class="venue__content">
                        <h3>Local do Evento</h3>
                        <p>Centro de Convenções do Cabo Branco Poeta Ronaldo Cunha Lima</p>
                        <ul class="venue__list">
                            <li class="venue__list-item"><span><i class="fa-solid fa-location-dot"></i></span><a href="https://maps.app.goo.gl/YkETy9bEViP85ydp7" target="<?php echo (@$isMobile ? '_system' : '_blank');?>" class="map" end="Rodovia PB-008, Km 5, Polo Turístico, Cabo Branco, Joao Pessoa - PB" lat="-7.184688983661374"  long="-34.80384140938786">Rodovia PB-008, Km 5 s/n Polo Turístico - Cabo Branco, PB, 58000-000</a></li>
                            <li class="venue__list-item"><span><i class="fa-solid fa-phone"></i></span><a href="https://wa.me/5583999589832">(83) 99958-9832 (Damião Evangelista)</a></li>
                            <li class="venue__list-item"><span><i class="fa-solid fa-envelope"></i></span><a href="mailto:aspb@aspb.com.br">aspb@aspb.com.br</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ================Venue section end here <================== -->
