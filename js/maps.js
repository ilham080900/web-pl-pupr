// Function untuk menampilkan Map
const map = new ol.Map({
    target: 'map',
    layers: [
        new ol.layer.Tile({
          source: new ol.source.XYZ({
            url: 'http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}'
          })
        })
      ],
    projection: "EPSG:900913",
    view: new ol.View({
      center: ol.proj.fromLonLat([106.816635, -6.595038]),
      zoom: 12,
      maxZoom: 20,
      minZoom: 4,
    }),
  });

// Ketika button extent di klik pindah ke posisi map awal
  $('.extent').on ('click', function (){
    map.getView().animate({
        center: ol.proj.fromLonLat([106.816635, -6.595038]),
        zoom: 12,
        duration: 300,
    })
  });

//   Fungsi untuk search menggunakan Photon
  var search = new ol.control.SearchPhoton({
    //target: $(".options").get(0),
    lang:"fr",		// Force preferred language
    reverse: true,
    position: true	// Search, with priority to geo position
  });
  map.addControl (search);

  // Select feature when click on the reference index
  search.on('select', function(e) {
    // console.log(e);
    map.getView().animate({
      center:e.coordinate,
      zoom: Math.max (map.getView().getZoom(),16)
    });
  });
  