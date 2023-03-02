window.onload = function () {

    var myOption = document.querySelector("select[name='id_auteur']");
    var myTable = document.querySelector("#table-authors");
    var myInput = document.querySelector("#titre");

    if (myInput !== null) {
        if (sessionStorage.getItem("Title") !== null) {
            myInput.value = sessionStorage.getItem("Title");
            sessionStorage.removeItem("Title");
        }
    }

    if (myOption !== null) {
        myOption.addEventListener("change", function () {
            if (this.value === "Nouveau") {

                sessionStorage.setItem("Title", myInput.value);
                navigateTo("../auteurs/C");
            }
        });
    }

    if (myTable !== null) {
        if (sessionStorage.getItem("Title") !== null) {
            navigateTo("./livres/C");
        }
    }

    function navigateTo(myUrl) {
        window.location.href = myUrl;
    }
}