 <!DOCTYPE html>
  <html>
    <head>
    <title>Travel Portal</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/main.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/animate.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/media.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/countrySelect.min.css"  media="screen,projection"/>
      <!--font awesome-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="slick/slick.css">
      <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <!--Preload-->
    <div class="preloader">
        <div class="preloader_image"></div>
    </div>
    
        <header>
            <nav id="navigation" class="menu-bar">
                <div class="nav-wrapper container">
                    <a href="index.html" class="brand-logo">
                        <img src="img/logo.png" alt="Travel Portal" title="Travel Portal"/>
                    </a>
                   <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a class="showSingle" target="1"><i class="material-icons">flight</i> Flight Booking</a></li>
                    <li><a class="showSingle" target="2"><i class="material-icons">hotel</i> Hotel Booking</a></li>
                    <li class="dwnld_btn"><a class="waves-effect waves-light btn btn-download">DOWNLOAD APP</a>
                    
                    <div class="download-dropdown-container">
                        <div class="arrow-up"></div>
                            <div class="dropdown-box">
                                
                                <div class="content-container">
                                    <p class="text-large">Get Travel Portal in your pocket.</p>
                                    <p class="text-small">Download our top-rated app, It's free, easy and smart.</p>
                                </div><!--content-container ends here-->
                                
                                <div class="phone-app-screen"></div>
                                
                            </div><!--dropdown-box ends here-->
                    </div>
                    
                    </li>
                  </ul>
                  
                  <ul class="side-nav" id="mobile-demo">
                    <li class=""><a href="#"><i class="material-icons">flight</i> Flight Booking</a></li>
                    <li><a href="#"><i class="material-icons">hotel</i> Hotel Booking</a></li>
                    <li><a class="waves-effect waves-light btn btn-download">DOWNLOAD APP</a>
                    
                    <div class="download-dropdown-container">
                        <div class="arrow-up"></div>
                            <div class="dropdown-box">
                                
                                <div class="content-container">
                                    <p class="text-large">Get Housing in your pocket.</p>
                                    <p class="text-small">Download our top-rated app, It's free, easy and smart.</p>
                                </div><!--content-container ends here-->
                                
                                <div class="phone-app-screen"></div>
                                
                            </div><!--dropdown-box ends here-->
                    </div>
                    </li>
                  </ul>
                  
                </div>
            </nav><!--nav ends here-->
            
            <div class="welcome_classic">
                <div class="welcome_classic_inner">
                    <div class="container">
                        
                        <div class="flight_booking_container targetDiv" id="div1">
                            <div class="row">
                                
                                <div class="heading_container">
                                    <div class="heading_lg">
                                        <h3>Domestic Fares starting Rs.949 <br>
                                        <span>On IndiGo , Jet Airways & Air India</span></h3>
                                        </div>
                                </div>
                                
                                <div class="col s12">
                                    <div class="search_area">
                                        
                                        
                                        
                                        <div class="booking_engine">
                                         <form action="#">
                                            <div class="select_type">
                                                <p>
                                                  <input type="radio" id="test1" name="colorRadio" value="oneway" checked />
                                                  <label for="test1">One Way</label>
                                                </p>
                                                <p>
                                                  <input  type="radio" id="test2" name="colorRadio" value="roundtrip" />
                                                  <label for="test2">Round Trip</label>
                                                </p>
                                                <p>
                                                  <input type="radio" id="test3" name="colorRadio" value="multicity" />
                                                  <label for="test3">Multicity</label>
                                                </p>
                                            </div>
                                            
                                            <div class="tour_form">
                                                <div class="oneway box box_show">
                                                    <div class="row">
                                                    
                                                        <div class="input-field col m2 s12">
                                                            
                                                            <select>
                                                              <option value="" disabled selected>From</option>
                                                              <option value="1">New Delhi</option>
                                                              <option value="2">Mumbai</option>
                                                              <option value="3">Bangalore</option>
                                                              <option value="3">Goa</option>
                                                              <option value="3">Kolkata</option>
                                                              <option value="3">Hyderabad</option>
                                                              <option value="3">Pune</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <select>
                                                              <option value="" disabled selected>To</option>
                                                              <option value="1">New Delhi</option>
                                                              <option value="2">Mumbai</option>
                                                              <option value="3">Bangalore</option>
                                                              <option value="3">Goa</option>
                                                              <option value="3">Kolkata</option>
                                                              <option value="3">Hyderabad</option>
                                                              <option value="3">Pune</option>
                                                            </select>   
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <i class="material-icons prefix orange600">date_range</i>
                                                            <input placeholder="Depature Date" id="departure_date" type="text" class="validate datepicker"> 
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <i class="material-icons prefix orange600">date_range</i>
                                                            <input disabled placeholder="Return Date" id="disabled" type="text" class="disabled">   
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <i class="material-icons prefix orange600">card_travel</i>
                                                            <input placeholder="Travellers" id="hide" type="text" class="validate"> 
                                                            
                                                            <!--dropdown traveller-->
                                                                <div id="rightMenu" class="download-dropdown-container">
                                                                    <div class="arrow-up"></div>
                                                                        <div class="dropdown-box">
                                                                            
                                                                            <div class="content-container">
                                                                                
                                                                                <form action="#">
                                                                                
                                                                                <div class="traveller-class">
                                                                                    <div class="row">
                                                                                        <div class="col s12"><input name="group1" type="radio" id="economy" />
                                                                                        <label for="economy">Economy</label></div>
                                                                                        <div class="col s12"><input name="group1" type="radio" id="peco" />
                                                                                        <label for="peco">Premium Economy</label></div>
                                                                                        <div class="col s12"><input name="group1" type="radio" id="business" />
                                                                                        <label for="business">Business</label></div>
                                                                                        <div class="col s12"><input name="group1" type="radio" id="fclass" />
                                                                                        <label for="fclass">First Class</label></div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                </div>
                                                                                
                                                                                <div class="traveller-btn center-align">
                                                                                    <a class="waves-effect waves-light btn">DONE</a>
                                                                                </div>
                                                                                
                                                                              </form>
                                                                            </div><!--content-container ends here-->
                                                                            
                                                                            
                                                                            
                                                                        </div><!--dropdown-box ends here-->
                                                                </div>
                                                            <!--dropdown traveller-- ends here-->
                                                        </div>
                                                        
                                                        
                                                    
                                                    </div>
                                                    <div class="search_button lPadding rPadding">   
                                                        <a class="waves-effect waves-light btn">SEARCH</a>      
                                                    </div>
                                                </div>
                                                
                                                <div class="roundtrip box">
                                                    <div class="row">
                                                    
                                                        <div class="input-field col m2 s12">
                                                            
                                                            <select>
                                                              <option value="" disabled selected>From</option>
                                                              <option value="1">New Delhi</option>
                                                              <option value="2">Mumbai</option>
                                                              <option value="3">Bangalore</option>
                                                              <option value="3">Goa</option>
                                                              <option value="3">Kolkata</option>
                                                              <option value="3">Hyderabad</option>
                                                              <option value="3">Pune</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <select>
                                                              <option value="" disabled selected>To</option>
                                                              <option value="1">New Delhi</option>
                                                              <option value="2">Mumbai</option>
                                                              <option value="3">Bangalore</option>
                                                              <option value="3">Goa</option>
                                                              <option value="3">Kolkata</option>
                                                              <option value="3">Hyderabad</option>
                                                              <option value="3">Pune</option>
                                                            </select>   
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <i class="material-icons prefix">date_range</i>
                                                            <input placeholder="Depature Date" id="departure_date" type="text" class="validate datepicker"> 
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <i class="material-icons prefix">date_range</i>
                                                            <input placeholder="Return Date" id="disabled" type="text" class="validate datepicker"> 
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <i class="material-icons prefix">card_travel</i>
                                                            <input placeholder="Travellers" id="hide" type="text" class="validate">

                                                        <!--dropdown traveller-->
                                                                <div id="rightMenu" class="download-dropdown-container">
                                                                    <div class="arrow-up"></div>
                                                                        <div class="dropdown-box">
                                                                            
                                                                            <div class="content-container">
                                                                                
                                                                                <form action="#">
                                                                                
                                                                                <div class="traveller-class">
                                                                                    <div class="row">
                                                                                        <div class="col s12"><input name="group1" type="radio" id="economy" />
                                                                                        <label for="economy">Economy</label></div>
                                                                                        <div class="col s12"><input name="group1" type="radio" id="peco" />
                                                                                        <label for="peco">Premium Economy</label></div>
                                                                                        <div class="col s12"><input name="group1" type="radio" id="business" />
                                                                                        <label for="business">Business</label></div>
                                                                                        <div class="col s12"><input name="group1" type="radio" id="fclass" />
                                                                                        <label for="fclass">First Class</label></div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                </div>
                                                                                
                                                                                <div class="traveller-btn center-align">
                                                                                    <a class="waves-effect waves-light btn">DONE</a>
                                                                                </div>
                                                                                
                                                                              </form>
                                                                            </div><!--content-container ends here-->
                                                                            
                                                                            
                                                                            
                                                                        </div><!--dropdown-box ends here-->
                                                                </div>
                                                            <!--dropdown traveller-- ends here-->
                                                            
                                                        </div>
                                                        
                                                    
                                                    </div>
                                                    
                                                    <div class="search_button lPadding rPadding">
                                                            
                                                                <a class="waves-effect waves-light btn">SEARCH</a>
                                                            
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                <div class="multicity box">
                                                    <div class="row">
                                                    
                                                        <div class="input-field col m2 s12">
                                                            
                                                            <select>
                                                              <option value="" disabled selected>From</option>
                                                              <option value="1">New Delhi</option>
                                                              <option value="2">Mumbai</option>
                                                              <option value="3">Bangalore</option>
                                                              <option value="4">Goa</option>
                                                              <option value="5">Kolkata</option>
                                                              <option value="6">Hyderabad</option>
                                                              <option value="7">Pune</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <select>
                                                              <option value="" disabled selected>To</option>
                                                              <option value="1">New Delhi</option>
                                                              <option value="2">Mumbai</option>
                                                              <option value="3">Bangalore</option>
                                                              <option value="4">Goa</option>
                                                              <option value="5">Kolkata</option>
                                                              <option value="6">Hyderabad</option>
                                                              <option value="7">Pune</option>
                                                            </select>   
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <i class="material-icons prefix">date_range</i>
                                                            <input placeholder="Depature Date" id="departure_date" type="text" class="validate datepicker"> 
                                                        </div>
                                                        
                                                        <div class="input-field col m2 s12">
                                                            <i class="material-icons prefix">card_travel</i>
                                                            <input placeholder="Passangers" id="first_name" type="text" class="validate">   
                                                        </div>
                                                        <div class="input-field col m2 s12">
                                                            <i class="material-icons prefix">accessible</i>
                                                            <select>
                                                              <option value="" disabled selected >Class</option>
                                                              <option value="1" >Economy</option>
                                                              <option value="2" >Premium</option>
                                                              <option value="3">Business</option>
                                                             
                                                            </select>       
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="search_button lPadding rPadding">
                                                            
                                                                <a class="waves-effect waves-light btn">SEARCH</a>
                                                            
                                                    </div>
                                                    
                                                    <div class="add-city-btn center-align ">
                                                        <a class="mt7" onclick="addMoreMRows(this.form);">ADD CITY <small>Upto 3 city</small></a>
                                                    </div>
                                                    
                                                    <!----add multicity row ---->
                                                        <div class="">
                                                            <div id="addedfRows"></div>
                                                        </div>
                                                    <!----add multicity row ---->
                                                    
                                                </div>
                                            
                                            
                                            </div><!--tour_form ends here-->
                                            
                                            
                                        </div>
                                         </form>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div><!--flight booking container ends here-->
                        
                        
                        <div class="hotel_booking_container targetDiv" id="div2" style="display:none;">
                            <div class="row">
                            
                                
                                <div class="heading_container">
                                    <div class="heading_lg">
                                        <h3>Domestic Fares starting Rs.949 <br>
                                        <span>On IndiGo , Jet Airways & Air India</span></h3>
                                        </div>
                                </div>
                                
                                <div class="col s12">
                                
                                    <div class="search_area">
                                        <div class="booking_engine">
                                         <form action="#">
                                            
                                            <div class="tour_form hotel_form">
                                                <div class="">
                                                    <div class="row">
                                                    
                                                        <div class="input-field col m3 s12">
                                                            
                                                            <i class="material-icons prefix">date_range</i>
                                                            <input placeholder="City, Hotel,Area" id="departure_date" type="text" class="validate"> 
                                                        </div>
                                                        
                                                        <div class="input-field col m3 s12">
                                                            <i class="material-icons prefix">date_range</i>
                                                            <input placeholder="Check in" id="in_date" type="text" class="validate datepicker"> 
                                                        </div>
                                                        <div class="input-field col m3 s12">
                                                            <i class="material-icons prefix">date_range</i>
                                                            <input placeholder="Check Out" id="check_out" type="text" class="validate datepicker">  
                                                        </div>
                                                        <div class="input-field col m3 s12">
                                                            <select>
                                                              <option value="" disabled selected >Rooms</option>
                                                              <option value="1" >1</option>
                                                              <option value="2" >2</option>
                                                              <option value="3">3</option>
                                                             
                                                            </select>   
                                                        </div>
                                                        
                                                    
                                                    </div>
                                                    
                                                    <div class="search_button lPadding rPadding">
                                                            
                                                                <a class="waves-effect waves-light btn">SEARCH</a>
                                                            
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                                
                                                
                                            
                                            </div><!--tour_form ends here-->
                                            
                                            
                                            
                                            <!-- <div class="search_button center-align">
                                                <div class="row">
                                                    <a class="waves-effect waves-light btn"><i class="material-icons left">search</i>Search</a>
                                                </div>
                                            </div>
                                             -->
                                            

                                         </form>
                                    </div>
                                </div>
                                
                                
                            </div>
                            </div>
                        </div><!--flight booking container ends here-->
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </header><!--header ends here-->
        
        <section id="about_travel">
            <div class="container">
                <div class="row">
                    <div class="travel_card">
                        <div class="adv-card">
                            <img src="img/icon-1.png" alt="" title=""/>
                            <h4>Book a Hotel With <br><span>Zero Advance</span></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...</p>
                            <a href="#">Pay At Checkout</a>
                        </div><!--adv-card ends here-->
                        <div class="adv-card">
                            <img src="img/icon-2.png" alt="" title=""/>
                            <h4>50% Instant Discount on Domestic Hotel</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...</p>
                            <a href="#">Pay At Checkout</a>
                        </div><!--adv-card ends here-->
                        <div class="adv-card">
                            <img src="img/icon-3.png" alt="" title=""/>
                            <h4>Upto 25,000 Cashback on Internation Flights</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...</p>
                            <a href="#">Pay At Checkout</a>
                        </div><!--adv-card ends here-->
                    </div>
                </div>
            </div>
        
        </section><!--section about_travel ends ----->
        
        
        <section id="great_deal" class="bg-color bg-parallax">
            <div class="bg_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <div class="deal_heading center-align">
                                <h3>Great <span>deals</span> on  trips</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="select_deal search_area">
                            <form action="#">
                                <div class="input-field col m6 s12">
                                    <div class="location_field">
                                        <i class="material-icons">location_on</i>
                                        <input placeholder="I Want to Travel to" id="first_name" type="text" class="validate">
                                    </div>
                                    
                                    <div class="month_filter">
                                        <ul class="clearfix">
                                            <li class=""><a href="#!">Jan</a></li>
                                            <li class=""><a href="#!">Feb</a></li>
                                            <li class="active"><a href="#!">March</a></li>
                                            <li class=""><a href="#!">Apr</a></li>
                                            <li class=""><a href="#!">May</a></li>
                                            <li class=""><a href="#!">June</a></li>
                                            <li class=""><a href="#!">July</a></li>
                                        </ul>
                                    </div>
                                    
                                    
                                    
                                </div>
                                <div class="input-field col m6 s12">
                                    <div class="location_field">
                                        <i class="material-icons">location_on</i>
                                        <input id="last_name" placeholder="I'm Starting From" type="text" class="validate">
                                    </div>
                                    
                                    <div class="lob_filter">
                                        <ul class="clearfix">
                                            <li class="active"><i class="material-icons">flight</i> Flight</li>
                                            <li class=""><i class="material-icons">hotel</i> Hotel</li>
                                        </ul>
                                    </div>
                                    
                                    
                                </div>
                            </form>
                        </div>
                    
                    </div>
                    
                    
                </div>
            </div>
            
            <div class="deal_result_container regular slider responsive">
                <div class="container">
                <div class="row">
                    
                        <section class="center slider">
                            <div class="col m6 s12">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                  <div class="row valign-wrapper">
                                    
                                    <div class="col s2">
                                      <img src="img/deal-logo.png" alt="" class="circle responsive-img"> 
                                    </div>
                                    
                                    <div class="col s7">
                                      <span class="black-text">
                                        This is a square image. Add the "circle" class to it to make it appear circular.
                                      </span>
                                    </div>
                                    
                                    <div class="col s3">
                                        <div class="book_btn center-align">
                                            <h5><a href="#">Book Now</a></h5>
                                            <span><i class="material-icons">arrow_forward</i>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col m6 s12">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                  <div class="row valign-wrapper">
                                    
                                    <div class="col s2">
                                      <img src="img/deal-logo.png" alt="" class="circle responsive-img"> 
                                    </div>
                                    
                                    <div class="col s7">
                                      <span class="black-text">
                                        This is a square image. Add the "circle" class to it to make it appear circular.
                                      </span>
                                    </div>
                                    
                                    <div class="col s3">
                                        <div class="book_btn center-align">
                                            <h5><a href="#">Book Now</a></h5>
                                            <span><i class="material-icons">arrow_forward</i>
                                        </div>
                                    </div>
                                    
                                  </div>
                                </div>
                            </div>
                            
                            <div class="col m6 s12">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                  <div class="row valign-wrapper">
                                    
                                    <div class="col s2">
                                      <img src="img/deal-logo.png" alt="" class="circle responsive-img"> 
                                    </div>
                                    
                                    <div class="col s7">
                                      <span class="black-text">
                                        This is a square image. Add the "circle" class to it to make it appear circular.
                                      </span>
                                    </div>
                                    
                                    <div class="col s3">
                                        <div class="book_btn center-align">
                                            <h5><a href="#">Book Now</a></h5>
                                            <span><i class="material-icons">arrow_forward</i>
                                        </div>
                                    </div>
                                    
                                  </div>
                                </div>
                            </div>
                        </section>
                    
                </div>
                </div>
            </div>
        
        </section><!--great_deal section ends here-->
        
        <section id="holiday_destination" class="bg_color package-tabs-section">
                
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <div class="destiation_heading center-align">
                                <h3>Perfect <span>holidays</span> destinations</h3>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        
                        <div class="col m4 s12">
                            <div class="package-box width-351-481">
                                <div class="destination-box">
                                    <a href="#">
                                        <img src="img/img1.jpg" alt="" title=""/>
                                    </a>
                                    <div class="description">
                                        <h2 class="description-name">Christmas and New Year</h2>
                                        <p class="starting-budget">Starting at Rs. 6,500</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col m3 mb-30 s12">
                            <div class="package-box width-286-226">
                                <div class="destination-box">
                                    <a href="#">
                                        <img src="img/img2.jpg" alt="" title=""/>
                                    </a>
                                    <div class="description">
                                        <h2 class="description-name">BEACH</h2>
                                        <p class="starting-budget">Starting at Rs. 3,500</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col m5 mb-30 s12">
                            <div class="package-box width-439-226">
                                <div class="destination-box">
                                    <a href="#">
                                        <img src="img/img3.jpg" alt="" title=""/>
                                    </a>
                                    <div class="description">
                                        <h2 class="description-name">Sri Lanka</h2>
                                        <p class="starting-budget">Starting at Rs. 3,500</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col m5 s12">
                            <div class="package-box width-439-226">
                                <div class="destination-box">
                                    <a href="#">
                                        <img src="img/img4.jpg" alt="" title=""/>
                                    </a>
                                    <div class="description">
                                        <h2 class="description-name">Himachal</h2>
                                        <p class="starting-budget">Starting at Rs. 3,500</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col m3 mb-30 s12">
                            <div class="package-box width-286-226">
                                <div class="destination-box">
                                    <a href="#">
                                        <img src="img/img5.jpg" alt="" title=""/>
                                    </a>
                                    <div class="description">
                                        <h2 class="description-name">Sikkim</h2>
                                        <p class="starting-budget">Starting at Rs. 3,500</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                    </div>
                    
                    
                    
                </div>
        
        </section><!--holiday_destination section ends here-->
        
        
        <section id="follow_us" class="bg-color">
                
                <div class="container">
                    <div class="row">
                        
                        <div class="col m4 s12">
                            <div class="follow_icon center-align">
                                <ul>
                                    <li class="icon_box"><a href="#"><i class="fa fa-facebook social_box" alt="facebook" title="facebook"></i></a></li>
                                    <li class="icon_box"><a href="#"><i class="fa fa-twitter social_box" alt="twitter" title="twitter"></i></a></li>
                                    <li class="icon_box"><a href="#"><i class="fa fa-instagram social_box" alt="instagram" title="instagram"></i></a></li>
                                    <li class="icon_box"><a href="#"><i class="fa fa-google-plus social_box" alt="google plus" title="google plus"></i></a></li>
                                    <li class="icon_box"><a href="#"><i class="fa fa-youtube social_box" alt="youtube" title="youtube"></i></a></li>
                                    <li class="icon_box"><a href="#"><i class="fa fa-pinterest social_box" alt="pinterest" title="pinterest"></i></a></li>
                                    <li class="icon_box"><a href="#"><i class="fa fa-linkedin social_box" alt="linkedin" title="linkedin"></i></a></li>
                                    
                                </ul>
                                
     
                            </div>
                        </div>
                        
                        <div class="col m4 s12">
                            <div class="app_icon center-align center-align">
                                <div class="col s12 m6"><a href="#"><img src="img/google-play.png" alt="" title=""/></a></div>
                                <div class="col s12 m6"><a href="#"><img src="img/app-store.png" alt="" title=""/></a></div>
                            </div>
                        </div>
                        
                        <div class="col m4 s12">
                            <div class="select_country">
                                <div class="input-field col s12">
                                        
                                    <div class="form-item">
                                        <input id="country_selector" type="text">
                                        <label for="country_selector" style="display:none;">Select a country here...</label>
                                    </div>
                                    
                                </div>
    
                            </div>
                        </div>
                        
                    </div>
                </div>
            
        
        </section><!--follow_us ends here-->
        
        
        <footer id="footer" class="bg-color">
                
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="footer_heading">
                                <h3>Product Offering</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                
                                <h3>Travel</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                
                                <h3>About the Site</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            
                        </div>  
                        
                        <div class="col s12 m6">
                            <div class="footer_heading">
                                <h3>Partner Programs</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                
                                <h3>More Links</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                
                                <h3>Important Links</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="copyright-text center-align">
                            <p>Copyright 2016. All Right Reserved</p>
                        </div>
                    
                    </div>
                    
                    
                </div>
        
        </footer>
        
        
        
        
        
    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
      <script type="text/javascript" src="js/countrySelect.min.js"></script>
      <script src="http://blazeworx.com/jquery.flagstrap.min.js"></script>
      <script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
      <script>
        $(window).on('load', function() 
        {
        preloader();
        })
      </script>
      <script>
        jQuery(function(){
            
            jQuery('.showSingle').click(function(){
              jQuery('.targetDiv').hide();
              jQuery('#div'+$(this).attr('target')).show();
            });
        });
        
            $("#country_selector").countrySelect({
                //defaultCountry: "jp",
                //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                preferredCountries: ['ca', 'gb', 'us']
            });
        </script>
        <script type="text/javascript">
            $(document).on('ready', function() {
              $(".center").slick({
                dots: false,
                infinite: true,
                autoplay: false,
                slidesToShow: 2,
                slidesToScroll: 1
              });
             
            });
        </script>
        
        <script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="oneway"){
            $(".box").not(".oneway").hide();
            $(".oneway").show();
        }
        if($(this).attr("value")=="roundtrip"){
            $(".box").not(".roundtrip").hide();
            $(".roundtrip").show();
        }
        if($(this).attr("value")=="multicity"){
            $(".box").not(".multicity").hide();
            $(".multicity").show();
        }
    });
});
</script>

<script type="text/javascript">
    var rowCount = 1;
    function addMoreMRows(frm) {
    rowCount ++;
    var mngRow = '<div class="add-more row" id="rowCount'+rowCount+'"><div class="col s3"><input id="" type="text" class="validate" placeholder="From"></div><div class="col s3"><input id="" type="email" class="validate" placeholder="To"> </div><div class="col s3"> <input type="text" class="datepicker" placeholder="Depart Date"></div><button type="button" title="Delete row" onclick="removeRow('+rowCount+');" class="btn btn-danger"><i class="material-icons">clear</i></button></div>';
    jQuery('#addedfRows').append(mngRow);
    }

    
    function removeRow(removeNum) {
    jQuery('#rowCount'+removeNum).remove();
    }
</script>
        
    </body>
  </html>