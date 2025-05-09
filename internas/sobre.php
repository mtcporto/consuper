<!-- ================> Page header start here <================== -->
<section class="page-header bg--cover" style="background-image: url(assets/images/header/bg.png);">
        <div class="container">
            <div class="page-header__content text-center">
                <h2 class="text-uppercase">Sobre</h2>

            </div>
        </div>
    </section>
    <!-- ================> Page header end here <================== -->



    <!-- ================> About section start here <================== -->


			<!--page-title-area start-->
			<div class="page-title-area pt-60 pb-60" style="margin-top: 30px;">
			<!-- 				<img class="page-title-shape shape-one " src="assets/img/shape/line-14d.svg" alt="shape"> -->
				<!--<img class="page-title-shape shape-two" src="assets/img/shape/pattern-1a.svg " alt="shape">-->

<!-- 				<div class="container">
					<div class="row gx-4 gx-xxl-5 align-items-center">
						<div class="col-12 col-md-12">
							<div class="page-title-wrapper text-md-start text-center">
								<h2 class="page-title mb-10">Sobre</h2>
							</div>
						</div>
					</div> -->
				</div>
			</div>
			<!--page-title-area end-->

                        <?php
                        $n = 0;
                        require_once("painel/modulos/Sobre/model.php");
                        $Sobre = new Sobre();
                        $Sobre->nLimite = '';
                        $arraySobre = $Sobre->liste("where inativo = 'N'");
                        if ($arraySobre['lista']) {
                            foreach ($arraySobre['lista'] as $Sobre) {
                                if (is_file("arquivos/sobre/" . $Sobre->imagem)) {
                                    $n++;
                                    if(($n%2)==0){
                                    ?>

			<!-- chose__us__area start -->
			<section class="chose__us__area pt-90 pt-lg-90 pt-md-55 pb-200 pb-lg-95">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-6 d-md-none d-block">
							<div class="chose__img__wrapper mb-30">
								<img class="main__img__5d ps-xl-5 ms-xl-2" src="arquivos/sobre/<?php echo $Sobre->imagem; ?>"
									alt="<?php echo $Sobre->imagem; ?>">
<!-- 								<img class="main__img__6d d-none d-md-inline-block"
                                                                     src="assets/img/patri.jpg" width="320" alt="Patrimonial"> -->
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 pe-xl-0">
							<div class="chose__text__wrapper mb-30">
								<h4 class="sub__title__one text-theme mb-20"><?php echo $Sobre->legenda; ?></h4>
								<h2 class="section__title__one mb-25"><?php echo $Sobre->titulo; ?>
								</h2>
                                                                <?php echo $Sobre->conteudo; ?>
<!--								<ul class="text-list list-none">
									<li>Foco</li>
									<li>Inovação</li>
									<li>Rentabilidade</li>
								</ul>-->
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 d-none d-md-block">
							<div class="chose__img__wrapper mb-30">
								<img class="main__img__5d ps-xl-5 ms-xl-2" src="arquivos/sobre/<?php echo $Sobre->imagem; ?>"
									alt="<?php echo $Sobre->imagem; ?>">
<!-- 								<img class="main__img__6d d-none d-md-inline-block"
                                                                     src="assets/img/patri.jpg" width="320" alt="Patrimonial"> -->
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- chose__us__area end -->
                        <?php if($Sobre->video!=''){ ?>

			<!-- video__area start -->
			<div class="video__area">
				<div class="full__video__bg video__four" data-background="assets/img/banda.png">
					<div class="video__wrapper">                                            
						<a class="popup-video" href="https://www.youtube.com/watch?v=DmhP88EeMPQ"><i
								class="bi bi-play-fill"></i></a>
					</div>
				</div>
			</div>
			<!-- video__area end -->
                        
                        <?php } ?>
                        
                        <?php }else{ ?>
                            
			<!-- chose__us__area start -->
			<section class="chose__us__area pt-90 pt-lg-90 pt-md-55 pb-200 pb-lg-95">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-6">
							<div class="chose__img__wrapper mb-30">
								<img class="main__img__5d ps-xl-5 ms-xl-2" src="arquivos/sobre/<?php echo $Sobre->imagem; ?>"
									alt="<?php echo $Sobre->titulo; ?>">
<!-- 								<img class="main__img__6d d-none d-md-inline-block"
                                                                     src="assets/img/patri.jpg" width="320" alt="Patrimonial"> -->
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 pe-xl-0">
							<div class="chose__text__wrapper mb-30">
								<h4 class="sub__title__one text-theme mb-20"><?php echo $Sobre->legenda; ?></h4>
								<h2 class="section__title__one mb-25"><?php echo $Sobre->titulo; ?>
								</h2>
                                                                <?php echo $Sobre->conteudo; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- chose__us__area end -->
                        <?php if($Sobre->video!=''){ ?>

			<!-- video__area start -->
			<div class="video__area">
				<div class="full__video__bg video__four" data-background="assets/img/banda.png">
					<div class="video__wrapper">                                            
						<a class="popup-video" href="<?php echo $Sobre->video; ?>"><i class="bi bi-play-fill"></i></a>
					</div>
				</div>
			</div>
			<!-- video__area end -->
                        
                        <?php } ?>
                        
                        <?php }}}} ?>
    <!-- ================> About section end here <================== -->