<?php

$cities = DB::table('cities')
  ->select('*')->get();
?>
<form action="/search-propeties" method="get">
  @csrf

  <div class="mt-3 ml-4 mr-4">

    <div class="row mt-2">
      <div class="col-sm" style="padding-left:0px !important">

        <div class="input-group input border-0">
          <select class="custom-select" id="purpose" name="purpose" style="color:grey;" required>
            <option value="" selected disabled>Purpose</option>
            <option value="renting">Rent</option>
            <option value="selling">Sale</option>
          </select>
        </div>

      </div>

      <div class="col-sm" style="padding-left:0px !important">

        <div class="input-group input border-0">
          <select class="custom-select " id="location" name="location" style="color:grey;" >
            <option value="" selected disabled>Location</option>
            @foreach($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach

          </select>
        </div>

      </div>

      <div class="col-sm" style="padding-left:0px !important">

        <div class=" input-group input border-0">

          <select class="custom-select" id="propertyType" name="propertyType" style="color:grey;" >
            <option value="" selected disabled>Property Type</option>
            <optgroup label="Residential" data-max-options="2">
              <option value="1">Apartment</option>
              <option value="2">Villa</option>
              <option value="6">Townhouse</option>
              <option value="3">Residential Plot</option>
              <option value="7">Residential Building</option>

            </optgroup>
            <optgroup label="Commercial" data-max-options="2">
              <option value="8">Office</option>
              <option value="9">Warehouse</option>
              <option value="10">Shop</option>
              <option value="4">Industrial Land</option>
              <option value="11">Showroom</option>
              <option value="5">Commercial Plot </option>
            </optgroup>
          </select>

        </div>

      </div>



      <div class="col-sm" style="padding-left:0px !important">

        <div class=" input-group input border-0">

          <select class="custom-select " id="beds" name="beds" style="color:grey;" >
            <option value="" selected disabled>Bed </option>
            <option value="0">Studio</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
             
          </select>
        </div>

      </div>

      <div class="col-sm" style="padding-left:0px !important">

        <div class=" input-group input border-0">
          <select class="custom-select " id="areaFrom" name="areaFrom" style="color:grey;" >
            <option value="" selected disabled>Min</option>
            <option value="100">100 Sq.ft</option>
            <option value="200">200 Sq.ft</option>
            <option value="300">300 Sq.ft</option>
            <option value="400">400 Sq.ft</option>
            <option value="500">500 Sq.ft</option>
            <option value="600">600 Sq.ft</option>
            <option value="700">700 Sq.ft</option>
            <option value="800">800 Sq.ft</option>
            <option value="900">900 Sq.ft</option>
            <option value="1000">1,000 Sq.ft</option>
            <option value="2000">2,000 Sq.ft</option>
            <option value="3000">3,000 Sq.ft</option>
            <option value="4000">4,000 Sq.ft</option>
            <option value="5000">5,000 Sq.ft</option>
            <option value="6000">6,000 Sq.ft</option>
            <option value="7000">7,000 Sq.ft</option>
            <option value="8000">8,000 Sq.ft</option>
            <option value="9000">9,000 Sq.ft</option>
            <option value="10000">10,000 Sq.ft</option>
          </select>
          <span style="padding: 7px; color: grey; background: #FFFFFF;">Area</span>
          <select class="custom-select " id="areaTo" name="areaTo" style="color:grey;" >
            <option value="" selected disabled>Max</option>
            <option value="100">100 Sq.ft</option>
            <option value="200">200 Sq.ft</option>
            <option value="300">300 Sq.ft</option>
            <option value="400">400 Sq.ft</option>
            <option value="500">500 Sq.ft</option>
            <option value="600">600 Sq.ft</option>
            <option value="700">700 Sq.ft</option>
            <option value="800">800 Sq.ft</option>
            <option value="900">900 Sq.ft</option>
            <option value="1000">1,000 Sq.ft</option>
            <option value="2000">2,000 Sq.ft</option>
            <option value="3000">3,000 Sq.ft</option>
            <option value="4000">4,000 Sq.ft</option>
            <option value="5000">5,000 Sq.ft</option>
            <option value="6000">6,000 Sq.ft</option>
            <option value="7000">7,000 Sq.ft</option>
            <option value="8000">8,000 Sq.ft</option>
            <option value="9000">9,000 Sq.ft</option>
            <option value="10000">10,000 Sq.ft</option>
          </select>
        </div>

      </div>

      <div class="col-sm fromPrice" style="padding-left:0px !important">
        <div class=" input-group input border-0">
          <select class="custom-select" id="priceFrom" name="priceFrom" style="color:grey; border-right: none !important;" >
            <option value="" selected disabled>Min</option>
            <option value="500">500</option>
            <option value="1000">1,000</option>
            <option value="2000">2,000</option>
            <option value="3000">3,000</option>
            <option value="4000">4,000</option>
            <option value="5000">5,000</option>
            <option value="6000">6,000</option>
            <option value="7000">7,000</option>
            <option value="8000">8,000</option>
            <option value="9000">9,000</option>
            <option value="10000">10,000</option>
            <option value="20000">20,000</option>
            <option value="30000">30,000</option>
            <option value="40000">40,000</option>
            <option value="50000">50,000</option>
            <option value="60000">60,000</option>
            <option value="70000">70,000</option>
            <option value="80000">80,000</option>
            <option value="90000">90,000</option>
            <option value="100000">100,000</option>
            <option value="200000">200,000</option>
            <option value="300000">300,000</option>
            <option value="400000">400,000</option>
            <option value="500000">500,000</option>
            <option value="600000">600,000</option>
            <option value="700000">700,000</option>
            <option value="800000">800,000</option>
            <option value="900000">900,000</option>
            <option value="1000000">1,000,000</option>
            <option value="2000000">2,000,000</option>
            <option value="3000000">3,000,000</option>
            <option value="4000000">4,000,000</option>
            <option value="5000000">5,000,000</option>
            <option value="6000000">6,000,000</option>
            <option value="7000000">7,000,000</option>
            <option value="8000000">8,000,000</option>
            <option value="9000000">9,000,000</option>
            <option value="10000000">10,000,000</option>
            <option value="20000000">20,000,000</option>
            <option value="30000000">30,000,000</option>
            <option value="40000000">40,000,000</option>
            <option value="50000000">50,000,000</option>
            <option value="60000000">60,000,000</option>
            <option value="70000000">70,000,000</option>
            <option value="80000000">80,000,000</option>
            <option value="90000000">90,000,000</option>
          </select>
          <span style="padding: 7px; color: grey; background: #FFFFFF;">Price</span>
          <select class="custom-select" id="priceTo" name="priceTo" style="color:grey; border-left: none !important" >
            <option value="" selected disabled>Max</option>
            <option value="500">500</option>
            <option value="1000">1,000</option>
            <option value="2000">2,000</option>
            <option value="3000">3,000</option>
            <option value="4000">4,000</option>
            <option value="5000">5,000</option>
            <option value="6000">6,000</option>
            <option value="7000">7,000</option>
            <option value="8000">8,000</option>
            <option value="9000">9,000</option>
            <option value="10000">10,000</option>
            <option value="20000">20,000</option>
            <option value="30000">30,000</option>
            <option value="40000">40,000</option>
            <option value="50000">50,000</option>
            <option value="60000">60,000</option>
            <option value="70000">70,000</option>
            <option value="80000">80,000</option>
            <option value="90000">90,000</option>
            <option value="100000">100,000</option>
            <option value="200000">200,000</option>
            <option value="300000">300,000</option>
            <option value="400000">400,000</option>
            <option value="500000">500,000</option>
            <option value="600000">600,000</option>
            <option value="700000">700,000</option>
            <option value="800000">800,000</option>
            <option value="900000">900,000</option>
            <option value="1000000">1,000,000</option>
            <option value="2000000">2,000,000</option>
            <option value="3000000">3,000,000</option>
            <option value="4000000">4,000,000</option>
            <option value="5000000">5,000,000</option>
            <option value="6000000">6,000,000</option>
            <option value="7000000">7,000,000</option>
            <option value="8000000">8,000,000</option>
            <option value="9000000">9,000,000</option>
            <option value="10000000">10,000,000</option>
            <option value="20000000">20,000,000</option>
            <option value="30000000">30,000,000</option>
            <option value="40000000">40,000,000</option>
            <option value="50000000">50,000,000</option>
            <option value="60000000">60,000,000</option>
            <option value="70000000">70,000,000</option>
            <option value="80000000">80,000,000</option>
            <option value="90000000">90,000,000</option>
          </select>
        </div>

      </div>

      <div class="col-sm ml-3 mt-1 searchBtn" style="padding-left:0px !important">
        <button class="btn btn-success button" type="submit" style="background-color:#00B4A2; width:100px;">Search</button>
      </div>
    </div>
  </div>
</form>