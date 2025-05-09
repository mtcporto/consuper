    <!-- ================> Banner section start here <================== -->
    <section id="home" class="banner banner--overlay" style="background-image: url(assets/images/header/bg.png); " >
    
     <div id="ytbg" class="videohome" data-ytbg-fade-in="true" data-youtube="https://youtu.be/t7wJPW6kxik">
        
     </div> 
    
        <div class="container">
            <div class="banner__wrapper">
                <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">                 
                    <div class="banner__bottom">
                        <ul class="countdown justify-content-center" data-date="October 16, 2024 18:00:00" id="countdown">
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-days">59</h3>
                                <p class="countdown__text">Dias</p>
                            </li>
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-hours">05</h3>
                                <p class="countdown__text">Horas</p>
                            </li>
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-minutes">59</h3>
                                <p class="countdown__text">Min</p>
                            </li>
                            <li class="countdown__item">
                                <h3 class="countdown__number color--theme-color countdown__number-seconds">36</h3>
                                <p class="countdown__text">Seg</p>
                            </li>
                        </ul>
                    </div><h4 class="mt-4 mb-0 databannar">14 a 16 de outubro de 2024 em João Pessoa</h4>
                    <a href="inscricao" class="default-btn move-right"><span>Inscrições<i
                                class="fa-solid fa-arrow-right"></i></span> </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> Banner section end here <================== -->




    <!-- ================> Register section start here <================== -->
<!--     <div class="register register--uplifted" data-aos="fade-up" data-aos-duration="900">
        <div class="container">
            <div class="register__wrapper">
                <form action="#" class="register__form">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <input type="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <a href="signup.html" class="default-btn  default-btn--secondary move-right"><span>Register
                                    <i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- ================> Register section end here <================== -->




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
    <h2>Consuper 2024</h2>
    <p class="subtitle">Reinventando-se</p>
    <p>As múltiplas facetas do varejo.</p>

    <div class="about__content-feature">
        <h5></h5>
        <?php
require_once("painel/modulos/Evento/model.php");
$Evento = new Evento();
print_r($Evento); // Verifique se a instância é criada corretamente.

?>

    </div>

    <div class="row">
        <!-- Aqui você pode adicionar mais conteúdo, colunas, etc. -->
    </div>
</div>


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
            </div>
        </div>
    </section>
    <!-- ================> About section end here <================== -->


