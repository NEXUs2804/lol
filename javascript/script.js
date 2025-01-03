function search() {
    // Obtén el valor de la barra de búsqueda
    var input = document.getElementById("search-input");
    var filter = input.value.toUpperCase(); // Convierte a mayúsculas para que la búsqueda no sea sensible a mayúsculas/minúsculas
    var cards = document.getElementsByClassName("card");

    // Recorre las tarjetas de contenido y oculta las que no coinciden con la búsqueda
    for (var i = 0; i < cards.length; i++) {
        var card = cards[i];
        var title = card.getElementsByTagName("h2")[0]; // Obtén el título de la tarjeta
        if (title) {
            var textValue = title.textContent || title.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                card.style.display = ""; // Muestra la tarjeta si coincide
            } else {
                card.style.display = "none"; // Oculta la tarjeta si no coincide
            }
        }
    }
}
