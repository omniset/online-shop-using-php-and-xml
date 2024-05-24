document.addEventListener('DOMContentLoaded', (event) => {
    var modal = document.getElementById("modal");
    var btn = document.getElementById("addItemBtn");
    var span = document.getElementsByClassName("close")[0];

    // Disable the "Add Item" button on About and Contact pages
    var currentPage = window.location.pathname.split("/").pop();
    if (currentPage === "about.php" || currentPage === "contact.php") {
        btn.disabled = true;
        btn.style.cursor = "not-allowed";
    }

    btn.onclick = function() {
        if (!btn.disabled) {
            modal.style.display = "block";
        }
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
