@extends('admin.layouts.gen')
@section('title', 'Profile')

@section('links')

      <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/rating.css') }}">

      <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/profile.css') }}">

@endsection



@section('content')






<!-- Page content -->
<div id="page-content-wrapper">
<div class="page-content">
<div class="container-fluid">

<div class="row">

<div class="col-md-12">


<ul id="accordion" class="accordion">
    <li>

      <div class="col col_4 iamgurdeep-pic">
                          

        <img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="{{ URL::asset('images/users/'.$doctorpatient->id.'.jpg') }}">
        <div class="edit-pic">

          <a href="https://web.facebook.com/ahmed.hamzawy.714" target="_blank" class="fa fa-facebook"></a>
          <a href="#" target="_blank" class="fa fa-instagram"></a>
          <a href="https://twitter.com/ahmedhamzawy15" target="_blank" class="fa fa-twitter"></a>
          <a href="#" target="_blank" class="fa fa-google"></a>

        </div>
        <div class="username">

          <h2>{!! $doctorpatient->first_name !!}&nbsp;{!! $doctorpatient->last_name !!} <small><i class="fa fa-map-marker"></i>{!! $country[0]->name !!} ({!! $doctorpatient->town !!})
          </small></h2>
          <p><i class="fa fa-briefcase"></i>{!! $doctorpatient->department !!}&nbsp;Doctor
          &nbsp;{!! $doctorpatient->reviews->avg('rating') !!}&nbsp;Ratings
          &nbsp;&nbsp;@for ($i=1; $i <= 5 ; $i++)<span class="glyphicon glyphicon-star{{ ($i <= round($doctorpatient->reviews->avg('rating'),1)) ? '' : '-empty'}}">
          </span>
          @endfor&nbsp;&nbsp;{!! $doctorpatient->reviews->count() !!}&nbsp;Rated</p>

          <a href="{{ URL::asset('admin/addmessage') }}" target="_blank" class="btn-o"> <i class="fa fa-envelope"></i> Send Message </a>
          <a href="mailto:{{ $doctorpatient->email }}" target="_blank"  class="btn-o"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
          Send Mail </a>
    
    
          <ul class="nav navbar-nav optionsnav optionsnavbar-nav">
              <li class="dropdown optionsdropdown">
                <a href="#" class="dropdown-toggle optionsdropdown-toggle" data-toggle="dropdown"><span class="fa fa-ellipsis-v pull-right"></span></a>
                <ul class="dropdown-menu optionsdropdown-menu pull-right">
                  <li><a href="{{ URL::asset('admin/addmessage') }}">Send Message <i class="fa fa-envelope"></i></a></li>
                  <li><a href="mailto:{{ $doctorpatient->email }}">Send Mail <i class="fa fa-envelope"></i></a></li>
                  <li><a data-toggle="modal" data-target="#review">Write A Review <i class="fa fa-star" aria-hidden="true"></i></a></li>
                </ul>
              </li>
          </ul>



        </div>

      </div>

    </li>


    <li>

      <div class="link"><i class="fa fa-globe"></i>About<i class="fa fa-chevron-down"></i></div>
      <ul class="submenu">
        <li><a href="#"> Date of Birth : {!! $doctorpatient->birthdate !!}</a></li>
        <li><a href="#">Address : {!! $doctorpatient->address !!}</a></li>
        <li><a href="mailto:gurdeepjawaddi94@gmail.com">Email : {!! $doctorpatient->email !!}</a></li>
        <li><a href="#">Phone : {!! $doctorpatient->telephone !!}</a></li>
      </ul>

    </li>

    <li class="default open">
      <div class="link"><i class="fa fa-fire"></i>Professional Skills<i class="fa fa-chevron-down"></i></div>
      <ul class="submenu">
        <li><a href="#"><span class="tags">skill</span> <span class="tags">skill</span> <span class="tags">skill</span> <span class="tags">skill</span> 
                <span class="tags">this skill</span> <span class="tags">skill</span> <span class="tags">i love this skill</span> <span class="tags">skill</span> 
                <span class="tags">the skill</span> <span class="tags">good skill</span> <span class="tags">awesome skill</span> <span class="tags">skill</span>
                <span class="tags">skill</span> <span class="tags">skill</span> <span class="tags">skill</span> <span class="tags">skill</span> 
                <span class="tags">this skill</span> <span class="tags">skill</span> <span class="tags">i love this skill</span> <span class="tags">skill</span> 
                <span class="tags">the skill</span> <span class="tags">good skill</span> <span class="tags">awesome skill</span> <span class="tags">skill</span>
                <span class="tags">skill</span> <span class="tags">skill</span> <span class="tags">skill</span> <span class="tags">skill</span> 
                <span class="tags">this skill</span> <span class="tags">skill</span> <span class="tags">i love this skill</span> <span class="tags">skill</span> 
                <span class="tags">the skill</span> <span class="tags">good skill</span> <span class="tags">awesome skill</span> <span class="tags">skill</span></li></a>
      </ul>
    </li>

    <li>


      <div class="link"><i class="fa fa-star" aria-hidden="true"></i>Reviews<i class="fa fa-chevron-down"></i></div>
      <ul class="submenu">
        @foreach($reviews as $review)
        
        <div class="row">
        <div class="col-md-12">
        @for ($i=1; $i <= 5 ; $i++)
        <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
        @endfor

        {{ $review->patient ? $review->patient->first_name.' '.$review->patient->last_name : 'Anonymous'}} <span class="pull-right">{{ $review->created_at->diffForHumans() }}
        </span> 

        <p>{{{$review->comment}}}</p>
        </div>
        </div>
        
        @endforeach

      </ul>

    </li>

    <li>
      <div class="link"><i class="fa fa-photo"></i>photos<i class="fa fa-chevron-down"></i></div>
      <ul class="submenu">
        <li class="photosgurdeep"><a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="{{ URL::asset('images/users/'.$doctorpatient->id.'.jpg') }}">       
      </ul>
    </li>



  

</div>

</div>
</div>
</div>
</div>
</div>



















   <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-sm">
    <div class="modal-content col-md-12">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" style="text-align: center;"></h4>
        </div>
        <div class="modal-body">
          
                   <div class="well well-sm">
            <div class="text-right">
                <a class="btn btn-success btn-green" href="javascript:void(0)" id="open-review-box">Leave a Review</a>
            </div>
        
            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" method="post"  action="{!! action('UsersController@storeReview', $doctorpatient->id) !!}">
                        <input id="ratings-hidden" name="rating" type="hidden"> 
                        <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
        
                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success btn-lg" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 

        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>















    @endsection



@section('scripts')

<script>

  $(function() {
    var Accordion = function(el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;

    // Variables privadas
    var links = this.el.find('.link');
    // Evento
    links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
  }

  Accordion.prototype.dropdown = function(e) {
    var $el = e.data.el;
      $this = $(this),
      $next = $this.next();

    $next.slideToggle();
    $this.parent().toggleClass('open');

    if (!e.data.multiple) {
      $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
    };
  } 

  var accordion = new Accordion($('#accordion'), false);
});


</script>


    <script type="text/javascript" src="{{ URL::asset('js/rating.js') }}" ></script>



@endsection