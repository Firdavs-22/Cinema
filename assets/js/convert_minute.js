const duration_input = document.getElementById("duration");

const result_element = document.getElementById("duration_result");
function convertDuration() {

    let duration = parseInt(duration_input.value);
    if (isNaN(duration) || duration < 0) {
        duration_input.value = 1;
        result_element.innerText = `0h 1m`;
        return;

    }
    let hours = Math.floor(duration / 60);

    let minutes = duration % 60;
    result_element.innerText = `${hours}h ${minutes}m`;
}

convertDuration()

duration_input.addEventListener('change', convertDuration)