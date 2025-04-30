document.addEventListener('DOMContentLoaded', function() {
    const hextraCheckbox = document.getElementById('hextrasi');
    const numHorasExInput = document.getElementById('numhorasex');
    const pagoHextraInput = document.getElementById('pagohextra');

    hextraCheckbox.addEventListener('change', function() {
        if (this.checked) {
            numHorasExInput.disabled = false;
            pagoHextraInput.disabled = false;
        } else {
            numHorasExInput.disabled = true;
            pagoHextraInput.disabled = true;
        }
    });
});