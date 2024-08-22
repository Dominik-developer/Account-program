// Funkcja do obliczania czasu do końca roku
function czasDoKoncaRoku() {
    // Pobranie bieżącej daty
    var dzisiaj = new Date();

    // Utworzenie obiektu daty dla ostatniego dnia bieżącego roku
    var koniecRoku = new Date(dzisiaj.getFullYear(), 11, 31);

    // Obliczenie różnicy czasu w milisekundach
    var roznica = koniecRoku.getTime() - dzisiaj.getTime();

    // Obliczenie pozostałych dni, godzin, minut i sekund
    var dni = Math.floor(roznica / (1000 * 60 * 60 * 24));
    var godziny = Math.floor((roznica % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minuty = Math.floor((roznica % (1000 * 60 * 60)) / (1000 * 60));
    var sekundy = Math.floor((roznica % (1000 * 60)) / 1000);

    return {
        dni: dni,
        godziny: godziny,
        minuty: minuty,
        sekundy: sekundy
    };
}

// Funkcja odświeżająca licznik co sekundę
function odswiezLicznik() {
    // Pobranie elementu, do którego będzie wstawiany wynik
    var licznikElement = document.getElementById('licznik');

    // Obliczenie czasu do końca roku
    var czas = czasDoKoncaRoku();

    // Aktualizacja zawartości elementu HTML
    licznikElement.textContent = czas.dni + " dni, " + czas.godziny + " godzin, " + czas.minuty + " minut, " + czas.sekundy + " sek";
}

// Uruchomienie funkcji odświeżającej licznik co sekundę
setInterval(odswiezLicznik, 1000);
