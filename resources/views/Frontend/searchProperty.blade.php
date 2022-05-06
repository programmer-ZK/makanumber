@extends('layouts.master')


@section('title', 'Search Property | Makanumber')

@section('content')


<div class="w-100">
  @include('layouts.property_search_form')
</div>

<?php
$type = "";
$purpose = "";
$propType = "";
$propPurpose = "";
$types = ["", "Apartment", "Villa", "Residential Plot", "Industrial Land", "Commercial Plot", "Townhouse", "Residential Building", "Office", "Warehouse", "Shop", "Showroom"];


if (isset($_GET['propertyType'])) {
  $propType = $_GET['propertyType'];
}

if (isset($_GET['purpose'])) {
  $propPurpose = $_GET['purpose'];
}

if ($propType != null) {
  $type = $types[$propType];
}

if ($propPurpose == "selling") {
  $purpose = "Buy";
}

if ($propPurpose == "renting") {
  $purpose = "Rent";
}
?>


<div class="mt-3 pb-5 properties ml-4 mr-4">

  <div class="row no-gutters" style="width: 93% !important; margin-left: 2%;">
    <div class="col-sm-12 border" style="padding: 10px">
      <span>
        <a href="/">Home</a>
        <a href="/"><i class="fa fa-angle-right"></i> <?= $purpose ?></a>
        <a href="#"> <i class="fa fa-angle-right"></i> <span style="color:#00B4A2;"><?= $type ?></span></a>
      </span>
    </div>
  </div>


  <div class="row mb-2 mt-3">
    <div class="col-sm-8">
      <h3 style="font-weight:bold;">{{$results->count()}} Properties Found</h3>
    </div>
    <div class="col-sm-4" style="float:right; text-align:right;">
      <i class="fa fa-list mr-3 p-1" aria-hidden="true" style="font-size:24px; cursor:pointer; padding: 8px !important;" id="list"></i>
      <i class="fa fa-th p-1 " aria-hidden="true" style="font-size:24px; cursor:pointer; background-color:#00B4A2;color:white !important; border-radius: 5px; padding: 8px !important;" id="grid"></i>
    </div>
  </div>

  <div class="row list">
    @foreach($results as $prop)
    @php
    $users = \App\Models\UserModel::where(['id' => $prop->author_id])->get();

    $propertyUrl = DB::table('re_properties')
    ->select('*')
    ->join('slugs','re_properties.id', '=', 'slugs.reference_id')
    ->where('slugs.reference_id','=',$prop->property_id)
    ->get();

    @endphp


    <div class="col-md-4 col-lg-4 mb-3">

      <div class="item">
        <?php $explode_id = json_decode($prop->images, true); ?>
        @isset($explode_id[0])

        <img src="{{asset('public/storage/'.$explode_id[0])}}" style="width:100%; height:250px !important;">
        @endisset
        <div class="descriptions">
          <div class="row pl-3 pt-2 no-gutters" style="height:40px;">
            <div class="col-sm-8">

              @foreach($propertyUrl as $k => $url)
              @if($loop->first)

              <p><a href='properties/{{$url->key}}' style="color:white !important; font-weight:bold;">{{Str::limit($prop->name, 20)}}</a></p>
              @endif
              @endforeach
            </div>
            <div class="col-sm-4">
              <?php
              $price = $prop->price;
              $price = number_format($price, 0, '.', ',');
              ?>

              <p class="descrip" style="font-weight:bold;">AED {{$price}} </p>

            </div>
          </div>

          <div class="row pl-3" style="height:30px !important;">
            <div class="col-sm">
              <span class="address">{{Str::limit($prop->location, 30)}}</span>
            </div>
          </div>

          <div class="row pl-2">
            <div class="col-sm px-4">
              <hr class="green" style="border:1px solid #00B4A2 !important;" />
            </div>
          </div>

          <div class="row pl-4 pb-2" style="color:grey">
            <div class="col-sm" style="float:left;  text-align:left !important;">
              @if ($prop->square)
              <span><i class="fa fa-area-chart" aria-hidden="true" style="color:gold;"></i> {{ $prop->square }} </span>
              @endif

              @if ($prop->number_bedroom)
              <span><i class="fa fa-bed" aria-hidden="true" style="color:#FB9F35;"></i> {{ $prop->number_bedroom }}</span>
              @endif
              @if ($prop->number_bathroom)
              <span><i class="fa fa-bath" aria-hidden="true" style="color:#FB9F35;"></i> {{ $prop->number_bathroom }}</span>
              @endif


              <?php
              $users = \App\Models\UserModel::where(['id' => $prop->author_id])->get();
              ?>

              @foreach($users as $user)

              <?php
              $documents = \App\Models\Document::where('user_id', $user['id'])->get();
              $doc_count = $documents->count();
              ?>

              @if($user['avatar_id'])
              <span class="pl-2 pr-2" style="float:right !important; text-align:right !important;">
                {{$user['first_name']}} {{$user['last_name']}}
                @if ($doc_count >= 1)
                <i class="fas fa-badge-check" aria-hidden="true" style="color:#00b4a2;"></i>
                @endif
              </span>
              <img src="{{asset('public/storage/users/'.$user['avatar_id'])}}" style="width:24px; height:24px; border-radius: 50%; float:right !important; text-align:right !important; " class="mb-1" />
              @else
              <span class="pl-2 pr-2" style="float:right !important; text-align:right !important;">{{$user['first_name']}} {{$user['last_name']}}</span> <span style="text-align:right !important; float:right !important;"><span class="icon"><i class="fa fa-user" aria-hidden="true" style="height:34px; border-radius:5px;"></i></span></span>
              @endif
              @endforeach


            </div>
          </div>
        </div>
      </div>


    </div>




    <!--List-->

    @endforeach
  </div>

  <div class="row grid" style="display:none;">

    <div class="col-md-9">
      <div class="row no-gutters mt-3 ">

        @foreach($results as $prop)

        @php
        $users = \App\Models\UserModel::where(['id' => $prop->author_id])->get();

        @endphp
        <?php

        $propertyUrl =  DB::table('re_properties')
          ->select('*')
          ->join('slugs', 're_properties.id', '=', 'slugs.reference_id')
          ->where('slugs.reference_id', '=', $prop->property_id)
          ->get();

        ?>


        <div class="col-sm-5 mb-3">
          <div class="card">
            <span class="blog-img-labels">{{$prop->type}}</span>
            @php($type = gettype($prop->images))

            @php($explode_id = json_decode($prop->images, true))

            @isset($explode_id[0])
            <img src="{{asset('public/storage/'.$explode_id[0])}}" alt="image" class="blog-img" style="width: 100%; height: 250px;  ">
            @endisset


          </div>
        </div>
        <div class="col-sm-7" style="margin-left:-2px !important;">
          <div class="card" style="height:252px;">
            <div class="card-body blog-bg">
              <?php
              $price = $prop->price;
              $price = number_format($price, 0, '.', ',');
              ?>

              @foreach($propertyUrl as $k => $url)
              @if($loop->first)
              <p class="card-title" style="font-size:16px; font-weight:bold;"><span style="color:white !important;"><a href="properties/{{$url->key}}" style="color:white !important;">{{Str::limit($prop->name, 25)}}</a></span> <span style="float:right; color:#0AAC7E; font-weight:light;">AED {{$price}}</span></p>
              @endif
              @endforeach
              <p style="color:#B7B7B7; font-size:14px;">{{$prop->location}}</p>
              <div class="row" style="color:grey">
              </div>
              <p class="card-text" style="font-size:14px; border-top: 2px solid #00B4A2;">
              <div class="col-sm" style="margin-left:-8px !important;">

                <span><i class="fa fa-area-chart" aria-hidden="true" style="color:gold;"></i> <span style="color:grey;">{{ $prop->square }} sq.ft</span> </span>


                @if ($prop->number_bedroom)
                <span><i class="fa fa-bed" aria-hidden="true" style="color:#FB9F35;"></i> <span style="color:grey;">{{ $prop->number_bedroom }} bd</span></span>
                @endif
                @if ($prop->number_bathroom)
                <span><i class="fa fa-bath" aria-hidden="true" style="color:#FB9F35;"></i> <span style="color:grey;">{{ $prop->number_bathroom }} bt</span></span>
                @endif
                <br />
              </div>
              <span style="color:#B7B7B7; overflow-y: hidden !important;">{{\Illuminate\Support\Str::limit($prop->description, 70)}} </span> </p>
              <p class="card-text" style="font-size:12px; color: #00B4A2;">


                @foreach($users as $user)
                @if($user['avatar_id'])
                <li class="nav-item ml-2 mr-0" style="list-style:none !important;">
                  <img src="{{asset('public/storage/users/'.$user['avatar_id'])}}" style="margin-left:-10px; width:35px; height:35px; border-radius:50%; border:1px solid;" /> &nbsp;&nbsp; {{$user['first_name']}} {{$user['last_name']}}
                </li>
                @else
                <li class="nav-item ml-2" style="list-style:none !important;">
                  <img src="/frontend-images/profile-pic.jpg" style="height:30px; width:30px; border-radius:50%;" /> &nbsp; &nbsp; {{$user['first_name']}} {{$user['last_name']}}
                </li>
                @endif
              </p>

              @endforeach
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>


  </div>

</div>

@stop