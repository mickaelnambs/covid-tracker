import maplibregl from 'maplibre-gl';

export default class CovidMap {
    constructor(containerId, mapDataElementId) {
        this.containerId = containerId;
        this.mapDataElementId = mapDataElementId;
        this.map = null;
        this.popup = null;
        this.mapData = null;
    }

    init() {
        this.loadMapData();
        this.createMap();
        this.setupPopup();
        this.map.on('load', () => this.onMapLoad());
    }

    loadMapData() {
        const mapDataElement = document.getElementById(this.mapDataElementId);
        this.mapData = JSON.parse(mapDataElement.textContent);
    }

    createMap() {
        this.map = new maplibregl.Map({
            container: this.containerId,
            style: 'https://demotiles.maplibre.org/style.json',
            center: [0, 20],
            zoom: 2
        });
    }

    setupPopup() {
        this.popup = document.getElementById('custom-popup');
    }

    onMapLoad() {
        this.addSource();
        this.addLayer();
        this.addEventListeners();
    }

    addSource() {
        this.map.addSource('covid-data', {
            type: 'geojson',
            data: {
                type: 'FeatureCollection',
                features: this.mapData
            }
        });
    }

    addLayer() {
        this.map.addLayer({
            id: 'covid-cases',
            type: 'circle',
            source: 'covid-data',
            paint: {
                'circle-radius': [
                    'interpolate',
                    ['linear'],
                    ['get', 'cases'],
                    0, 4,
                    1000000, 20
                ],
                'circle-color': [
                    'interpolate',
                    ['linear'],
                    ['get', 'cases'],
                    0, '#ffffb2',
                    10000, '#fed976',
                    100000, '#feb24c',
                    1000000, '#fd8d3c',
                    10000000, '#f03b20'
                ],
                'circle-opacity': 0.7
            }
        });
    }

    addEventListeners() {
        this.map.on('click', 'covid-cases', (e) => this.onCircleClick(e));
        this.map.on('mouseenter', 'covid-cases', () => this.onCircleMouseEnter());
        this.map.on('mouseleave', 'covid-cases', () => this.onCircleMouseLeave());
        this.map.on('move', () => this.onMapMove());
    }

    onCircleClick(e) {
        const properties = e.features[0].properties;
        const coordinates = e.features[0].geometry.coordinates.slice();
        const flagHtml = `<img src="${properties.flag}" alt="${properties.name} flag" style="width: 30px; height: 20px; margin-right: 10px; vertical-align: middle;">`;

        this.popup.innerHTML = `
            <h3>${flagHtml}${properties.name}</h3>
            <p>Cases: ${properties.cases.toLocaleString()}</p>
            <p>Deaths: ${properties.deaths.toLocaleString()}</p>
            <p>Recovered: ${properties.recovered.toLocaleString()}</p>
        `;

        this.popup.style.display = 'block';

        const point = this.map.project(coordinates);
        this.popup.style.left = `${point.x}px`;
        this.popup.style.top = `${point.y}px`;
    }

    onCircleMouseEnter() {
        this.map.getCanvas().style.cursor = 'pointer';
    }

    onCircleMouseLeave() {
        this.map.getCanvas().style.cursor = '';
    }

    onMapMove() {
        this.popup.style.display = 'none';
    }
}
