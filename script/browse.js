document.addEventListener("DOMContentLoaded", function () {
    //Updates the range outputs
    document.querySelector("#filters").addEventListener("input", e => {
        if (e.target.nodeName == "INPUT" && e.target.getAttribute("type") == "range") {
            document.querySelector(`output[for="${e.target.name}"]`).textContent = e.target.value;
        }
    });
});