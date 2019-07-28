@extends('layouts.gen')
@section('title', 'Asclepius')



@section('content')

<!--  
        If you want to change #bootstrap-touch-slider id then you have to change Carousel-indicators and Carousel-Control  #bootstrap-touch-slider slide as well
        Slide effect: slide, fade
        Text Align: slide_style_center, slide_style_left, slide_style_right
        Add Text Animation: https://daneden.github.io/animate.css/
        -->


        <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line hcarousel" data-ride="carousel" data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="3"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="4"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="5"></li>
              
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Third Slide -->
                <div class="item active">

                    <!-- Slide Background -->
                    <img src="img/a.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_center">
                                <h1 style="font-size: 10em;" data-animation="animated flash">Asclepius</h1>
                                <br/><br/>
                                <p style="font-size: 4em;" data-animation="animated bounceInUp">Better Health ....... Better Life</p>
                                <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">Departments</a>
                                <a href="http://bootstrapthemes.co/" target="_blank"  class="btn btn-primary" data-animation="animated fadeInRight">Services</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="img/a1.jpeg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated flipInX">Main Aim</h1>
                        <p data-animation="animated rotateIn">
                          You treat a disease, you win, you lose. You treat a person, I guarantee you, you’ll win, no matter what the outcome.
                        </p>
                        <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInUp">Doctors</a>
                        <a href="http://bootstrapthemes.co/" target="_blank"  class="btn btn-primary" data-animation="animated fadeInDown">Schedule</a>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Third Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="img/a2.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated zoomInLeft">Better Health Care</h1>
                        <p data-animation="animated fadeInRight">All Facilities For The Rest Of Patients.</p>
                    </div>
                </div>
                <!-- End of Slide -->


                <!-- Fourth Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="img/a3.jpeg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated rubberBand">24/7 Service</h1>
                        <p style="font-size: 3em;" data-animation="animated fadeInRight">Cure Is First .</p>
                    </div>
                </div>
                <!-- End of Slide -->



                 <!-- Fifth Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="img/a4.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated fadeInUp">Don't Hesitate To Join Us</h1>
                        <p data-animation="animated flipInY">Modern Devices ...... Perfect Stuff.</p>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Sixth Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="img/a5.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 style="font-size: 10em;" data-animation="animated pulse infinite">Asclepius</h1>
                        <br/><br/>
                        <p style="font-size: 4em;" data-animation="animated fadeInDown">Your Soul In Honest Hands.</p>
                    </div>
                </div>
                <!-- End of Slide -->

         

            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End  bootstrap-touch-slider Slider -->
        
        

<div class="container">
      <div class="row">
        <div class="col-xs-18 col-sm-6 col-md-3">
          <div class="thumbnail mainthumb text-center">
                <div class="box">             
                  <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-heart"></i></div>
                  </div>
                  <div class="space"></div>
                </div> 
              <h1>Thumbnail label</h1>  
              <div class="caption">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit</p>               
               
            </div>
          </div>
        </div>
        
        <div class="col-xs-18 col-sm-6 col-md-3">
          <div class="thumbnail mainthumb text-center">
                <div class="box">             
                  <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-tint"></i></div>
                  </div>
                  <div class="space"></div>
                </div> 
              <h1>Thumbnail label</h1>  
              <div class="caption">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit</p>                
              
            </div>
          </div>
        </div>
        
        <div class="col-xs-18 col-sm-6 col-md-3">
              <div class="thumbnail mainthumb text-center">
                <div class="box">             
                  <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-glass"></i></div>
                  </div>
                  <div class="space"></div>
                </div> 
              <h1>Thumbnail label</h1>        
              <div class="caption">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit</p>
               
            </div>
          </div>
        </div>
        
        <div class="col-xs-18 col-sm-6 col-md-3">
          <div class="thumbnail mainthumb text-center">
                <div class="box">             
                  <div class="icon">
                     <div class="image"><i class="glyphicon glyphicon-user"></i></div>
                  </div>
                  <div class="space"></div>
                </div> 
              <h1>Thumbnail label</h1>  
              <div class="caption">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit</p>
               
            </div>
          </div>
        </div>
        
      
        
      

        
  </div><!--/row-->
