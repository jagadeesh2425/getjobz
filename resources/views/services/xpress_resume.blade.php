@extends('layouts.app')

@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 

<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Xpress Resume')])
<!-- Inner Page Title end -->

<div class="inner-page"> 
  <!-- About -->
  <div class="container">
        <div class="contact-wrap">
            <div class="title"> <span>{{__('Get XpressResume+ Get Noticed.')}}</span>
                <h2>{{__('Better your chances of getting found & shortlisted')}}</h2>
                
            </div>
           
        </div>

        <div class="row"> 
            <!-- Xpres  Resume -->

            <div class="contact-now">
                <div class="col-md-4 column">

                        <div class="paypackages"> 

                                <!---four-paln-->
                              
                                <div class="four-plan">
                              
                                  
                              
                                  <div class="row"> @foreach($serviceData as $services)
                                    @if($services->service_for == "xpress_resume")
                              
                                    
                              
                                      <ul class="boxes">
                              
                                        <li class="icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
                              
                                        <li class="plan-name">{{$services->service_title}}</li>
                              
                                        <li>
                              
                                          <div class="main-plan">
                              
                                            
                              
                                            <div class="plan-price1-2"><span>$</span>{{$services->service_price}}</div>
                            
                                            <div class="service_desc">{{$services->service_description}}</div>
                              
                                            <div class="clearfix"></div>
                              
                                          </div>
                              
                                        </li>
                              
                                        
                              
                                        @if((bool)$siteSetting->is_paypal_active)
                              
                                        <li class="order paypal"><a href="{{route('order.service', $services->id)}}"><i class="fa fa-cc-paypal" aria-hidden="true"></i> {{__('pay with paypal')}}</a></li>
                              
                                        @endif
                              
                                        @if((bool)$siteSetting->is_stripe_active)
                              
                                        <li class="order"><a href="{{route('stripe.order.form', [$services->id, 'new'])}}"><i class="fa fa-cc-stripe" aria-hidden="true"></i> {{__('pay with stripe')}}</a></li>
                              
                                        @endif
                              
                                      </ul>
                              
                                    
                                     @endif
                                    @endforeach </div>
                                    
                              
                                </div>
                              
                                <!---end four-paln--> 
                              
                              </div>



                        
                </div>
                <!-- Why Xpress Resume-->
                <div class="col-md-8 column">
                       <div class="why_resume">
                            <h2 class="why_resume_title">{{__('Why XpressResume')}}</h2>
                            <ul class="why_resume_content">
                                    <li>Better your chances of getting found when a recruiter searches for a profile like yours<br></li>
                                    <li>It’s upfront when a recruiter takes a look at a large set of shortlisted resumes</li>
                                    <li>Your profile is promoted as the most closely matched jobseeker to the search criteria used by recruiters</li>
                                    <li>With XpressResume+ your profile is showcased as an active jobseeker, who is keenly looking for a job</li>
                                    <li>With XpressResume+ you stand out from the crowd, thus increasing your chances of getting shortlisted</li>
                                </ul>
                       </div>

                       <div class="why_resume" style="margin: 10px 0 0 0;">
                            <h2 class="why_resume_title">{{__('How XPRESSResume+ works?')}}</h2>
                       <p class="service_desc">{{__('Once you subscribe to XPRESSResume+ you’ll get an order confirmation. Within 2 working days, you’ll get a mail from us asking for your latest resume. Once you upload your resume, you would be promoted as an active job seeker in the Monster database. Your resume will be listed at the top of search results, thus boosting your chanc es of getting shortlisted. We not only list your resume at the top but showcase your designation, education & experience, skills, industry, function and role you are in so that it grabs the attention of a recruiter.')}}</p>
                       </div>
                   
                </div>
                
               

            </div>
        </div>
    </div>
</div>

  
  

@include('includes.footer')
@endsection