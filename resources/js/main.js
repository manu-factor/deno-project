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




// fetch
fetch('/getboreholes').then(res => res.json()).then(data => {
  // fetch boreholes
  let boreholes = data

  // create markers arr
  let points = []

  // populate markers arr
  boreholes.forEach(borehole => {
    points.push(new Feature({
      geometry: new Point(fromLonLat([borehole.long, borehole.lat])), // nbo
    }))
  });


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


// map
let map = new Map({
  view: new View({
      center: fromLonLat([36.8219, -1.2921]),
      zoom: 12,
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
<h4><a href="#">Dam Title</a></h4>
<b>Location: </b>Tetu<br/>
<b>Agency: </b>G.o.K<br/>
<b>Pumping: </b>Solar<br/>
</div>`

map.on('singleclick', function (event) {
   if (map.hasFeatureAtPixel(event.pixel) === true) {
       var coordinate = event.coordinate;

       content.innerHTML = popup_div;
       overlay.setPosition(coordinate);
   } else {
       overlay.setPosition(undefined);
      //  closer.blur();
   }
});