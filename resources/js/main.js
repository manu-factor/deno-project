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
        'id': borehole.id,
        'owner_name': borehole.owner_name,
        'file_no': borehole.file_no,
        'mapsheet': borehole.mapsheet,
        'DOI': borehole.DOI,
        'category': borehole.category,
        'the_type': borehole.the_type,
        'SRO': borehole.SRO,
        'coordinates': { 'long': borehole.longitude, 'lat': borehole.latitude, 'z': borehole.z_axis },
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

map.on('singleclick', function (event) {
   if (map.hasFeatureAtPixel(event.pixel) === true) {
       var coordinate = event.coordinate;

       
       overlay.setPosition(coordinate);
   } else {
       overlay.setPosition(undefined);
      //  closer.blur();
   }

   map.forEachFeatureAtPixel(event.pixel, (feature, layer) => {
     var data = feature.values_.setProperties
    //  populate_popup(data)
    // content.innerHTML = popup_div;
    content.innerHTML = populate_popup(data)
    // console.log("A feature has been clicked");
   })
});

function populate_popup (data) {
  return `<div class="popup_div">
  <a href="/hole/${data.id}" target="_blank">More</a><br>
  <b>Owner Name: </b><small>${data.owner_name}</small><br/>
  <b>Longitude: </b>${data.coordinates.long}<br/>
  <b>Latitude: </b>${data.coordinates.lat}<br/>
  <b>Z: </b>${data.coordinates.z}<br/>
  <b>File No: </b>${data.file_no}<br/>
  <b>Form Type: </b>${data.the_type}<br/>
  <b>Mapsheet: </b>${data.mapsheet}<br/>
  </div>`
}




// SEARCH
// fecth
// the data
var users = [];
fetch('/filter_records').then(res => res.json()).then(data => {

  // users = data // this was array of strings

  users = data


  render_lists(data); // function takes in list array
})

// where to render the data
var tbody = document.getElementById("users-list");

// function takes in list array
function render_lists (/*lists */arr){

  var tr = ``
  arr.forEach((itm)=>{

    tr += `<tr onclick="window.location='/hole/${itm.id}'" class="singleRow">
              <th>${itm.owner_name}</th>
              <td>${itm.file_no}</td>
              <td>${itm.mapsheet}</td>
              <td>${itm.category}</td>
              <td>${itm.the_type}</td>
              <td>${itm.SRO}</td>
              <td>${itm.DOI}</td>
              <td>${itm.z_axis}</td>
            </tr>`


    // console.log(itm.owner_name)
    // li += "<li>" + itm.owner_name + "</li>"; // concatenate
  })
  tbody.innerHTML = tr;

  // var li = '';
  // // iterates thru array and display
  // var index = 0;
  // for(index in lists){
  //     li += "<li>" + lists[index] + "</li>"; // concatenate
  // }
  // ul.innerHTML = li;

}

// lets filters it
var input = document.getElementById('filter_users');

// filters users and returns arr of keywords matching
function filterUsers (){


  console.log("Filtering users with: ", select.value )
  var keyword = input.value.toLowerCase();

  var filtered_users = users.filter ( (itm) => {
    // user = user.toLowerCase();
    itm = itm[select.value].toLowerCase();
    // console.log("See: ", itm)
    return itm.indexOf(keyword) > -1;
  } )

  // var filtered_users = users.filter((user) => {
  //         user = user.toLowerCase();
  //         return user.indexOf(keyword) > -1; 
  // });

  render_lists(filtered_users);
}

// add an event listener to the input
input.addEventListener('keyup', filterUsers);



// select
var select = document.getElementById("selectVal")

console.log("The select dom: ", select)

select.addEventListener('change', () => {
  console.log("Selected: ", select.value)
})