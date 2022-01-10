import 'ol/ol.css';
import Map from 'ol/Map';
import OSM from 'ol/source/OSM';
import {Tile, Vector as VectorLayer} from 'ol/layer';
import View from 'ol/View';
import Overlay from 'ol/Overlay';
import Feature from 'ol/Feature';
import Point from 'ol/geom/Point';
import {Icon, Style} from 'ol/style';
import VectorSource from 'ol/source/Vector';
import {fromLonLat} from 'ol/proj';


// create markers arr
let points = []
var boreholes = []
var owners = []

// fetch
fetch('/getboreholes').then(res => res.json()).then(data => {
  // fetch boreholes
  boreholes = data

  // console.log("All Boreholes: ", boreholes)
  // console.log("Boreholes: ", boreholes)

  // populate markers arr
  boreholes.forEach(borehole => {
    points.push(new Feature({
      geometry: new Point(fromLonLat([borehole.longitude, borehole.latitude])), // nbo
      setProperties: {
        'owner_name': borehole.owner_name,
        'file_no': borehole.file_no,
        'mapsheet': borehole.mapsheet,
        'file_no': borehole.file_no,
        'DOI': borehole.DOI,
        'category': borehole.category,
        'the_type': borehole.the_type,
        'SRO': borehole.SRO,
        'coordinates': { 'long': borehole.longitude, 'lat': borehole.latitude },
      }
    }))
  });

  boreholes.forEach(borehole => {
    owners.push(borehole.owner_name)
  })


  // apply style to points
  points.forEach(point => {
    point.setStyle(icon_styling)
  });


  // apply points to layer
  let layer = new VectorLayer({
    source: new VectorSource({
        features: points
    })
  });
  
  map.addLayer(layer)


})

// console.log("Points: ", points);

// map
let map = new Map({
  view: new View({
      center: fromLonLat([37.1274, -0.4832]),
      zoom: 10,
  }),
  layers: [
      new Tile({
          source: new OSM()
      })
  ],
  target: 'map',
})


// styling markers
let icon_styling = new Style({
  image: new Icon({
    anchor: [0.5, 46],
    anchorXUnits: 'fraction',
    anchorYUnits: 'pixels',
    src: 'placeholder.png',
  }),
});



//  popup
let container = document.getElementById('popup');
let content = document.getElementById('popup-content');
let closer = document.getElementById('popup-closer');

var overlay = new Overlay({
   element: container,
   autoPan: true,
   autoPanAnimation: {
       duration: 250
   }
});

map.addOverlay(overlay);

closer.onclick = function() {
   overlay.setPosition(undefined);
   closer.blur();
   return false;
};

let popup_div = `<div class="popup_div">
<b><a href="#">Link</b></h4>
<b>File No: </b>Tetu<br/>
<b>Form Type: </b>Tetu<br/>
<b>Mapsheet: </b>Tetu<br/>
</div>`

// map.on('singleclick', function (event) {
//    if (map.hasFeatureAtPixel(event.pixel) === true) {
//        var coordinate = event.coordinate;

//        content.innerHTML = popup_div;
//        overlay.setPosition(coordinate);
//    } else {
//        overlay.setPosition(undefined);
//       //  closer.blur();
//    }
// });

map.on("singleclick", function(e) {
  map.forEachFeatureAtPixel(e.pixel, function (feature, layer) {
      //do something
      console.log("The Feature: ", feature.values_.setProperties)
      var coordinate = e.coordinate;

      content.innerHTML = popup_div;
      overlay.setPosition(coordinate);
  })})



console.log("All owners: ", owners)




// SEARCH
// fecth
// the data
var users = [];
fetch('/get_owners_list').then(res => res.json()).then(data => {
  users = data
  render_lists(users); // function takes in list array
})

// where to render the data
var ul = document.getElementById("users-list");

// function takes in list array
function render_lists (lists){
  var li = '';
  // iterates thru array and display
  var index = 0;
  for(index in lists){
      li += "<li>" + lists[index] + "</li>"; // concatenate
  }
  ul.innerHTML = li;
}

// lets filters it
var input = document.getElementById('filter_users');

// filters users and returns arr of keywords matching
function filterUsers (){
  console.log("Filtering users")
  var keyword = input.value.toLowerCase();
  var filtered_users = users.filter((user) => {
          user = user.toLowerCase();
          return user.indexOf(keyword) > -1; 
  });

  render_lists(filtered_users);
}

// add an event listener to the input
input.addEventListener('keyup', filterUsers);