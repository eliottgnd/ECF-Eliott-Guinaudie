// Ici l'API prend comme exemple le zoo de la Palmyre comme le zoo d'Arcadia n'existe pas
document.addEventListener("DOMContentLoaded", function() {
    const apiKey = '40f0451c08f16ebc62023ba62f9d0178'; // Clé API
    const lat = 45.6995; // Latitude du Zoo de la Palmyre
    const lon = -1.1493; // Longitude du Zoo de la Palmyre

    function getWeatherIcon(description) {
        switch(description.toLowerCase()) {
            case 'clear sky':
                return 'fas fa-sun';
            case 'few clouds':
                return 'fas fa-cloud-sun';
            case 'scattered clouds':
                return 'fas fa-cloud';
            case 'broken clouds':
            case 'overcast clouds':
                return 'fas fa-cloud';
            case 'shower rain':
            case 'rain':
                return 'fas fa-cloud-showers-heavy';
            case 'thunderstorm':
                return 'fas fa-bolt';
            case 'snow':
                return 'fas fa-snowflake';
            case 'mist':
                return 'fas fa-smog';
            default:
                return 'fas fa-cloud';
        }
    }

    fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&appid=${apiKey}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Affiche les données de l'API
            if (data.weather && data.weather[0]) {
                const description = data.weather[0].description;
                const temp = data.main.temp;
                const iconClass = getWeatherIcon(description);
                document.getElementById('weather-icon').className = iconClass;
                document.getElementById('temperature').innerText = temp + '°C';
            } else {
                throw new Error('Weather data not found');
            }
        })
        .catch(error => console.error('Error fetching weather data:', error));
});