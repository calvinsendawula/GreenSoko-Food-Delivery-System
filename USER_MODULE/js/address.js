// Call Geocode
//geocode();

// Get Location form
var locationForm = document.getElementById('location-form');

// Listen for Submit
locationForm.addEventListener('submit', geocode);

function geocode(e){
  // Prevent actual submit
  e.preventDefault();

  var location = document.getElementById('location-input').value;
  axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
    params:{
      address:location,
      key:'AIzaSyB3MYxjIHDmgJSHyjSjj4UXsgjmI08twMk'
    }
  })
  .then(function(response){
    // Log full response
    console.log(response);

    // Formatted address
    var formattedAddress = response.data.results[0].formatted_address;
    var formattedAddressOutput = `
      <ul class="list-group">
        <li class="list-group-item">${formattedAddress}</li>
      </ul>
    `;

    // Address components
    var addressComponents = response.data.results[0].address_components;
    var addressComponentsOutput = '<ul class="list-group">';
    for (var i = 0; i < addressComponents.length; i++) {
      addressComponentsOutput += `
        <li class="list-group-item"><strong>${addressComponents[i].types[0]}</strong>: ${addressComponents[i].long_name}</li>
      `;
    }
    addressComponentsOutput += '</ul>';

    // Geometry
    var lat = response.data.results[0].geometry.location.lat;
    var lng = response.data.results[0].geometry.location.lng;
    var geometryOutput = `
      <ul class="list-group">
        <li class="list-group-item"><strong>Latitude</strong>: ${lat}</li>
        <li class="list-group-item"><strong>Longitude</strong>: ${lng}</li>
      </ul>
    `;

    // Output to app
    changeLocation();
    document.getElementById('formatted-address').innerHTML = formattedAddressOutput;
    document.getElementById('address-components').innerHTML = addressComponentsOutput;
    document.getElementById('geometry').innerHTML = geometryOutput;


    // Output to map
    // Map Options
    var options = {
      zoom:13,
      center:{lat:lat,lng:lng}
    }

    // New Map
    var map = new google.maps.Map(document.getElementById('map'), options);

    // Add marker
    var marker = new google.maps.Marker({
      position:{lat:lat,lng:lng},
      map:map
      });
  })
  .catch(function(error){
    console.log(error);
  });
}

function initMap(){
  // Map Options
  var options = {
    zoom:13,
    center:{lat:-1.2921,lng:36.8219}
  }

  // New Map
  var map = new google.maps.Map(document.getElementById('map'), options);

  // Add marker function
  function addMarker(props){
    var marker = new google.maps.Marker({
      position:props.coords,
      map:map,
      //icon:props.iconImage
      });

      // Check for custom icon
      if(props.iconImage){
        marker.setIcon(props.iconImage);
      }

      // Check content
      if(props.content){
        var infoWindow = new google.maps.InfoWindow({
          content:props.content
        });

        marker.addListener('click', function(){
          infoWindow.open(map, marker);
        });
      }
  }
}

function changeLocation() {
  document.getElementsByName('addressSelected').value = formattedAddress;
}
