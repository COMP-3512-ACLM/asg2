document.addEventListener("DOMContentLoaded", function () {
    const filterPanel = document.querySelector("#filters");
    const resultsPanel = document.querySelector("#results-panel");
    
    //Updates the range outputs
    
    filterPanel.addEventListener("input", e => {
        if (e.target.nodeName == "INPUT" && e.target.getAttribute("type") == "range") {
            document.querySelector(`output[for="${e.target.name}"]`).textContent = e.target.value;
        }
    });
    
    //Sorting search results
    
    const sortButtons = document.querySelectorAll("#sortbar span");
    
    document.querySelector("#sortbar").addEventListener("click", e => {
        if (e.target.nodeName == "SPAN") {
            for (let btn of sortButtons) {
                if (btn == e.target) {
                    // Reverse the sort direction if the same button is pressed twice
                    if (btn.classList.contains("selected")) {
                        btn.dataset.sortdir = btn.dataset.sortdir * -1;
                    }
                    
                    btn.classList.add("selected");
                } else {
                    // Unselect all other buttons
                    btn.classList.remove("selected");
                }
            }
        }
    });
    
    // Toggling the filter panel
    document.querySelector("#hide").addEventListener("click", e => {
        filterPanel.classList.toggle("hidden");
        resultsPanel.classList.toggle("open");
    });
    
});