
const card = document.querySelector(".card");
let launch = true;

const hideLinkPreview = () => {

    card.animate([
        { opacity: 1, transform: 'translateY(0)' },
        { opacity: 0, transform: 'translateY(10px)' },
    ], {
        duration: 250,
        fill: 'forwards',
        easing: 'ease'
    });

    setTimeout(() => {
        card.style.display = 'none';
    }, 600);
    launch = true;
};

function showLinkPreview(event) {

    event.currentTarget.appendChild(card);

    console.log(launch);
    if (launch) {
        card.animate([
            { opacity: 0, transform: 'translateY(10px)' },
            { opacity: 1, transform: 'translateY(0)' },
        ], {
            duration: 250,
            fill: 'forwards',
            easing: 'ease'
        });
    }

    launch = false;
    card.style.display = 'flex';
    card.classList.add('active');
};

let clicked = false;

if (!clicked) {
    document.querySelectorAll(".link-with-preview").forEach(el => {
        el.addEventListener("click", showLinkPreview);
        clicked = true;
    });
}

if (clicked) {

    var container = document.getElementsByClassName('link-with-preview')[0];
    document.addEventListener('click', function (event) {
        if (container !== event.target && !container.contains(event.target)) {
            console.log('not clicked', launch);
            if (!launch) {
                hideLinkPreview();
                launch = true;
                console.log(launch);
            }
        } else if (container.contains(event.target)) {
            console.log('ouiii', launch);
        } else {
            console.log('clicked', launch);
            return;
        }
    });
}