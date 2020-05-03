const bouton = document.querySelectorAll('nav>button');
const un = document.querySelectorAll('main>section.un');
const deux = document.querySelectorAll('main>section.deux');
const trois = document.querySelectorAll('main>section.trois');
const quatre = document.querySelectorAll('main>section.quatre');


bouton[0].addEventListener('click', () =>{
  for(let i=0;i<un.length;i++)
  {
      un[i].style.display='grid';
  }
  for(let j=0;j<deux.length;j++)
  {
      deux[j].style.display='none';
  }
  for(let k=0;k<trois.length;k++)
  {
      trois[k].style.display='none';
  }
  for(let l=0;l<quatre.length;l++)
  {
      quatre[l].style.display='none';
  }

});

bouton[1].addEventListener('click', () =>{
  for(let i=0;i<un.length;i++)
  {
      un[i].style.display='none';
  }
  for(let j=0;j<deux.length;j++)
  {
      deux[j].style.display='grid';
  }
  for(let k=0;k<trois.length;k++)
  {
      trois[k].style.display='none';
  }
  for(let l=0;l<quatre.length;l++)
  {
      quatre[l].style.display='none';
  }

});

bouton[2].addEventListener('click', () =>{
  for(let i=0;i<un.length;i++)
  {
      un[i].style.display='none';
  }
  for(let j=0;j<deux.length;j++)
  {
      deux[j].style.display='none';
  }
  for(let k=0;k<trois.length;k++)
  {
      trois[k].style.display='grid';
  }
  for(let l=0;l<quatre.length;l++)
  {
      quatre[l].style.display='none';
  }

});

bouton[3].addEventListener('click', () =>{
  for(let i=0;i<un.length;i++)
  {
      un[i].style.display='none';
  }
  for(let j=0;j<deux.length;j++)
  {
      deux[j].style.display='none';
  }
  for(let k=0;k<trois.length;k++)
  {
      trois[k].style.display='none';
  }
  for(let l=0;l<quatre.length;l++)
  {
      quatre[l].style.display='grid';
  }

});

bouton[4].addEventListener('click', () =>{
  for(let i=0;i<un.length;i++)
  {
      un[i].style.display='grid';
  }
  for(let j=0;j<deux.length;j++)
  {
      deux[j].style.display='grid';
  }
  for(let k=0;k<trois.length;k++)
  {
      trois[k].style.display='grid';
  }
  for(let l=0;l<quatre.length;l++)
  {
      quatre[l].style.display='grid';
  }

});