<?php /*

    <!-- ================> feature section start here <================== -->
 <!--    <section class="feature padding-top padding-bottom bg--white" id="feature">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Features</p>
                <h2>What We Offer?</h2>
            </div>

            <div class="feature__wrapper">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-microphone"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4>Weclome Speech </h4>
                                    <div class="feature__item-text">
                                        <p>Lorem ipsum dolor siteryl amet, conseco tetur adip isic sing elit, sed domerx
                                            eius mod tempor </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-boxes-stacked"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4> Successfull Story</h4>
                                    <div class="feature__item-text">
                                        <p>Lorem ipsum dolor siteryl amet, conseco tetur adip isic sing elit, sed domerx
                                            eius mod tempor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="200">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-puzzle-piece"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4>Quize Play</h4>
                                    <div class="feature__item-text">
                                        <p>Lorem ipsum dolor siteryl amet, conseco tetur adip isic sing elit, sed domerx
                                            eius mod tempor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="300">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-award"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4>Envato Award</h4>
                                    <div class="feature__item-text">
                                        <p>Lorem ipsum dolor siteryl amet, conseco tetur adip isic sing elit, sed domerx
                                            eius mod tempor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ================> feature section end here <================== -->




    <!-- ================> Event access section start here <================== -->
<!--     <section class="event-access padding-top padding-bottom">
        <div class="mockup" data-aos="fade-up-left" data-aos-duration="900">
            <img class="mok-img" src="./assets/images/event/mobile.png" alt="">
        </div>
        <div class="container">
            <div class="contact__wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="event-access-content" data-aos="fade-right" data-aos-duration="900">
                            <h2>You can access us from mobile !</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi
                                dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci
                                tation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            </p>
                            <a href="#" class="default-btn move-right"><span>Get Ticket <i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ================> Event access section end here <================== -->



    <!-- ================> Event schedule section start here <================== -->
   <!--  <section class="schedule padding-top padding-bottom">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Monday 10AM - 06PM</p>
                <h2>Events Schdule</h2>
            </div>
            <div class="schedule__wrapper">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="schedule__item" data-aos="fade-up-left" data-aos-duration="1000">
                            <div class="schedule__item-inner">
                                <div class="schedule__item-time">
                                    <h6>10am - 12pm</h6>
                                </div>
                                <div class="schedule__item-content">
                                    <h4>Consectetur Adipisicing elit Eiusmod</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perferendis
                                        officiis quae eius delectus, aliquid deserunt, repudiandae consectetur corporis,
                                        molestiae ipsam. Aut dolore iure excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-6">
                        <div class="schedule__item schedule__item--right" data-aos="fade-up-right"
                            data-aos-duration="1000">
                            <div class="schedule__item-inner">
                                <div class="schedule__item-time">
                                    <h6>12pm - 2pm</h6>
                                </div>
                                <div class="schedule__item-content">
                                    <h4>Consectetur Adipisicing elit Eiusmod</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perferendis
                                        officiis quae eius delectus, aliquid deserunt, repudiandae consectetur corporis,
                                        molestiae ipsam. Aut dolore iure excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="schedule__item" data-aos="fade-up-left" data-aos-duration="1000">
                            <div class="schedule__item-inner">
                                <div class="schedule__item-time">
                                    <h6>2pm - 4pm</h6>
                                </div>
                                <div class="schedule__item-content">
                                    <h4>Consectetur Adipisicing elit Eiusmod</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perferendis
                                        officiis quae eius delectus, aliquid deserunt, repudiandae consectetur corporis,
                                        molestiae ipsam. Aut dolore iure excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-6">
                        <div class="schedule__item schedule__item--right" data-aos="fade-up-right"
                            data-aos-duration="1000">
                            <div class="schedule__item-inner">
                                <div class="schedule__item-time">
                                    <h6>4pm - 6pm</h6>
                                </div>
                                <div class="schedule__item-content">
                                    <h4>Consectetur Adipisicing elit Eiusmod</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perferendis
                                        officiis quae eius delectus, aliquid deserunt, repudiandae consectetur corporis,
                                        molestiae ipsam. Aut dolore iure excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="#" class="default-btn default-btn--secondary move-right"><span>Book a Seat <i
                                class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ================> Event schedule section end here <================== -->





    <!-- ================> CTA section start here <================== -->
<!--     <section class="cta">
        <div class="container">
            <div class="cta__wrapper" data-aos="flip-up" data-aos-duration="1000"
                style="background-image:url(assets/images/cta/bg.png)">
                <div class="row">
                    <div class="col-12">
                        <div class="cta__content">
                            <h2>Download Events Schedule as PDF</h2>
                            <a href="#" class="default-btn default-btn--secondary move-bottom"><span>Download Now <i
                                        class="fa-solid fa-arrow-down"></i></span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ================> CTA section end here <================== -->





    <!-- ================> Pricing section start here <================== -->
 <!--    <section class="pricing padding-top padding-bottom">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Choose the Best one</p>
                <h2>Pricing Plan</h2>
            </div>
            <div class="pricing__wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900">
                            <div class="pricing__inner">
                                <div class="pricing__head">
                                    <h4>$10</h4>
                                </div>
                                <div class="pricing__body">
                                    <h4>Basic</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"> <span>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </span> Unlimited Coffee </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span>
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </span> One Tshirt </p>
                                        </li>

                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-xmark"></i></span>Quize Contest </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-xmark"></i></span> Envato Sticker </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pricing__footer">
                                    <a href="login.html" class="default-btn move-top"><span>Select Plan</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
                            <div class="pricing__inner">
                                <div class="pricing__head">
                                    <h4>$20</h4>
                                </div>
                                <div class="pricing__body">
                                    <h4>Bronze</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-circle-check"></i></span> One Tshirt </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-check"></i></span>Unlimited Coffee
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-xmark"></i></span>Quize Contest </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-xmark"></i></span> Envato Sticker </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pricing__footer">
                                    <a href="login.html" class="default-btn move-top"><span>Select Plan</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="200">
                            <div class="pricing__inner">
                                <div class="pricing__head">
                                    <h4>$30</h4>
                                </div>
                                <div class="pricing__body">
                                    <h4>Gold</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-circle-check"></i></span> One Tshirt </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-check"></i></span>Unlimited Coffee
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-check"></i></span>Quize Contest </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-xmark"></i></span> Envato Sticker </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pricing__footer">
                                    <a href="login.html" class="default-btn move-top"><span>Select Plan</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="300">
                            <div class="pricing__inner">
                                <div class="pricing__head">
                                    <h4>$40</h4>
                                </div>
                                <div class="pricing__body">
                                    <h4>Platinum</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-circle-check"></i></span> One Tshirt </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-circle-check"></i></span> Unlimited Coffee
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-circle-check"></i></span> Quize Contest </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"> <span><i
                                                        class="fa-solid fa-circle-check"></i></span> Envato Sticker </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pricing__footer">
                                    <a href="login.html" class="default-btn move-top"><span>Select Plan</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ================> Pricing section end here <================== -->




    <!-- ================>Team section start here <================== -->
<!--     <section class="team padding-top padding-bottom" id="team" style="background-image:url(assets/images/team/bg.png)">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Meet Envato Greaters!</p>
                <h2>Events Speakers</h2>
            </div>
            <div class="team__wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="team__item" data-aos="fade-left" data-aos-duration="900">
                            <div class="team__item-inner">
                                <div class="team__item-thumb">
                                    <img src="assets/images/team/01.jpg" alt="Team Image">
                                </div>
                                <div class="team__item-content">
                                    <div class="team__item-author">
                                        <h4><a href="speaker-single.html">Jacob brod</a> </h4>
                                        <p>Speaker</p>
                                    </div>
                                    <p>Bontrar info popular belief is not simp
                                        has roots info piece arei classica from
                                        looked upone info the more obsc latin
                                        cites of the word in</p>
                                    <ul class="social">
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i
                                                    class="fa-brands fa-linkedin-in"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team__item" data-aos="fade-right" data-aos-duration="900">
                            <div class="team__item-inner">
                                <div class="team__item-thumb">
                                    <img src="assets/images/team/02.jpg" alt="Team Image">
                                </div>
                                <div class="team__item-content">
                                    <div class="team__item-author">
                                        <h4><a href="speaker-single.html">Andrez Tret</a> </h4>
                                        <p>Speaker</p>
                                    </div>
                                    <p>Bontrar info popular belief is not simp
                                        has roots info piece arei classica from
                                        looked upone info the more obsc latin
                                        cites of the word in</p>
                                    <ul class="social">
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i
                                                    class="fa-brands fa-linkedin-in"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team__item" data-aos="fade-left" data-aos-duration="900">
                            <div class="team__item-inner">
                                <div class="team__item-thumb">
                                    <img src="assets/images/team/03.jpg" alt="Team Image">
                                </div>
                                <div class="team__item-content">
                                    <div class="team__item-author">
                                        <h4><a href="speaker-single.html">Yean Young</a> </h4>
                                        <p>Speaker</p>
                                    </div>
                                    <p>Dontrar info popular belief is not simp
                                        has roots info piece arei classica from
                                        looked upone info the more obsc latin
                                        cites of the word in</p>
                                    <ul class="social">
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i
                                                    class="fa-brands fa-linkedin-in"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team__item" data-aos="fade-right" data-aos-duration="900">
                            <div class="team__item-inner">
                                <div class="team__item-thumb">
                                    <img src="assets/images/team/04.jpg" alt="Team Image">
                                </div>
                                <div class="team__item-content">
                                    <div class="team__item-author">
                                        <h4><a href="speaker-single.html">Vladimi zsek</a> </h4>
                                        <p>Speaker</p>
                                    </div>
                                    <p>Sontrar info popular belief is not simp
                                        has roots info piece arei classica from
                                        looked upone info the more obsc latin
                                        cites of the word in</p>
                                    <ul class="social">
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#" class="social__link"><i
                                                    class="fa-brands fa-linkedin-in"></i></a>
                                        </li>
                                        <li>

                                            <a href="#" class="social__link"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ================>Team section end here <================== -->


*/?>


    <!-- ================>Sponsor section start here <================== -->
    <section class="sponsor padding-top padding-bottom bg--white">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Conheça os nosssos parceiros!</p>
                <h2>Parceiros</h2>
            </div>
            <div class="sponsor__wrapper">
                <div class="swiper sponsor__slider mb-4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/10.png" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/12.png" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/13.webp" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/14.png" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/15.jpg" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/16.png" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/17.png" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="assets/images/sponsor/18.png" alt="sponsor image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================>Sponsor section end here <================== -->





    <!-- ================FAQ section start here <================== -->
    <section id="faq" class="faq padding-top padding-bottom">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <h2>Normas do evento</h2>
            </div>
