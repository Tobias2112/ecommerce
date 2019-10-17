var hero = document.getElementById("hero");
var comic = document.getElementById("comics");

var cont_comic = document.getElementById("cont_comic");
var cont_hero = document.getElementById("cont_hero");

function mostrarHeroes() {
  cont_comic.style.display = "none";
  cont_hero.style.display = "flex";
}

function mostrarComics() {
  cont_comic.style.display = "flex";
  cont_hero.style.display = "none";
}
