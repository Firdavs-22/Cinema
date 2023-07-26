const slider = document.querySelector('.slider');
const carusel = document.querySelector('.carusel');

const leftarrow = document.querySelector('.left');
const rightarrow = document.querySelector('.right');
// const indecatorParents = document.querySelector('.controls ul');
var sectionIndex = 0;

var direction;


let interval = setInterval(run, 6000);

function run(){
    direction = -1;
    sectionIndex = (sectionIndex < 4) ? sectionIndex + 1 : 4;
    slider.style.transform = 'translate(-20%)';
    carusel.style.justifyContent = 'flex-start';
}

function resetInterval(){
    clearInterval(interval);

    interval = setInterval(run, 6000);
}

// function sitindex(){
//     document.querySelector('.controls .selected').classList.remove('selected')
    
// };

// document.querySelectorAll('.controls li').forEach(function (indecator, ind){
//     indecator.addEventListener('click', function(){
//         sectionIndex = ind;
//         sitindex();
//         // slider.style.transform = 'translate(-20%)';
//         indecator.classList.add('selected');
//     });
// });

leftarrow.addEventListener('click', function() {
    direction = 1
    if (direction == -1) {
        slider.appendChild(slider.firstElementChild);
        direction = 1;
    }
    
    sectionIndex = (sectionIndex > 0) ? sectionIndex - 1 : 0;
    // sitindex();
    slider.style.transform = 'translate(20%)';
    resetInterval()
   
    // indecatorParents.children[sectionIndex].classList.add('selected');
    carusel.style.justifyContent = 'flex-end';
      
    
}) ;

rightarrow.addEventListener('click', function() {
    direction = -1;
    
    sectionIndex = (sectionIndex < 4) ? sectionIndex + 1 : 4;
    // sitindex();
    slider.style.transform = 'translate(-20%)';
    resetInterval()
    
    // indecatorParents.children[sectionIndex].classList.add('selected');
    carusel.style.justifyContent = 'flex-start';
   
});

slider.addEventListener('transitionend', function(){
    if (direction == -1) {
        slider.appendChild(slider.firstElementChild);
    } else if(direction == 1) {
        slider.prepend(slider.lastElementChild)
    }
    

    slider.style.transition = 'none';
    slider.style.transform = 'translate(0)';
    setTimeout(function(){
        slider.style.transition = 'all 1s';
    })
    
})









document.addEventListener('DOMContentLoaded', function () {
    var zindex = 10;
    var cards = document.querySelectorAll('div.card');
    var cardContainer = document.querySelector('div.cards');
  
    function toggleCard(card) {
      var isShowing = card.classList.contains('show');
  
      if (cardContainer.classList.contains('showing')) {
        // A card is already in view
        var activeCard = document.querySelector('div.card.show');
        activeCard.classList.remove('show');
  
        if (isShowing) {
          // This card was showing - reset the grid
          cardContainer.classList.remove('showing');
        } else {
          // This card isn't showing - get in with it
          card.style.zIndex = zindex;
          card.classList.add('show');
        }
  
        zindex++;
      } else {
        // No cards in view
        cardContainer.classList.add('showing');
        card.style.zIndex = zindex;
        card.classList.add('show');
  
        zindex++;
      }
    }
  
    cards.forEach(function (card) {
      card.addEventListener('click', function (e) {
        e.preventDefault();
        toggleCard(card);
      });
    });
  });