<!--page-title-area start-->
<div class="page-title-area pt-60 pb-60" style="margin-top: 30px;"></div>
<!--page-title-area end-->

<?php
require_once("painel/modulos/Conteudo_evento/model.php");
$conteudo_evento = new conteudo_evento();
$conteudo_evento->nLimite = '';
$arrayconteudo_evento = $conteudo_evento->liste("where inativo = 'N'");
if ($arrayconteudo_evento['lista']) {
    $index = 0; // Adiciona um índice para gerar ids únicos
    foreach ($arrayconteudo_evento['lista'] as $conteudo_evento) {
        $accordionId = "faq" . $index; // Cria um id único para cada accordion
        $accordionBodyId = "faqBody" . $index; // Cria um id único para o corpo do accordion
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
                                                    <?php echo $conteudo_evento->legenda; ?> <span class="plus-icon"></span>
                                                </button>
                                            </div>
                                            <div id="<?php echo $accordionBodyId; ?>" class="accordion-collapse collapse show"
                                                aria-labelledby="<?php echo $accordionId; ?>" data-bs-parent="#faqAccordion<?php echo $index; ?>">
                                                <div class="accordion__body">
                                                    <?php echo $conteudo_evento->conteudo; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (is_file("arquivos/conteudo_evento/" . $conteudo_evento->imagem)) { ?>
                        <div class="col-xl-6 col-lg-6 d-none d-md-block">
                            <div class="chose__img__wrapper mb-30">
                                <img class="main__img__5d ps-xl-5 ms-xl-2" src="arquivos/conteudo_evento/<?php echo $conteudo_evento->imagem; ?>"
                                    alt="<?php echo $conteudo_evento->imagem; ?>">
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
        </div>
        </div>
    </section>
    <!-- ================FAQ section end here <================== -->





    <!-- ================Blog section start here <================== -->
<!--     <section class="blog padding-top padding-bottom bg--white">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Eventos anteriores</p>
                <h2>Últimos eventos</h2>
            </div>
            <div class="blog__wrapper">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog__item" data-aos="fade-up" data-aos-duration="900">
                            <div class="blog__inner">
                                <div class="blog__thumb">
                                    <img src="assets/images/blog/01.jpg" alt="Blog Images">
                                </div>
                                <div class="blog__content">
                                    <div class="blog__content-top">
                                        <span class="blog__meta-tag">Evento</span>
                                        <h4><a href="blog-single.html">Consuper 2023</a></h4>
                                        <ul class="blog__meta d-flex flex-wrap align-items-center">
                                            <li class="blog__meta-author">
                                                <a href="#"><span><i class="fa-solid fa-user"></i></span> Jhon
                                                    Doe</a>
                                            </li>
                                            <li class="blog__meta-date">
                                                <a href="#"><span><i class="fa-solid fa-calendar-days"></i></span>
                                                    30 de Outubro 2023</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>Contrar to popuar belieif loreme Ipsum is an not
                                        consectetur cites of the word in...</p>
                                    <div class="blog__content-bottom">
                                        <a href="blog-single.html" class="text-btn">Leia Mais</a>
                                        <a href="#" class="blog__meta-comment">
                                            <i class="fa-solid fa-message"></i>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle rounded-circle">
                                                2
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
                            <div class="blog__inner">
                                <div class="blog__thumb">
                                    <img src="assets/images/blog/02.jpg" alt="Blog Images">
                                </div>
                                <div class="blog__content">
                                    <div class="blog__content-top">
                                        <span class="blog__meta-tag">Evento</span>
                                        <h4><a href="blog-single.html">Consuper 2022</a></h4>
                                        <ul class="blog__meta d-flex flex-wrap align-items-center">
                                            <li class="blog__meta-author">
                                                <a href="#"><span><i class="fa-solid fa-user"></i></span> rasselmrh
                                                </a>
                                            </li>
                                            <li class="blog__meta-date">
                                                <a href="#"><span><i class="fa-solid fa-calendar-days"></i></span>
                                                30 de Outubro 2022</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>Contrar to popuar belieif loreme Ipsum is an not
                                        consectetur cites of the word in...</p>
                                    <div class="blog__content-bottom">
                                        <a href="blog-single.html" class="text-btn">Leia Mais</a>
                                        <a href="#" class="blog__meta-comment">
                                            <i class="fa-solid fa-message"></i>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle rounded-circle">
                                                2
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="200">
                            <div class="blog__inner">
                                <div class="blog__thumb">
                                    <img src="assets/images/blog/03.jpg" alt="Blog Images">
                                </div>
                                <div class="blog__content">
                                    <div class="blog__content-top">
                                        <span class="blog__meta-tag">Evento</span>
                                        <h4><a href="blog-single.html">Consuper 2021</a></h4>
                                        <ul class="blog__meta d-flex flex-wrap align-items-center">
                                            <li class="blog__meta-author">
                                                <a href="#"><span><i class="fa-solid fa-user"></i></span> Samon Bell</a>
                                            </li>
                                            <li class="blog__meta-date">
                                                <a href="#"><span><i class="fa-solid fa-calendar-days"></i></span>
                                                30 de Outubro 2021</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>Contrar to popuar belieif loreme Ipsum is an not
                                        consectetur cites of the word in...</p>
                                    <div class="blog__content-bottom">
                                        <a href="blog-single.html" class="text-btn">Leia Mais</a>
                                        <a href="#" class="blog__meta-comment">
                                            <i class="fa-solid fa-message"></i>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle rounded-circle">
                                                2
                                            </span>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-5 text-center">
                    <a href="blog.html" class="default-btn move-right"><span>Veja Mais</span></a>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ================Blog section end here <================== -->




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
                            <li class="venue__list-item"><span><i class="fa-solid fa-phone"></i></span><a href="https://wa.me/5583988026254">(83) 98802-6254 (Damião Evangelista)</a></li>
                            <li class="venue__list-item"><span><i class="fa-solid fa-envelope"></i></span><a href="mailto:aspb@aspb.com.br">aspb@aspb.com.br</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ================Venue section end here <================== -->
