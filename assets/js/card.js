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
        card?.children[1].addEventListener('click', function (e) {
            e.preventDefault();
            toggleCard(card);
        });
    });
});