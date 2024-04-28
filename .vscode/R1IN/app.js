/**
 * Aplet testowy do celów zajęć z programowania obiektowego
 * 
 * Autor: Studenci MUP rok 1 inf.
 * versja 0.9
 * 27.04.2024
 */
//mapowanie obiektów w GUO
const lista = document.getElementsByTagName("h1");
const licznik = document.getElementById("licznik");

//start funkcji licznika
setTimeout(licz,1000);
//funkcja licznika zwiększająca wartość co 1 sekundę
function licz() {
    licznik.innerHTML = parseInt(licznik.innerHTML)+1;
    setTimeout(licz,1000);
    };
//pętla przypisania dla obiektów tablicy "lista" akcji oczekiwania na kliknięcie
for(let i=0; i<lista.length; i++)
    lista[i].addEventListener("click",zaznacz);
/**
 * Funckja zmiany wartości obiektu 
 * @param {*} e - event dla obiektu
 */
function zaznacz(e){
        e.target.innerHTML = e.target.innerHTML*2;
    }
