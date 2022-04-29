window.addEventListener('DOMContentLoaded', function () {
    const dateScroller = document.querySelector('.js-date-scroller');
    const contentScroller = document.querySelector('.js-content-scroller');
    let currentDate = 700;

    window.addEventListener('scroll', function () {
        // detect scroll to bottom
        if (window.scrollY + window.innerHeight >= document.body.scrollHeight) {
            // lock scroll
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                window.scrollTo({top: 180, behavior: "instant"})
                contentScroller.scrollTo({left: contentScroller.scrollLeft + window.innerWidth / 2, behavior: "smooth"});
                // dateScroller.scrollTo({left: dateScroller.scrollLeft + 210, behavior: "smooth"});
            }, 200);
            setTimeout(() => {
                document.body.style.overflow = '';
            }, 400);
        }
    });

    contentScroller.addEventListener('scroll', function () {
        currentDate = Math.round(contentScroller.scrollLeft / contentScroller.clientWidth) * 100 + 700;
        console.log(currentDate);
        showCurrentDate();
    });

    function showCurrentDate() {
        document.querySelectorAll('.frise__timeline-date').forEach(date => {
            if (currentDate == date.innerHTML) {
                date.classList.add('frise__timeline-date--active');
                setTimeout(() => {
                    date.scrollIntoView({behavior: "smooth", inline: "start"});
                }, 500);
            } else {
                date.classList.remove('frise__timeline-date--active');
            }
        });
    }
});