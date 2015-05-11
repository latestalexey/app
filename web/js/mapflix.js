var mapDataObject; // make global
var mapControl;

micello.maps.init("c50c95af-d63a-4526-ac82-1268409ef591", mapInit);
function  mapInit() {
    mapControl =  new micello.maps.MapControl('mapElement');
    mapDataObject = mapControl.getMapData();
    mapDataObject.mapChanged = onMapChanged; // establish callback function for map changes
    mapDataObject.loadCommunity(22167); // the location coordinates in this example are based on this community id
}

function onMapChanged (e) { // all map changes trigger this method, including the inital loading
    if (e.comLoad) { // true on map load
		getNavigation();
    }
}

function getNavigation () {
     var level = mapDataObject.getCurrentLevel();
     mapControl.requestNavFromGeom(level.g[32], level.id, true);
     mapControl.requestNavToGeom(level.g[300], level.id, true);
} 