</div><!--/container -->















       


        <div class="intro row">
          <div class="col-md-4">
            
            
            <h1><img src="img/logoone.jpg" width="60" height="60">Welcome To Asclepius</h1>
            <hr class="style-six">
            <div class="line"></div>


            <p>The tertiary function of medieval hospitals was to support education and learning. Originally, hospitals educated chaplains and priestly brothers in literacy and history; however, by the 13th century, some hospitals became involved in the education of impoverished boys and young adults.</p>
            

            <img src="img/iso.png" class="col-xs-6 col-sm-4">
            <img src="img/isoone.png" class="col-xs-6 col-sm-4">
            <img src="img/isotwo.png" class="col-xs-6 col-sm-4">

          </div>
            
          <img src="img/titletwo.png" width="100%" class="col-md-4">
            

          <div class="col-md-4 jumbotron vertical-center f">

            <p><i class="fa fa-ambulance"></i>&nbsp;Fast Emergency Case Response</p>
            <p><i class="fa fa-user-md"></i>&nbsp;High Quality Staff For Emergency Care</p>
            <p><i class="fa fa-wheelchair"></i>&nbsp;High Prepared Rooms At High Standards</p>
            <p><i class="fa fa-heartbeat"></i>&nbsp;24/7 Caring Patients</p> 

          </div>
        </div>



        <div class="openform parallax">

              <div class="row">
                <div class="col-md-6">
                  <div class="thumbnail openformthumb">
                     
                      <div class="caption">
                     
                        <h4>Opening Hours</h4>
                        <hr class="style-three">

                        <p>Tuesday - Friday 9.00 - 20.00</p>
                        <hr class="style-three">

                        <p>Saturday 10.00 - 16.00</p>
                        <hr class="style-three">

                        <p>Sunday 9.30 - 18.00</p>
                        <hr class="style-three">

                        <p>Monday 9.00 - 18.00</p>
                        <hr class="style-three">

                        
                        <h4>Need Help?</h4>
                        <br/><br/>
                        <p><i class="glyphicon glyphicon-earphone"></i>+1-202-555-0116 - <i class="glyphicon glyphicon-earphone"></i>+1-202-555-0115</p>
                        <br/><br/>
                    </div>
                  </div>
                </div>
              


                <div class="col-md-5 fone text-center">
                 


                <h1>Honest</h1>

                <h1>Honour</h1>

                <h1>Interest</h1>

                <h2>For Better Life</h2>

                
                </div>



               </div>







        </div>






         <div class="features">
            
            <h1 class="text-center">The Features</h1>


            <div class="row">
              <div class="col-md-4 text-center">


                <h1><i class="fa fa-user-md"></i></h1>
                <h2>High Training Nursery</h2>
                <p>High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery</p>

              </div>


              <div class="col-md-4 text-center">



                <h1><i class="fa fa-medkit"></i></h1>
                <h2>High Training Nursery</h2>
                <p>High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery</p>


              </div>



              <div class="col-md-4 text-center">
                    
                <h1><i class="fa fa-hospital-o" aria-hidden="true"></i></h1>
                <h2>High Training Nursery</h2>
                <p>High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery</p>



              </div>
            </div>


            <div class="row">

                 <div class="col-md-4 text-center">
                    
                <h1><i class="fa fa-heartbeat" aria-hidden="true"></i></h1>
                <h2>High Training Nursery</h2>
                <p>High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery</p>



              </div>


               <div class="col-md-4 text-center">
                    
                <h1><i class="fa fa-ambulance" aria-hidden="true"></i></h1>
                <h2>High Training Nursery</h2>
                <p>High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery</p>



              </div>


               <div class="col-md-4 text-center">
                    
                <h1><i class="fa fa-stethoscope" aria-hidden="true"></i></h1>
                <h2>High Training Nursery</h2>
                <p>High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery
                High Training NurseryHigh Training NurseryHigh Training Nursery</p>



              </div>




            </div>

         </div>




        <div class="row">
          <div class="col-md-4">

          <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <h1 class="text-center" style="font-size: 3em;">Join Our Stuff For Better World</h1>

          
          </div>
          <img src="img/d.jpg" width="100%" class="col-md-8">

        </div>      
















<div class="no parallax text-center">

<div class="col-md-3">
    <i class="fa fa-ambulance"></i>
    <h4>One</h4>
    <div class="counter">12345</div>
</div>

<div class="col-md-3">
    <i class="fa fa-ambulance"></i>
    <h4>One</h4>
    <div class="counter">12345</div>
</div>

<div class="col-md-3">
    <i class="fa fa-ambulance"></i>
    <h4>One</h4>
    <div class="counter">12345</div>
</div>

<div class="col-md-3">
    <i class="fa fa-ambulance"></i>
    <h4>One</h4>
    <div class="counter">12345</div>
</div>

</div>


        
@endsection











