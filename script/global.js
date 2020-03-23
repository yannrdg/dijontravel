const bouton = document.querySelectorAll('body>nav>button');
const un = document.querySelectorAll('body>main>section.un');
const deux = document.querySelectorAll('body>main>section.deux');
const trois = document.querySelectorAll('body>main>section.trois');
const quatre = document.querySelectorAll('body>main>section.quatre');


for (let x = 0; x < 10; x += 1) {
  bouton[0].addEventListener('click', () => {
    un[x].style.display = 'flex';
    deux[x].style.display = 'none';
    trois[x].style.display = 'none';
    quatre[x].style.display = 'none';
  });
  
  bouton[1].addEventListener('click', () => {
    un[x].style.display = 'none';
    deux[x].style.display = 'flex';
    trois[x].style.display = 'none';
    quatre[x].style.display = 'none';
  });
  
  bouton[2].addEventListener('click', () => {
    un[x].style.display = 'none';
    deux[x].style.display = 'none';
    trois[x].style.display = 'flex';
    quatre[x].style.display = 'none';
  });
  
  bouton[3].addEventListener('click', () => {
    un[x].style.display = 'none';
    deux[x].style.display = 'none';
    trois[x].style.display = 'none';
    quatre[x].style.display = 'flex';
  });
  
  bouton[4].addEventListener('click', () => {
    un[x].style.display = 'flex';
    deux[x].style.display = 'flex';
    trois[x].style.display = 'flex';
    quatre[x].style.display = 'flex';
  });
} 
